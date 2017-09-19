<?php
namespace common\models;
use yii;
use yii\db\ActiveRecord;
use yii\web\UploadedFile;

class Brand extends ActiveRecord
{
	public $file;
	//验证规则
	public function rules()
	{
		return [
			[['brand_name', 'site_url'], 'required'], //必填项
			['brand_name', 'string', 'length' => [1, 15]  ],//最多15的长度
			[['brand_logo'], 'file', 'skipOnEmpty' => false, 'extensions' => 'jpg, png, gif' ],
			['site_url', 'url', 'defaultScheme' => 'http'],
			['is_show', 'integer'], //整数
			['sort', 'integer'], //整数
			['sort', 'default', 'value' => 10],
			['brand_logo', 'safe'], //设置是安全的

		];
	}
	public function attributeLabels()
	{
		return [
			'brand_name'		=> '品牌名称',
			'site_url'			=> '品牌官网',
			'brand_logo'		=> '品牌logo',
			'is_show'			=> '是否展示',
			'sort'				=> '品牌排序',
			'brand_desc'		=> '品牌描述',
		];
	}
	/**
	 * 文件上传
	 */
	public function uploadFile()
	{
		if($this->validate())
		{
			$this->file->saveAs('uploads/'.$this->file->baseName .'.'. $this->file->extension);
			return true;
		}
		else
		{
			return false;
		}
	}
	/**
	 * 处理数据
	 */
	static public function brandList()
	{
		$data = self::find()->select('brand_id,brand_name')->asArray()->all();
		$arr = [];
		foreach ($data as $key => $val) {
			$arr[$val['brand_id']] = $val['brand_name'];
		}
		return $arr;
	}
	
}