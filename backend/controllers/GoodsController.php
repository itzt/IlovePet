<?php

namespace backend\controllers;

use yii;
use yii\web\Controller;
use common\helpers\Tools;
use common\models\Category;
use common\models\Brand;
use common\models\Goods;
use yii\data\Pagination;
use common\models\UploadForm;
use yii\web\UploadedFile;
use yii\helpers\ArrayHelper;

class GoodsController extends AdminController
{
	public function actionList($cid = '', $bid = '', $property = '', $sale = '', $name = null)
    {
    	$map = ['cid' => $cid, 'bid' => $bid, 'property' => $property, 'name' => $name]; //搜索条件
        $goods = $this->_goodsMap(Goods::find(), $map); //调用条件方法
    	if(is_numeric($sale))
        {
        	$goods->andWhere(['is_on_sale' => $sale]);
        }

        $page = new Pagination(['defaultPageSize' => yii::$app->params['pageSize'], 'totalCount' => $goods->count()]);
        $goodsList = $goods->offset($page->offset)->limit($page->limit)->asArray()->all();
        $brandList = Brand::brandList(); //品牌数据
        $catList = Category::getCategoryList(Category::find()->asArray()->all()); //无限极分类
        return $this->render('list', ['goodsList' => $goodsList, 'page' => $page, 'brandList' => $brandList, 'catList' => $catList, 'map' => $map, 'sale' => $sale]);
    }

    public function actionCreate()
    {
        $goodsModel = new Goods;      //商品对象
        if(yii::$app->request->isPost)
        {
        	if($goodsModel->goodsCreate())
            {
                Tools::success('添加商品成功', ['goods/list']);
            }
            else
            {
                Tools::error('添加商品失败');
                var_dump($goodsModel->getErrors());
            }
        }
        $brandList = Brand::brandList(); //品牌数据
        $catList = Category::getCategoryList(Category::find()->asArray()->all()); //无限极分类

        return $this->render('create', ['goodsModel' => $goodsModel, 'brandList' => $brandList, 'catList' => $catList]);
    }

    public function actionDelete()
    {
        return $this->render('delete');
    }


    public function actionUpdate()
    {
        return $this->render('update');
    }

    /**
     * 照片列表
     */
    public function actionPhotos()
    {
        return $this->render('photos');
    }

    /**
     * 处理搜索条件
     * @param  [type] $goodsModel  模型
     * @param  [type] $map  条件组
     * @return where条件
     */
    private function _goodsMap($goodsModel, $map)
    {
        $goodsModel->where('is_delete=:d', [':d' => '0']);
        if(isset($map['name']) &&!empty($map['name']))
        {
            $goodsModel->andWhere(['like', 'goods_name', $map['name']]);
        }
        if(!empty($map['cid']))
        {
            // 获取当前分类下的子分类
            $childs = Category::recursion(Category::find()->select('cat_id,parent_id,cat_name')->asArray()->all(), '', $map['cid']);
            $arr = ArrayHelper::getColumn($childs, 'cat_id');
            array_push($arr, $map['cid']); //把当前id追加进去
            $goodsModel->andWhere(['in', 'cat_id', $arr]);
        }
        if(!empty($map['bid']))
        {
            $goodsModel->andWhere('brand_id = :bid', [':bid' => $map['bid']]);
        }
        if(!empty($map['property']))
        {
            $goodsModel->andWhere([$map['property'] => 1]);
        }
        return $goodsModel;
    }

}
