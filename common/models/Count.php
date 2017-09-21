<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%count}}".
 * 这是统计表
 * @property integer $id
 * @property integer $work_num
 * @property integer $work_time
 * @property integer $activity_count
 * @property integer $user_id
 * @property integer $level
 */
class Count extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%count}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['work_num', 'work_time', 'activity_count', 'user_id', 'level'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '自增id',
            'work_num' => '已做任务数量',
            'work_time' => '累计工作时间',
            'activity_count' => '参与活动的次数',
            'user_id' => '用户id',
            'level' => '等级',
        ];
    }
}
