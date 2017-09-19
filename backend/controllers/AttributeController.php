<?php
/**
 * 商品属性控制器
 */
namespace backend\controllers;

header("content-type:text/html;charset=utf-8");
use yii;
use yii\web\Controller;
use yii\data\Pagination;
use common\models\Attribute; //attribute model
use backend\models\GoodsType; //type model
use common\helpers\Tools; //message class
class AttributeController extends AdminController
{
    public function actionList($tid, $attr_name = '')
    {
        $query = Attribute::find();
        if(!empty($attr_name))
        {
            $query->andWhere(['like', 'attr_name', $attr_name]);
        }
        $page = new Pagination(['totalCount'=>$query->count(),'defaultPageSize'=>Yii::$app->params['pageSize']]);
        $attrType = $query->offset($page->offset)->limit($page->limit)->all();  //属性类型

        return $this->render('list', ['tid' => $tid, 'attrType' => $attrType, 'page' => $page, 'goodsType'  => (new GoodsType)->dropDownList(), 'model' => new Attribute(), 'attr_name' => $attr_name]);
    }

    public function actionCreate()
    {
        $model = (new Attribute())->getThisGoodsAttr();
        if(yii::$app->request->isPost)
        {
            if($model->getCreateAttrType())
            {
                Tools::success('添加类型属性成功', ['attribute/list', 'tid' => $model->type_id]);
            }   
            else
            {
                Tools::error('添加类型属性失败');
            }
        }
        $goodsType = (new GoodsType)->dropDownList();
        return $this->render('create', ['model' => $model, 'goodsType' => $goodsType]);
    }

    public function actionUpdate()
    {
        return $this->render('update');
    }

    public function actionDelete()
    {
        return $this->render('delete');
    }

}
