<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use kartik\datetime\DateTimePicker; //加载的时间组件

?>
<link href="/statics/css/lib/bootstrap-wysihtml5.css" type="text/css" rel="stylesheet" />
<link href="/statics/css/lib/uniform.default.css" type="text/css" rel="stylesheet" />
<link href="/statics/css/lib/select2.css" type="text/css" rel="stylesheet" />
<link href="/statics/css/lib/bootstrap.datepicker.css" type="text/css" rel="stylesheet" />
<!-- <link rel="stylesheet" href="/statics/css/compiled/form-showcase.css" type="text/css" media="screen" /> -->
<div class="content">
        <?= $this->render('/admin/message');?>
        <div class="container-fluid">
            <div id="pad-wrapper" class="form-page">
                <div class="row-fluid form-wrapper">
                    <!-- left column -->
                    <div class="span8 column">

            <?= Html::beginForm(['goods/create'], 'post'); ?>
                    <div class="field-box">
                                <label>商品名称:</label>
                                <?= Html::textInput('goods_name', '', ['class' => 'span8 inline-input']);?>
                            </div>
                            <div class="field-box">
                                <label>简短描述:</label>
                                 <?= Html::textInput('goods_brief', '', ['class' => 'span8 inline-input']);?>
                            </div>                            
                            <div class="field-box">
                                <label>市场价格:</label>
                                 <?= Html::textInput('market_price', '', ['class' => 'span8 inline-input'])?>
                            </div>
                            <div class="field-box">
                                <label>本店价格:</label>
                                 <?= Html::textInput('shop_price', '', ['class' => 'span8 inline-input']);?>
                            </div>
                          
                            <div class="field-box">
                                <label>促销开始时间</label>
                               <?= Html::textInput('promote_start_date', '', ['class' => 'input-large datepicker']);?>
                             
                            </div>
                            <div class="field-box">
                                <label>促销结束时间</label>
                                <?= Html::textInput('promote_end_date', '', ['class' => 'input-large datepicker']);?>

                            </div> 

                            <div class="field-box">
                                <label>商品库存</label>
                                <?= Html::textInput('goods_number', '', ['class' => 'span8 inline-input']);?>
                            </div>   
                            <div class="field-box">
                                <label>商品图片<label>
                                <?= Html::fileInput('goods_img', '', ['class' => 'span8 inline-input']);?>
                            </div>                                                        
                            <div class="field-box">
                                <div class="wysi-column">
                                <label>商品描述<label>
                                <?= Html::textarea('goods_desc', '', ['class' => 'span10 wysihtml5']);?>
                                </div>
                            </div>        
                    <!-- <div class="span4 column pull-right"> -->
                            <div class="field-box">
                                    <?= Html::dropDownList('cat_id', '', $catList, ['prompt' => '请选择分类...', 'style' => 'height:30px']);?>
                            </div>
                            <div class="field-box">
                                <?= Html::dropDownList('brand_id', '', $brandList, ['prompt' => '请选择品牌...', 'style' => 'height:30px']);?>
                            </div>
                    <div class="field-box">
                        <label>加入推荐:</label>
                        <label class="checkbox">
                        <?= Html::checkbox('is_hot', true, ['1' => '1', 0 => 0]);?>是否热销
                        </label>
                        <label class="checkbox">
                        <?= Html::checkbox('is_new', true, ['1' => '是', '0' => '否']);?>是否新品
                        </label>
                        <label class="checkbox">
                        <?= Html::checkbox('is_best', true, ['1' => '是', '0' => '否']);?>是否推荐
                        </label>
                    </div>      
                    <div class="field-box">
                        <label>上架:</label>
                        <label class="radio"><?= Html::radioList('is_on_sale', true,['1' => '销售', '0' => '不销售']);?></label>
                        </div>
                        <div class="field-box">
                            <label>邮寄:</label>
                            <label class="radio"><?= Html::radioList('is_shipping', true,['1' => '包邮', '0' => '不包邮']);?></label>
                        </div>

                        <?= Html::submitButton('Create Goods', ['class' => 'btn']);?>
                        <span>OR</span>
                        <?= Html::resetInput('reset', ['class' => 'reset']);?>
                    <!-- </div> -->
                <?= Html::endForm();?>        
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