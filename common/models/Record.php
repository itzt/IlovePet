<?php

namespace common\models;

use Yii;
use common\models\UploadForm;
use yii\web\UploadedFile;
use common\models\Count;
/**
 * This is the model class for table "{{%record}}".
 * 这是记录表（每位志愿者发布信息或者查看所有是自己发布的信息）
 */
class Record extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%record}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['create_time', 'start_time', 'end_time', 'user_id'], 'integer'],
            [['work_desc'], 'string'],
            [['re_name', 'img'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            're_id' => '记录id',
            're_name' => '本次标题',
            'create_time' => '创建时间',
            'start_time' => '开始时间',
            'end_time' => '结束时间',
            'work_desc' => '详细介绍',
            'img' => '图片',
            'user_id' => '用户id',
        ];
    }
    /**
     * Ar生命周期
     * @return [type] [description]
     */
    public function beforeValidate()
    {
        if(parent::beforeValidate())
        {
            $this->start_time   = strtotime($this->start_time); //开始时间
            $this->end_time     = strtotime($this->end_time); //结束时间
            $times = $this->end_time - $this->start_time; //计算时长
            if(!empty($times))
            {
                $find = Count::find()->where(['user_id' => 7])->one();
                $find->work_num = $find->work_num + 1; //当前用户的工作总次数+1
                $find->work_time = $find->work_time + $times; //修改当前用户的工作总时间
                $find->activity_count = $find->activity_count + 1; //修改参与活动的总次数
                echo $find->work_time;
                if($find->work_time > (3600 * 2)) //总时长大于2小时，增加一级勋章
                {
                    $find->level = $find->level + 1; //等级+1
                    $find->work_time = $find->work_time - (3600 * 2); //+1等级，减去时长
                     echo $find->work_time;
                }
                $find->save();
            }
            $upForm             = new UploadForm; //实例化文件上传模型
            $upForm->imgFile    = UploadedFile::getInstance($this, 'img'); //获取文件信息
            $this->img          = $upForm->upload();
            $this->create_time  = time() + 8 * 3600;   //添加时间
            return true;
        }
        return false;
    }

    /**
     * 添加信息
     * @return [type] [description]
     */
    public function createRecord()
    {
        if($this->load(yii::$app->request->post()) && $this->validate())
        {
            return $this->save(false);
        }
        return $this->getErrors(); //否则返回错误信息
    }
}
