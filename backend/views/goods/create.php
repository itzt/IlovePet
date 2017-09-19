<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use kartik\datetime\DateTimePicker; //加载的时间组件

?>
<link href="/statics/css/lib/bootstrap-wysihtml5.css" type="text/css" rel="stylesheet" />
<link href="/statics/css/lib/uniform.default.css" type="text/css" rel="stylesheet" />
<link href="/statics/css/lib/select2.css" type="text/css" rel="stylesheet" />
<link href="/statics/css/lib/bootstrap.datepicker.css" type="text/css" rel="stylesheet" />
<link rel="stylesheet" href="/statics/css/compiled/form-showcase.css" type="text/css" media="screen" />

<div class="content">
        <?= $this->render('/admin/message');?>
        <div class="container-fluid">
            <?php $form = ActiveForm::begin(['fieldConfig' => [
                'template'=>'<div class="field-box">{label}{input}{error}</div>'],
            ]); ?>
            <div id="pad-wrapper" class="form-page">
                <div class="row-fluid form-wrapper">
                    <!-- left column -->
                    <div class="span8 column">
                        <?= $form->field($goodsModel, 'goods_name')->textInput(['class' => 'new_user_form inline-input', 'placeholder' => '商品名称']);?>   
                        <?= $form->field($goodsModel, 'goods_brief')->textInput(['class' => 'new_user_form inline-input', 'placeholder' => '推广热词']);?>
                       
                        <?= $form->field($goodsModel, 'shop_price')->textInput(['class' => 'new_user_form inline-input', 'placeholder' => '本店价格']);?>
                            
                        <?= $form->field($goodsModel, 'market_price')->textInput(['class' => 'new_user_form inline-input', 'placeholder' => '市场价格']);?>
                        
                        <?= $form->field($goodsModel, 'promote_price')->textInput(['class' => 'new_user_form inline-input', 'placeholder' => '活动价格,可不选']);?>
                  
                        <?= $form->field($goodsModel, 'goods_number')->textInput(['class' => 'new_user_form inline-input', 'placeholder' => '商品数量']);?>
                        <?= $form->field($goodsModel, 'goods_weight')->textInput(['class' => 'new_user_form inline-input', 'placeholder' => '商品重量']);?>
                        <?= $form->field($goodsModel, 'promote_start_date')->textInput(['class' => 'input-large datepicker', 'placeholder' => '选择开始时间']);?>
                   
                        <?= $form->field($goodsModel, 'promote_end_date')->textInput(['class' => 'input-large datepicker', 'placeholder' => '选择结束时间']);?>
               
                        <?= $form->field($goodsModel, 'goods_img')->fileInput();?>
                   
                          
                        <div class="wysi-column">
                             <?= $form->field($goodsModel, 'goods_desc')->textarea(['class' => 'span15 wysihtml5', 'placeholder' => '商品详细描述']);?>
                        </div>
                        
                    </div>
                    <!-- right column -->
                    <div class="span4 column pull-right">
                         
                        <?= $form->field($goodsModel, 'cat_id', ['template' => '<div class="field-box">{label}<div class="ui-select">{input}</div>{error}</div>'])->dropDownList($catList, ['prompt' => '请选择分类...', 'style' => 'height:20px'])->label('');?>
            
                        <?= $form->field($goodsModel, 'brand_id')->dropDownList($brandList, ['prompt' => '请选择品牌...', 'style' => 'width:250px;height:20px', 'class' => 'select2'])->label('请选择品牌');?>
               
                     
                        <div class="field-box">
                            <label class="checkbox">
                            <label>加入推荐:</label>
                                <?= $form->field($goodsModel, 'is_hot', ['template' => '{label}{input}{error}'])->checkbox()->label('');?>
                          
                                <?= $form->field($goodsModel, 'is_new', ['template' => '{label}{input}{error}'])->checkbox()->label('');?>
                     
                                <?= $form->field($goodsModel, 'is_best', ['template' => '{label}{input}{error}'])->checkbox()->label('');?>
                            </label>
                        </div>
                       
                        <?= $form->field($goodsModel, 'is_on_sale')->radioList(['1' => '是', '0' => '否'])->label('是否销售');?>
                          
                        <!-- <?= $form->field($goodsModel, 'is_shipping')->radioList(['1' => '是', '0' => '否'])->label('是否邮寄');?> -->
     
                    <?= Html::submitButton('Create Goods', ['class' => 'but']);?>
                        <span>OR</span>
                        <?= Html::resetInput('reset', ['class' => 'reset']);?>
                    </div>
                </div>
            </div>
           <?php ActiveForm::end(); ?>
        </div>
    </div>












    <script src="statics/js/wysihtml5-0.3.0.js"></script>
    <script src="statics/js/bootstrap-wysihtml5-0.0.2.js"></script>
    <script src="statics/js/bootstrap.datepicker.js"></script>
    <script src="statics/js/jquery.uniform.min.js"></script>
    <script src="statics/js/select2.min.js"></script>
    <script type="text/javascript">
        $(function () {

            // add uniform plugin styles to html elements
            $("input:checkbox, input:radio").uniform();

            // select2 plugin for select elements
            $(".select2").select2({
                placeholder: "Select a State"
            });

            // datepicker plugin
            $('.datepicker').datepicker().on('changeDate', function (ev) {
                $(this).datepicker('hide');
            });

            // wysihtml5 plugin on textarea
            $(".wysihtml5").wysihtml5({
                "font-styles": false
            });
        });
    </script>