<?php
/**
 * 品牌控制器
 */
namespace backend\controllers;

use yii;
use yii\web\Controller;		//引入控制器类
use common\models\Brand; 	//引入公共的品牌models
use yii\data\Pagination; 	//引入分页类
use yii\web\UploadedFile;	//引入文件类
use common\helpers\Tools;	//引入公共工具

/**
 * Brand controller
 */
class BrandController extends AdminController
{

	//品牌列表
	public function actionList()
	{
		$brands = Brand::find()->where(['status' => 1]);
		$textName = yii::$app->request->post('text_name', '');
		if(!empty($textName))
		{
			$count = $brands->andWhere(['like', 'brand_name', $textName])->count();
		}
		else
		{
			$count = $brands->count();
		}
		$pagination = new Pagination([
			'defaultPageSize'	=> yii::$app->params['pageSize'],
			'totalCount'		=> $count,
		]);

		$brand = $brands->offset($pagination->offset)->
						 limit($pagination->limit)->
						 orderBy('sort desc')->asArray()->all();
		return $this->render('list', ['brand' => $brand, 'page' => $pagination]);
	}

	/**
	 * 品牌添加
	 */
	public function actionCreate()
	{
		$brand = new Brand;
		if(yii::$app->request->isPost)
		{
			$post = yii::$app->request->post();
			$brand->brand_logo = UploadedFile::getInstance($brand, 'brand_logo'); //获取文件信息
			echo '<pre>';
			print_r($brand->brand_logo);die;
			$brand->uploadFile();
			if($brand->load($post) && $brand->validate())
			{
				$res = $brand->save();
				if($res){
					return $this->redirect(['list']);
				}
			}
		}
		return $this->render('create', ['brand' => $brand]);
	}

	/**
	 * 品牌软删除
	 */
	public function actionDelete()
	{
		$id = yii::$app->request->get('brand_id');
		$brandOne = Brand::find(['brand_id' => $id])->where('brand_id = :brand_id', ['brand_id' => $id])->one();
		$brandOne->status = 0;
		$res = $brandOne->save();
		if($res)
		{
			Tools::success('品牌加入回收站成功');
            $this->redirect(['brand/list']);
		}else
		{
			Tools::error('品牌加入回收站失败');
            $this->redirect(['brand/list']);
		}
	}
	/**
	 * 修改
	 */
	public function actionUpdate()
	{
		$id = yii::$app->request->get('brand_id');
		$brand = Brand::findOne($id);
		if(yii::$app->request->isPost)
		{
			if($brand->load(yii::$app->request->post()) && $brand->validate())
			{
				$res = $brand->save();
				if($res)
				{
					Tools::success('修改品牌成功', ['brand/list']);
				}
			}else
			{
				Tools::error('修改品牌失败');
			}
		}

		return $this->render('update', ['brand' => $brand]);
	}

}