<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

?>

<div class="row-fluid login-wrapper">
    <a class="brand" href="index.html"></a>
    
    
            <!-- 消息提示 -->
            <?= $this->render('/admin/message'); ?>
    <div class="span4 box">
    <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
        <div class="content-wrap">
            <h6>M.Z SHOP - 找回管理密码</h6>
            
            <?= $form->field($admin, 'email')->textInput(['class' => 'span12', 'placeholder' => '管理员Email'])->label('');?>

            <a href="<?= Url::to(['site/login'])?>" class="btn-glow primary login">去登录?</a>
            <?= Html::submitButton('发送Email', ['class' => 'btn-glow primary login']); ?>
        </div>
    <?php ActiveForm::end() ?>
    </div>
</div>