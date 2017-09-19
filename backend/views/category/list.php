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
                <h3>分类列表</h3>
                <?php $form = ActiveForm::begin(); ?>
                <div class="span10 pull-right">
                    <!-- <input type="text" name='text_name' class="span5 search" placeholder="Type a user's name..." /> -->
                    <?= Html::input('text', 'text_name', '', ['class'=>'span5 search']);?>
                    <div class="ui-dropdown">
                        <?= Html::submitbutton('Search', ['class' => 'btn'])?>
                    </div>

                    <a href="<?= Url::to(['category/create'])?>" class="btn-flat success pull-right">
                        <span>&#43;</span>
                        添加新分类
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
                            分类名/简短描述
                        </th>

                        <th class="span3 sortable align-right">
                            <span class="line"></span>操作
                        </th>
                    </tr>
                    </thead>
                    <tbody>

                    <!-- row -->
                    <?php foreach($catList as $val): ?>
                        <tr class="first">

                            <td>
                                <?= str_repeat('　　|', $val['level']).$val['cat_name'] ?>
                            </td>

                            <td class="align-right">
                                <a href="<?= Url::toRoute(['category/update', 'cat_id' => $val['cat_id']]);?>">修改</a> |
                                <a href="<?= Url::toRoute(['category/delete', 'cat_id' => $val['cat_id']])?>">回收站</a>
                            </td>
                        </tr>
                        <!-- row -->
                    <?php endforeach; ?>

                    </tbody>
                </table>

            </div>
            <div class="pagination pull-right">
                <!-- 分页 -->
            </div>
            <!-- end users table -->
        </div>
    </div>
</div>
