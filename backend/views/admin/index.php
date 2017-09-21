<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;

?>
<style>
.iii
{
    font-size: 20px;
}
.username
{
    color:red;
    font-size: 15px;
}
.level
{
    color: green;
    font-size: 15px;
}
.line
{
    width: 260px;
    border: 1px;
    background-color: #ccc;
}

</style>
<div class="content">
    <div class="container-fluid">
        <div id="pad-wrapper" class="new-user">
            <div class="row-fluid header">
                <h3>志愿者信息收集</h3>
            </div>
            <!-- 消息提示 -->
            <?= $this->render('/admin/message'); ?>


            <div class="row-fluid form-wrapper">
                <!-- left column -->
                <div class="span9 with-sidebar">
                    <div class="container">
                        <div class="btn-group toggle-inputs hidden-tablet">
                            <button class="glow right" data-input="normal" style="width: 282px;"><i class="icon-lightbulb pull-left"> <strong>最新等级排行</strong></i></button>
                        </div>
                        <h2>　</h2>
                        <div class="hidden-tablet" style="width: 300px">
                            <?php $i = 1; foreach($levelTop as $val): ?>
                                <?= '<div class="line btn"><span class="iii">' .$i++. '</span>　' .'用户<span class="username">'. $val['username'] .'</span>　<span class="level">'. $val['level']. '级勋章</span></div><br>';?>
                            <?php endforeach; ?>
                        </div>
                        <h6>文本说明</h6>
                        <p>Top：等级越高越靠前</p>
                    </div>
                </div>
    
                <div class="span3 form-sidebar pull-right">
                        <div class="btn-group toggle-inputs hidden-tablet">
                            <button class="glow right" data-input="normal" style="width: 282px;"><i class="icon-lightbulb pull-left"> <strong>最新活跃排行</strong></i></button>
                        </div>
                        <h2>　</h2>
                        <div class="hidden-tablet" style="width: 300px">
                            <?php $i = 1; foreach($activiTop as $val): ?>
                                <?= '<div class="line btn"><span class="iii">' .$i++. '</span>　' .'用户<span class="username">'. $val['username'] .'</span>　<span class="level">活跃次数'. $val['activity_count']. '</span></div><br>';?>
                            <?php endforeach; ?>
                        </div>
                        <h6>文本说明</h6>
                        <p>Top：活跃次数越高越靠前</p>
                </div>       

    </div>
</div>

