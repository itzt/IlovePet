<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%category}}".
 *
 * @property integer $cat_id
 * @property string $cat_name
 * @property string $cat_desc
 * @property integer $parent_id
 * @property integer $sort
 * @property integer $is_show
 * @property integer $is_nav
 * @property integer $filter_attr
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%category}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cat_name', 'cat_desc'], 'required'],
            [['cat_name'], 'unique'],
            ['parent_id', 'default', 'value' => 0],
            [['sort', 'is_show', 'is_nav', 'filter_attr'], 'integer'],
            [['cat_name'], 'string', 'max' => 45],
            [['cat_desc'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cat_id' => Yii::t('app', '分类id'),
            'cat_name' => Yii::t('app', '分类名称'),
            'cat_desc' => Yii::t('app', '分类描述'),
            'parent_id' => Yii::t('app', '归纳所属分类'),
            'sort' => Yii::t('app', '排序默认'),
            'is_show' => Yii::t('app', '是否显示'),
            'is_nav' => Yii::t('app', '是否显示在导航栏'),
            'filter_attr' => Yii::t('app', '如果该字段有值,则该分类将还会按照该值对应在表goods_attr的goods_attr_id所对应的属性筛选，如，封面颜色下有红，黑分类筛选   默认0'),
        ];
    }

     /**
     * 简单递归实现  无限极分类
     * exclude 待排除的分类以及子分类
     * @return array
     */
    static public function recursion($data, $exclude = '', $parentId = 0, $level = 0)
    {
        static $arr = []; //静态数组
        foreach($data as $key => $val)
        {
            //判断当前父id是否和获取到的一致
            if($val['parent_id'] == $parentId && $val['cat_id'] != $exclude)
            {
                $val['level'] = $level;
                $arr[] = $val;
                self::recursion($data, $exclude, $val['cat_id'], $level+1);
            }
        }
        return $arr;
    }

    /**
     * 无限极分类添加页面需要的层级关系
     * @return array
     */
    static public function getCategoryList($data = [])
    {
        $arr = [];
        $catList = self::recursion($data);
        foreach($catList as $key => $val)
        {
            $arr[$val['cat_id']] = str_repeat("　　|", $val['level']).$val['cat_name'];
        }
        return $arr;
    }

    static public function catList()
    {
        $data = self::find()->select('cat_id,cat_name')->asArray()->all();
        $arr = [];
        foreach ($data as $key => $val) {
            $arr[$val['cat_id']] = $val['cat_name'];
        }
        return $arr;
    }
}
