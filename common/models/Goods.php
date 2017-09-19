<?php

namespace common\models;

use Yii;
use common\models\UploadForm;
use yii\web\UploadedFile;
use common\helpers\Tools;

class Goods extends \yii\db\ActiveRecord
{
    const IS_PROMOTE = 1;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%goods}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['goods_name', 'cat_id', 'brand_id', 'goods_img'], 'required'],
            [['cat_id', 'brand_id', 'click_count', 'goods_number', 'warn_number', 'is_on_sale', 'is_shipping', 'add_time', 'sort', 'is_delete', 'is_best', 'is_new', 'is_hot', 'last_update', 'is_promote', 'promote_start_date', 'promote_end_date'], 'integer'],
            [['goods_weight', 'market_price', 'shop_price', 'promote_price'], 'number'],
            [['goods_desc'], 'string'],
            [['goods_name'], 'string', 'max' => 255],
            [['goods_sn'], 'string', 'max' => 45],
            [['goods_brief'], 'string', 'max' => 255],
            [['goods_thumb', 'goods_img'], 'string', 'max' => 120],
            [['brand_id'], 'exist', 'skipOnError' => true, 'targetClass' => Brand::className(), 'targetAttribute' => ['brand_id' => 'brand_id']],
            [['cat_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['cat_id' => 'cat_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'goods_id' => 'Goods ID',
            'goods_name' => '商品名称',
            'goods_sn' => '商品货号',
            'cat_id' => '分类id',
            'brand_id' => '品牌id',
            'click_count' => '点击量',
            'goods_number' => '商品库存',
            'goods_weight' => '商品重量(千克)',
            'market_price' => '市场价格',
            'shop_price' => '本店价格',
            'warn_number' => '商品报警数量',
            'goods_brief' => '简短描述',
            'goods_desc' => '商品描述',
            'goods_thumb' => '显示的微缩图片',
            'goods_img' => '图片',
            'is_on_sale' => '是否销售1是 0否',
            'is_shipping' => '是否包邮 1是 0否',
            'add_time' => '添加时间',
            'sort' => '排序',
            'is_delete' => '商品是否已经删除，0，否；1，已删除',
            'is_best' => '是否精品',
            'is_new' => '是否新品',
            'is_hot' => '是否热销',
            'last_update' => '最后修改时间',
            'is_promote' => '是否促销 1 是 0否',
            'promote_price' => '促销价格',
            'promote_start_date' => '促销开始时间',
            'promote_end_date' => '促销结束时间',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCarts()
    {
        return $this->hasMany(Cart::className(), ['goods_id' => 'goods_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBrand()
    {
        return $this->hasOne(Brand::className(), ['brand_id' => 'brand_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCat()
    {
        return $this->hasOne(Category::className(), ['cat_id' => 'cat_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGoodsAttrs()
    {
        return $this->hasMany(GoodsAttr::className(), ['goods_id' => 'goods_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAttrs()
    {
        return $this->hasMany(Attribute::className(), ['attr_id' => 'attr_id'])->viaTable('{{%goods_attr}}', ['goods_id' => 'goods_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGoodsGalleries()
    {
        return $this->hasMany(GoodsGallery::className(), ['goods_id' => 'goods_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['goods_id' => 'goods_id']);
    }
    /**
     * 验证之前调用的方法
     * AR 生命周期
     * @return [type] [description]
     */
    public function beforeValidate()
    {
        if(parent::beforeValidate())
        {
            if(!empty($this->promote_price))
            {
                $this->is_promote       = self::IS_PROMOTE;
            }
            $this->goods_sn             = Tools::createGoodsSn(); //生成货号
            $this->promote_start_date   = strtotime($this->promote_start_date); //活动开始时间
            $this->promote_end_date     = strtotime($this->promote_end_date); //活动结束时间
            $model                      = new UploadForm; //实例化文件上传模型
            $model->imgFile             = UploadedFile::getInstance($this, 'goods_img'); //获取文件信息
            $this->goods_img            = $model->upload();
            $this->add_time             = time();
            return true;
        }
        return false;
    }   
    /**
     * 添加
     * @return [type] [description]
     */
    public function goodsCreate()
    {   
        
        if($this->load(yii::$app->request->post()) && $this->validate())
        {
            return $this->save(false);
        }
        return false;
    }


}
