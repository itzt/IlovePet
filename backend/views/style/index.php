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
                        <a href=""><h2>种类列表</h2></a>
                    </div>
                    <div class="ui-dropdown">
                        <a href="<?= Url::to(['style/create'])?>" class="btn-flat success pull-right">
                        <span>&#43;</span>
                        添加新品种
                    </a>
                    </div>

                    
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
                            品种名/简短描述
                        </th>

                        <th class="span3 sortable align-right">
                            <span class="line"></span>操作
                        </th>
                    </tr>
                    </thead>
                    <tbody>

                    <!-- row -->
                    <?php foreach($styList as $val): ?>
                        <tr class="first">

                            <td>
                                <?= str_repeat('　　|', $val['level']).$val['name'] ?>
                            </td>

                            <td class="align-right">
                                <a href="<?= Url::toRoute(['style/update', 'id' => $val['id']]);?>">修改</a> |
                                <a href="<?= Url::toRoute(['style/delete', 'id' => $val['id']])?>">回收站</a>
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
