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
                <h6>M.Z SHOP - 密码修改</h6>

                <?= $form->field($admin,'password')->textInput(['class'=>'span12','placeholder'=>'新密码'])->label(''); ?>

            <?= $form->field($admin,'repassword')->textInput(['class'=>'span12','placeholder'=>'确认密码'])->label(''); ?>

				<a href="<?= Url::to(['site/login'])?>" class="btn-glow primary login">去登录?</a>
                <?= Html::submitButton('SAVE', ['class' => 'btn-glow primary login', 'name' => 'login-button']) ?>
            </div>

        <?php ActiveForm::end(); ?>
        </div>
    </div>