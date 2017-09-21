<?php

namespace backend\controllers;

use yii;
use common\models\Style;
use common\helpers\Tools;

class StyleController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $styList = Style::recursion(Style::find()->asArray()->all());
        return $this->render('index', ['styList' => $styList]);
    }

    public function actionCreate()
    {
        $model = new Style;
        if(yii::$app->request->isPost)
        {
            $res = $model->createStyle();
            if($res){
                Tools::success('添加宠物种类成功', ['style/index']);
            }
            else {
                Tools::error('添加宠物种类失败啦~请重试');
            }
        }
        $styList = $model::getStyleList($model->find()->asArray()->all()); //无限极分类
        return $this->render('create', ['model' => $model, 'styList' => $styList]);
    }

    public function actionDelete($id = '')
    {
        return $this->render('delete');
    }

    public function actionUpdate($id = '')
    {
        $sty = Style::findOne($id);
        if(yii::$app->request->isPost)
        {
            $res = $sty->createStyle();
            $res = $sty->save();
            if($res)
            {
                Tools::success('修改品种成功', ['style/index']);
            }
            else
            {
                Tools::error('修改品种失败', ['style/index']);
            }
        }
        $arr = $sty::recursion($sty->find()->asArray()->all(), $id); //无限极分类
        $styList = $sty::getStyleList($arr);
        return $this->render('update', ['sty' => $sty, 'styList' => $styList]);
    }

}
