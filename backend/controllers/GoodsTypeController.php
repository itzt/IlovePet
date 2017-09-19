<?php
/**
 * 商品类型控制器
 */

namespace backend\controllers;

use yii;
use yii\web\Controller;
use backend\models\GoodsType; //商品类型model
use common\helpers\Tools; //设置消息提示类
use yii\data\Pagination; //分页类

class GoodsTypeController extends AdminController
{
    public function actionCreate()
    {
        $model = new GoodsType;
        if(yii::$app->request->isPost)
        {
            if($model->getCreateGoodsType())
            {
                Tools::success('添加商品类型成功', ['goods-type/list']);
            }
            else
            {
                Tools::error('添加商品类型失败');
            }
        }
        return $this->render('create', ['model' => $model]);
    }

    public function actionDelete()
    {
        return $this->render('delete');
    }

    public function actionList()
    {
        $model = GoodsType::find(); //获取到模型对象
        $pageSize = yii::$app->params['pageSize']; //获取到每页展示的条数
        $page = new Pagination(['defaultPageSize' => $pageSize, 'totalCount' => $model->count()]);
        $goodsTypeList = $model->offset($page->offset)->limit($page->limit)->all(); 
        return $this->render('list', ['goodsTypeList' => $goodsTypeList, 'page' => $page]);
    }

    public function actionUpdate()
    {
        return $this->render('update');
    }

}
