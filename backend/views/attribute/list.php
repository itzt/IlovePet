<?php
use yii\helpers\Url;
use yii\widgets\LinkPager;
use yii\widgets\ActiveForm;
use yii\helpers\Html;

?>


<div class="content">
        <div class="container-fluid">
            <div id="pad-wrapper">
                
            
                <div class="table-wrapper products-table section">
                    <div class="row-fluid head">
                        <div class="span12">
                            <h4>规格属性列表</h4>
                        </div>
                    </div>

                    <?= Html::beginForm(['attribute/list'], 'get'); ?>
                    <div class="row-fluid filter-block">
                        <div class="pull-right">
                            <div class="ui-select">
                                    <?= Html::dropDownList('tid', $tid, $goodsType);?>
                                </select>
                            </div>
                            <?= Html::textInput('attr_name', $attr_name, ['class'=>'search', 'placeholder' => "输入关键字按回车键进行搜索"])?>
                            
<a href="<?= Url::to(['attribute/create', 'tid' => $tid])?>" class="btn-flat success new-product">+ 添加属性</a>
                        </div>
                    </div>
                    <?= Html::endForm(); ?>
                    <div class="row-fluid">
                        <table class="table table-hover">
                            <thead>
                                <tr align="center">
                                    <th class="span3">
                                        <input type="checkbox" />属性名称
                                    </th>
                                    <th class="span3">
                                        <span class="line"></span>所属类型
                                    </th>
                                    <th class="span3">
                                        <span class="line"></span>类别
                                    </th>                                    
                                    <th class="span3">
                                        <span class="line"></span>可选值列表
                                    </th>
                                    <th class="span3">
                                        <span class="line"></span>排序
                                    </th>
                                    <th class="span2">
                                        <span class="line"></span>操作
                                    </th>                                    
                                </tr>
                            </thead>
                            <tbody>
                            <?php if (!empty($attrType)): foreach($attrType as $val):?>
                                <tr class="first">
                                    <td>
                                        <input type="checkbox" />
                                        <?= $val['attr_name']?>
                                    </td>

                                    <td class="description">
                                        <?= $val->type->type_name?>
                                    </td>

                                    <td>
                                    <?= ($val['attr_type']) ? '<span class="label label-error">规格</span>' : '<span class="label label-success">属性</span>' ?>
                                    </td>
                                    <td><?= $val['attr_values']?></td>
                                    <td><?= $val['sort']?></td>
                                    <td class="align-left">
                                        <a href="#">修改</a> | 
                                        <a href="#">删除</a>
                                    </td>
                                </tr>
                            <?php endforeach; else: ?>
                            <table><tr><td colspan="6"><h2>暂时没有数据，快去添加吧~~~</h2></td></tr></table>
                            <?php endif ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- end products table -->

                <div class="pagination pull-right">
                    <?= LinkPager::widget(['pagination' => $page]); ?>
                </div>
            </div>
        </div>
    </div>
