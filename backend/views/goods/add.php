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
            <div id="pad-wrapper" class="form-page">
                <div class="row-fluid form-wrapper">
                    <!-- left column -->
                    <div class="span8 column">
                        <?php $form = ActiveForm::begin(['enableAjaxValidation' => true]); ?>
                            <div class="field-box">
                                <?= $form->field($goodsModel, 'goods_name')->textInput(['class' => 'span8 inline-input'])->label('商品名称:');?>
                            </div>
                            <div class="field-box">
                                 <?= $form->field($goodsModel, 'goods_brief')->textInput(['class' => 'span8 inline-input'])->label('简短描述:');?>
                            </div>                            
                            <div class="field-box">
                                 <?= $form->field($goodsModel, 'shop_price')->textInput(['class' => 'span8 inline-input'])->label('本店价格:');?>
                            </div>
                            <div class="field-box">
                                 <?= $form->field($goodsModel, 'promote_price')->textInput(['class' => 'span8 inline-input'])->label('促销价格:');?>
                            </div>
                          
                            <div class="field-box">
                               <?= $form->field($goodsModel, 'promote_start_date')->textInput(['class' => 'input-large datepicker'])->label('促销开始时间:');?>
                             
                            </div>
                            <div class="field-box">
                                <?= $form->field($goodsModel, 'promote_end_date')->textInput(['class' => 'input-large datepicker'])->label('促销结束时间:');?>

                            </div> 


                            <div class="field-box">
                                <?= $form->field($goodsModel, 'goods_number')->textInput(['class' => 'span8 inline-input'])->label('商品库存:');?>
                            </div>   
                            <div class="field-box">
                                <?= $form->field($goodsModel, 'goods_img')->fileInput(['class' => 'span8 inline-input'])->label('商品主图:');?>
                            </div>                                                        
                            <div class="field-box">
                                <div class="wysi-column">
                                    <?= $form->field($goodsModel, 'goods_desc')->textarea(['class' => 'span10 wysihtml5'])->label('详情描述:');?>
                                </div>
                            </div>
                        <?= Html::submitButton('Create Goods', ['class' => 'btn']);?>
                        <span>OR</span>
                        <?= Html::resetInput('reset', ['class' => 'reset']);?>
                    </div>

                    <div class="span4 column pull-right">
                        
                            <div class="field-box">
                                    <?= $form->field($goodsModel, 'cat_id')->dropDownList($catList, ['prompt' => '请选择分类...', 'style' => 'height:30px'])->label('');?>
                            </div>
                            <div class="field-box">
                                <?= $form->field($goodsModel, 'brand_id')->dropDownList($brandList, ['prompt' => '请选择品牌...', 'style' => 'height:30px'])->label('');?>
                            </div>
                        <div class="field-box">
                            <label>加入推荐:</label>
                            <label class="checkbox">
                                <?= $form->field($goodsModel, 'is_hot')->checkbox()->label('');?>
                            </label>
                            <label class="checkbox">
                                <?= $form->field($goodsModel, 'is_new')->checkbox()->label('');?>
                            </label>
                            <label class="checkbox">
                                <?= $form->field($goodsModel, 'is_best')->checkbox()->label('');?>
                            </label>
                        </div> 
                        <div class="field-box">
                            <label>上架:</label>
                <?= $form->field($goodsModel, 'is_on_sale')->radioList(['1' => '上架', '0' => '不上架'])->label('');?>
                        </div>
                        <div class="field-box">
                            <label>邮寄:</label>
                <?= $form->field($goodsModel, 'is_on_sale')->radioList(['1' => '是', '0' => '否'])->label('');?>
                        </div>     
                        
                        <?php ActiveForm::end(); ?>
                    </div>
                </div>
            </div>
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