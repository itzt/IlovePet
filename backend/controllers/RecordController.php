<?php

namespace backend\controllers;

use yii;
use common\models\Record;
use common\helpers\Tools;
/**
 * This is the model class for table "{{%record}}".
 * 这是记录表（每位志愿者发布信息或者查看所有是自己发布的信息）
 */

class RecordController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $reList = Record::find()->where('user_id=:user_id', [':user_id' => '7'])->asArray()->orderBy('re_id desc')->all();
        return $this->render('index', ['reList' => $reList]);
    }

    public function actionCreate()
    {
        $model = new Record;
        if(yii::$app->request->isPost)
        {
            $res = $model->createRecord();
            if($res)
            {
                Tools::success('此信息记录成功', ['record/index']);
            }
            else
            {
                Tools::error('此信息记录失败,请稍后重试', ['record/index']);
            }
        }
        return $this->render('create', ['model' => $model]);
    }

    public function actionDelete()
    {
        return $this->render('delete');
    }

    public function actionUpdate()
    {
        return $this->render('update');
    }

}
