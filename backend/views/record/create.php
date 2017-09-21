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
<link rel="stylesheet" href="/statics/time/calendar.css" />
<script type="text/javascript" src="/statics/time/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="/statics/time/calendar.js"></script>
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
                        <?= $form->field($model, 're_name')->textInput(['class' => 'new_user_form inline-input', 'placeholder' => '本次标题']);?>   

                        <?= $form->field($model, 'start_time')->textInput(['class' => 'input-large hhmmss', 'placeholder' => '选择开始时间']);?>
                        <?= $form->field($model, 'end_time')->textInput(['class' => 'input-large hhmmss', 'placeholder' => '选择结束时间']);?>
               
                        <?= $form->field($model, 'img')->fileInput()->label('可选择添加图片');?>
                   
                          
                        <div class="wysi-column">
                             <?= $form->field($model, 'work_desc')->textarea(['class' => 'span15 wysihtml5', 'placeholder' => '可填写与毛孩们儿的欢愉时刻，并记录下来']);?>
	                    	<?= Html::submitButton('Create Record', ['class' => 'but']);?>
	                        <span>OR</span>
	                        <?= Html::resetInput('reset', ['class' => 'reset']);?>
                        </div>
                        
                    </div>

                       <div>
			
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
            
            // wysihtml5 plugin on textarea
            $(".wysihtml5").wysihtml5({
                "font-styles": false
            });
        });
    </script>
    	<script>
		$('.hhmmss').each(function() {
			var a = new Calendar({
				targetCls: $(this),
				type: 'yyyy-mm-dd HH:MM:SS',
				wday: 2
			})
		});
		$('.yyyy-mm-dd').each(function() {
			var b = new Calendar({
				targetCls: $(this),
				type: 'yyyy-mm-dd',
				wday: 2
			})
		});
		$('.hhmm').each(function() {
			var b = new Calendar({
				targetCls: $(this),
				type: 'HH:MM',
				wday: 2
			})
		});	    
		$('.hhmmssOnly').each(function() {
			var b = new Calendar({
				targetCls: $(this),
				type: 'HH:MM:SS',
				wday: 2
			})
		});
		$('.hhmmYear').each(function() {
			var b = new Calendar({
				targetCls: $(this),
				type: 'yyyy-mm-dd HH:MM',
				wday: 2
			})
		});
	</script>