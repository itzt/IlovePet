<?php

namespace common\models;

use Yii;

class Style extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%style}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent_id'], 'integer'],
            [['name'], 'string', 'max' => 40],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '分类名',
            'parent_id' => '父id',
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
            if($val['parent_id'] == $parentId && $val['id'] != $exclude)
            {
                $val['level'] = $level;
                $arr[] = $val;
                self::recursion($data, $exclude, $val['id'], $level+1);
            }
        }
        return $arr;
    }


    /**
     * 无限极分类添加页面需要的层级关系
     * @return array
     */
    static public function getStyleList($data = [])
    {
        $arr = [];
        $catList = self::recursion($data);
        foreach($catList as $key => $val)
        {
            $arr[$val['id']] = str_repeat("　　", $val['level']).$val['name'];
        }
        return $arr;
    }

    /**
     * 搜索需要的数据 key => value
     * @return array
     */
    static public function styleList()
    {
        $data = self::find()->select('id,name')->asArray()->all();
        $arr = [];
        foreach ($data as $key => $val) {
            $arr[$val['id']] = $val['name'];
        }
        return $arr;
    }

    /**
     * 添加
     */
    public function createStyle()
    {
        $post = yii::$app->request->post();
        if($this->load($post) && $this->validate())
        {
            return $this->save();
        }
    }

}
