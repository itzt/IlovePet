<?php
namespace common\helpers;
/**
 * 公共工具
 */
use yii;
use common\models\Goods;

class Tools
{
	 //成功提示
    static function success($msg = '', $url = [], $skit = true, $time = 2)
    {
        $url = !empty($url) ? yii\helpers\Url::toRoute($url) : '';
        yii::$app->session->setFlash('info', ['msg'=>$msg, 'state' => 1, 'url' => $url, 'skit' => $skit, 'time' => $time]);
    }
    //失败提示
    static function error($msg = '', $url = [], $skit = true, $time = 2)
    {
        $url = !empty($url) ? yii\helpers\Url::toRoute($url) : '';
        yii::$app->session->setFlash('info', ['msg'=>$msg, 'state' => 0, 'url' => $url, 'skit' => $skit, 'time' => $time]);
    }

    static function createGoodsSn()
    {
        $goodsSn = 'YS' . strtoupper(uniqid()) . rand(100000, 999999);
        //让货号唯一
        if(Goods::find()->select('goods_sn')->where('goods_sn=:sn', [':sn' => $goodsSn])->count() > 0)
        {
            return self::createGoodsSn();
        }
        return $goodsSn;
    }
    
}