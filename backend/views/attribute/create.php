<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>
<div class="content">
        
        <div class="container-fluid">
            <div id="pad-wrapper" class="new-user">
                <div class="row-fluid header">
                    <h3>新增规格属性</h3>
                </div>
    
                <?= $this->render('/admin/message');?>
                <div class="row-fluid form-wrapper">
                    <!-- left column -->
                    <div class="span9 with-sidebar">
                        <div class="container">
                            <?php $form = ActiveForm::begin(['options' => ['class' => 'new_user_form inline-input']]); ?>
                                <div class="span12 field-box">
                                    <?= $form->field($model, 'attr_name')->textInput(['class' => 'span9']);?>
                                </div>
                                <div class="field-box">
                                    <?= $form->field($model, 'type_id')->dropDownList($goodsType, ['style' => 'width:300px;height:30px', 'prompt' => '请选择...'])->label('');?>
                                </div> 
                                <div class="field-box">
                                    <?= $form->field($model, 'attr_type')->radioList(['0' => '属性', '1' => '规格'])->label('是否参与购买');?>                               
                                </div>
                                <div class="span12 field-box textarea">
                                    <?= $form->field($model, 'attr_values')->textarea(['class' => 'span9']);?>  
                                </div>
                               
                                <div class="span11 field-box actions">
                                    <?= Html::submitButton('Create Attribute', ['class' => 'btn-glow primary']);?>
                                    <span>OR</span>
                                    <?= Html::resetInput('reset', ['class' => 'reset']);?>
                                </div>
                            <?php ActiveForm::end(); ?>
                        </div>
                    </div>

                    <!-- side right column -->
                    <div class="span3 form-sidebar pull-right">
                        <div class="btn-group toggle-inputs hidden-tablet">
                            <button class="glow left active" data-input="inline">INLINE INPUTS</button>
                            <button class="glow right" data-input="normal">NORMAL INPUTS</button>
                        </div>
                        <div class="alert alert-info hidden-tablet">
                            <i class="icon-lightbulb pull-left"></i>
                            点击上面看到内联和正常输入表单上的区别
                        </div>                        
                        <h6>侧边栏文本说明</h6>
                        <p>按Enter键，录入多个可选值，每一行为一个可选值</p>
                        <p>选择下列快速通道:</p>
                        <ul>
                            <li><a href="#">品牌列表</a></li>
                            <li><a href="#">分类列表</a></li>
                            <li><a href="#"发布商品</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>