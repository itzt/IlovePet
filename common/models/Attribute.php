<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%attribute}}".
 *
 * @property integer $attr_id
 * @property string $attr_name
 * @property string $attr_values
 * @property integer $attr_type
 * @property integer $sort
 * @property string $type_id
 *
 * @property GoodsType $type
 * @property GoodsAttr[] $goodsAttrs
 * @property Goods[] $goods
 */
use backend\models\GoodsType;

class Attribute extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%attribute}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['attr_type', 'sort', 'type_id'], 'integer'],
            [['type_id'], 'required'],
            [['attr_name'], 'string', 'max' => 45],
            [['attr_values'], 'string', 'max' => 255],
            [['type_id'], 'exist', 'skipOnError' => true, 'targetClass' => GoodsType::className(), 'targetAttribute' => ['type_id' => 'type_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'attr_id' => 'Attr ID',
            'attr_name' => '属性名称',
            'attr_values' => '属性可选值',
            'attr_type' => '属性类型',
            'sort' => '排序',
            'type_id' => '类型ID',
        ];
    }  

    /**
    * 关联模型（类型表）
    * 第一个参数为要关联的表 模型 类名称，
    * 第二个参数指定 通过子表的 type_id 去关联主表的 id 字段
    * $array = GoodsType::find()->joinWith('attribute')->where(['type.id' => id])->all();
    */
    public function getType()
    {
        return $this->hasOne(GoodsType::className(), ['type_id' => 'type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGoodsAttrs()
    {
        return $this->hasMany(GoodsAttr::className(), ['attr_id' => 'attr_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGoods()
    {
        return $this->hasMany(Goods::className(), ['goods_id' => 'goods_id'])->viaTable('{{%goods_attr}}', ['attr_id' => 'attr_id']);
    }
    /**
     * 属性添加
     */
    public function getCreateAttrType()
    {
        if($this->load(yii::$app->request->post()) && $this->validate())
        {
            return $this->save();
        }
    }
    /**
     * 装载属性模型的默认值
     * @param  [type] $tid [description]
     * @return array
     */
    public function getThisGoodsAttr()
    {
        $this->type_id = yii::$app->request->get('tid');;
        return $this;
    }

    public function attrSearch()
    {
        if($this->load(yii::$app->request->post()) && $this->validate())
        {
            return $this;
        }
    }
}
