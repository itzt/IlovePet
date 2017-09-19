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
                <h3>品牌列表</h3>
                <?php $form = ActiveForm::begin(); ?>
                <div class="span10 pull-right">
                    <!-- <input type="text" name='text_name' class="span5 search" placeholder="Type a user's name..." /> -->
                    <?= Html::input('text', 'text_name', '', ['class'=>'span5 search']);?>
                    <div class="ui-dropdown">
                        <?= Html::submitbutton('Search', ['class' => 'btn'])?>
                    </div>
                
                    <a href="<?= Url::to(['brand/create'])?>" class="btn-flat success pull-right">
                        <span>&#43;</span>
                        添加新品牌
                    </a>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
            <!-- 消息提示 -->
            <?= $this->render('/admin/message'); ?>
            
            <!-- Users table -->
            <div class="row-fluid table">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th class="span4 sortable">
                                品牌名/简短描述
                            </th>

                            <th class="span2 sortable">
                                <span class="line"></span>排序
                            </th>                                
                            <th class="span2 sortable">
                                <span class="line"></span>是否展示
                            </th>                                                                                                
                            <th class="span3 sortable align-right">
                                <span class="line"></span>操作
                            </th>
                        </tr>
                    </thead>
                    <tbody>

                    <!-- row -->
    <?php foreach($brand as $val): ?>
        <tr class="first">
            <td>
                <img src="statics/img/contact-img.png" class="img-circle avatar thumbnail hidden-phone" />
                <a href="user-profile.html" class="name"><?= Html::encode($val['brand_name'])?></a>
                <span class="subtext"><?= Html::encode($val['brand_desc'])?></span>
            </td>
            <td><?= Html::encode($val['sort'])?></td>
            <td>
                <?= ($val['is_show']) ? '<span class="btn btn-success">是</span>' : '<span class="btn btn-warning">否</span>';?>
                
            </td>
            <td class="align-right">
            <a href="<?= Url::toRoute(['brand/update', 'brand_id' => $val['brand_id']]);?>">修改</a> | 
            <a href="<?= Url::toRoute(['brand/delete', 'brand_id' => $val['brand_id']])?>">回收站</a>
            </td>
        </tr>
        <!-- row -->
    <?php endforeach; ?>                                                       
    
                    </tbody>
                </table>
        
            </div>
            <div class="pagination pull-right">
                <?= LinkPager::widget(['pagination' => $page]) ?>
            </div>
            <!-- end users table -->
        </div>
    </div>
</div>
