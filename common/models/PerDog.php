<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "per_dog".
 *
 * @property integer $id
 * @property string $name
 * @property string $img
 * @property integer $style_id
 * @property string $content
 */
class PerDog extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'per_dog';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'style_id', 'content'], 'required'],
            [['id', 'style_id'], 'integer'],
            [['content'], 'string'],
            [['name'], 'string', 'max' => 60],
            [['img'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '狗狗名字',
            'img' => '照片',
            'style_id' => '种类id',
            'content' => '描述',
        ];
    }
}
