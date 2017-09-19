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
                <h6>M.Z SHOP - 后台管理</h6>
                <?= $form->field($model, 'username')->textInput(['autofocus' => true, 'class' => 'span12', 'placeholder' => '管理员账号'])->label('') ?>

                <?= $form->field($model, 'password')->passwordInput(['autofocus' => true, 'class' => 'span12', 'placeholder' => '管理员密码'])->label('') ?>

                <a href="<?= Url::to(['site/forgetspwd'])?>" class="forgot">忘记密码?</a>
                <div class="remember">
                <?= $form->field($model, 'rememberMe')->checkbox() ?>
                </div>

                 <?= Html::submitButton('Login', ['class' => 'btn-glow primary login', 'name' => 'login-button']) ?>
            </div>

        <?php ActiveForm::end(); ?>
        </div>
    </div>