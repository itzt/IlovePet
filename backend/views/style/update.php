<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;

?>
<!-- main container -->
<div class="content">

    <div class="container-fluid">
        <div id="pad-wrapper" class="new-user">
            <div class="row-fluid header">
                <h3>修改品种信息</h3>
            </div>
            <!-- 消息提示 -->
            <?= $this->render('/admin/message'); ?>


            <div class="row-fluid form-wrapper">
                <!-- left column -->
                <div class="span9 with-sidebar">
                    <div class="container">
                        <?php $form = ActiveForm::begin
                        (['fieldConfig' => [
                            'template'=>'<div class="span12 field-box">{label}{input}{error}{hint}</div>'],
                            'options' => ['class' => 'new_user_form inline-input',]
                        ]);  ?>

			<?= $form->field($sty, 'parent_id')->dropDownList($styList, ['prompt' => '选择品种', 'style' => 'height:30px'])->label('宠物品种'); ?>
                        <?= $form->field($sty, 'name')->label('品种'); ?>
                        <label for=""></label>
                        <?= Html::submitButton('Update Kind', ['class' => 'btn']); ?>
                        <span>OR</span>
                        <?= Html::resetInput('Cancel', ['class' => 'reset']); ?>
                        <?php ActiveForm::end(); ?>
                    </div>
                </div>

                <!-- side right column -->
                <div class="span3 form-sidebar pull-right">
                    <div class="btn-group toggle-inputs hidden-tablet">
                        <button class="glow left active" data-input="inline">This is a fake</button>
                        <button class="glow right" data-input="normal">This is a fake</button>
                    </div>
                    <div class="alert alert-info hidden-tablet">
                        <i class="icon-lightbulb pull-left"></i>
                        点击上面看到内联和正常输入表单上的区别
                    </div>
                    <h6>侧边栏文本说明</h6>
                    <p>品种：即为种类、类型</p>
                    <p>例如：大型犬、宠物犬等</p>
                    <p>选择下列快速通道:</p>
                    <ul>
                        <li><a href="#">所有宠物</a></li>
                        <li><a href="#">品种列表</a></li>
                        <li><a href="<?= Url::to(['admin/index']);?>">IC　首页</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

