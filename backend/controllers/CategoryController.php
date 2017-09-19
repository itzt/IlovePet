<?php
/**
 * 分类控制器
 * Created by PhpStorm.
 * User: author Mr.ZHANG
 * Date: 2017-09-10 0010
 * Time: 16:10
 */

namespace backend\controllers;

use yii;
use yii\web\Controller;		//引入控制器类
use common\models\Category; 	//引入分类的models
use yii\data\Pagination; 	//引入分页类
use common\helpers\Tools;

class CategoryController extends AdminController
{

    /**
     * 分类展示
     */
    public function actionList()
    {
        $catList = Category::recursion(Category::find()->where(['status' => 1])->asArray()->all());
        return $this->render('list', ['catList' => $catList]);
    }
    /**
     * 分类添加
     */
    public function actionCreate()
    {
        $cat = new Category;
        if(yii::$app->request->isPost)
        {
            $post = yii::$app->request->post();
            if($cat->load($post) && $cat->validate())
            {
                $res = $cat->save();
                if($res){
                    Tools::success('添加分类成功', ['category/list']);
                }
                else {
                    Tools::error('添加失败');
                }
            }
        }
        $catList = $cat::getCategoryList($cat->find()->asArray()->all()); //无限极分类
        return $this->render('create', ['cat' => $cat, 'catList' => $catList]);
    }
    /**
     * 分类修改
     */
    public function actionUpdate()
    {
        $id = yii::$app->request->get('cat_id');
        $cat = Category::findOne($id);
        if(yii::$app->request->isPost)
        {
            if($cat->load(yii::$app->request->post()) && $cat->validate())
            {
                $res = $cat->save();
                if($res)
                {
                    Tools::success('修改分类成功', ['category/list']);
                }
            }else
            {
                Tools::error('修改分类失败');
            }
        }
        $arr = $cat::recursion($cat->find()->asArray()->all(), $id); //无限极分类
        $catList = $cat::getCategoryList($arr);
        return $this->render('update', ['cat' => $cat, 'catList' => $catList]);
    }
    /**
     * 分类删除
     */
    public function actionDelete()
    {
        $id = yii::$app->request->get('cat_id');
        $pId = Category::find()->where('parent_id=:id', ['id' => $id])->asArray()->all();
        // $goodsId = Goods::find()->where('type=:id', ['id' => $id])->asArray()->all();
        // if(!empty($goodsId))
        // {
        //     Toolds::error('该分类下有商品，无法删除');
        //     $this->redirect(['category/list']);
        // }
        if(!empty($pId))
        {
            Toolds::error('该分类下有子分类，无法删除');
            $this->redirect(['category/list']);
        }
        else
        {
            $catOne = Category::findOne(['cat_id' => $id]);
            $catOne->status = 0;
            $res = $catOne->save();
            if($res)
            {
                Tools::success('分类加入回收站成功');
                $this->redirect(['category/list']);
            }else
            {
                Tools::error('分类放入回收站失败');
                $this->redirect(['category/list']);
            }
        }        
    }
   
    
}
