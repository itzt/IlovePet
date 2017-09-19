<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>

<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>
 <div class="content wide-content">
        <div class="container-fluid">
            <div class="settings-wrapper" id="pad-wrapper">
                <!-- avatar column -->
                <div class="span3 avatar-box">
                    <div class="personal-image">
                        <?php if(!empty($findOne['image'])): ?>
                        <img src="<?= $findOne['image']?>" width="106px" height="106px" class="avatar img-circle" />
                        <?php else: ?>
                        <img src="/statics/img/contact-img.png" width="106px" height="106px" class="avatar img-circle" />
                        <?php endif; ?>
    <p>上传您的头像...</p>
    <?= $form->field($model, 'imgFile')->fileInput()->label('') ?>
                    </div>
                </div>

                <!-- edit form column -->
                <div class="span7 personal-info">
                    <div class="alert alert-info">
                        <i class="icon-lightbulb"></i>您可以在这里编辑您的个人信息
                    </div>
                    <!-- 消息提示 -->
                <?= $this->render('/admin/message'); ?>

                    <p><h5 class="personal-title">个人信息</h5></p>

                        <div class="field-box">
                            <?= $form->field($findOne, 'nickname')->input('text', ['class' => 'span5 inline-input'])->label('昵称：')?>
                        </div>
                        <div class="field-box">
                            <?= $form->field($findOne, 'email')->input('text', ['class' => 'span5 inline-input'])->label('电子邮箱：')?>
                        </div>
                        <div class="field-box">
                            <?= $form->field($findOne, 'username')->input('text', ['class' => 'span5 inline-input', 'disabled' => true])->label('管理员名称：')?>
                        </div>
                        <div class="field-box">
                            <?= $form->field($findOne, 'password_hash')->input('password', ['class' => 'span5 inline-input', 'disabled' => true])->label('密码：')?>
                        </div>

                        <div class="span6 field-box actions">
                            <?= Html::submitButton('保存修改', ['class' => 'btn-glow primary'])?>
                            <span>或者</span>
                            <?= Html::resetInput('取消', ['class' => 'reset']);?>
                        </div>
                    
                </div>
            </div>
        </div>
    </div>
    <?php ActiveForm::end() ?>