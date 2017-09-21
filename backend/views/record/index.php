<?php
use yii\helpers\Url;
use yii\widgets\LinkPager;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<div class="content">

    <div class="container-fluid">
        <div id="pad-wrapper" class="users-list">
            <div class="row-fluid header">
                
                <?php $form = ActiveForm::begin(); ?>
                <div class="span10 pull-right">

                    <div class="ui-dropdown">
                        <a href="<?= Url::to(['admin/index'])?>" class="btn-flat success pull-right">
                        <span>&#43;</span>
                        返回首页
                    </a>
                    </div>
                    <div class="ui-dropdown">
                        <a href=""><h2>记录列表</h2></a>
                    </div>
                    <div class="ui-dropdown">
                        <a href="<?= Url::to(['record/create'])?>" class="btn-flat success pull-right">
                        <span>&#43;</span>
                        添加新记录
                    </a>
                    </div>

                    
                </div>
                <?php ActiveForm::end(); ?>
            </div>

            <!-- 消息提示 -->
            <?= $this->render('/admin/message'); ?>
<center>
            <!-- Users table -->
            <div class="container-fluid">
            <div id="pad-wrapper" class="gallery">

                    <tbody>

                    <?php foreach ($reList as $val): ?>
                        <div class="span3 img-container" >
                        <div class="img-box">
                                <span class="icon edit">
                                    <i class="gallery-edit"></i>
                                </span>
                            <span class="icon trash">
                                    <i class="gallery-trash"></i>
                                </span>
                            <h4><a href=""><?= $val['re_name']?></a></h4>
                            <img src="<?= $val['img']?>" style="width: 245px; height: 235px" />
                            <p><?= date('Y-m-d H:i:s', $val['create_time']);?></p>
                            <p class="title">
                                <?= $val['work_desc']?>
                            </p>
                        </div>
                        </div>
                    <?php endforeach ?>

                    </tbody>
            </div>
        </div>
</center>
            <!-- end users table -->
        </div>
    </div>
</div>
