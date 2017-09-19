<?php
use yii\helpers\Url;
use yii\widgets\LinkPager;

?>
<div class="content">
        <div class="container-fluid">
            <div id="pad-wrapper">
                <div class="table-wrapper products-table section">
                    <div class="row-fluid head">
                        <div class="span12">
                            <h4>商品类型</h4>
                        </div>
                    </div>

                    <div class="row-fluid filter-block">
                        <div class="pull-right">
                            <a href="<?= Url::to(['goods-type/create'])?>" class="btn-flat success new-product">+ 添加商品类型</a>
                        </div>
                    </div>

                    <div class="row-fluid">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th class="span3">
                                        <input type="checkbox" />
                                        类型名
                                    </th>
                                    <th class="span3">
                                        <span class="line"></span>分组
                                    </th>
                                    <th class="span3">
                                        <span class="line"></span>操作
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(is_array($goodsTypeList) && !empty($goodsTypeList)): foreach($goodsTypeList as $val): ?>
                                <tr class="first">
                                    <td>
                                        <input type="checkbox" />
                                        <?= $val['type_name']?>
                                    </td>
                                    <td class="description">
                                        <?= $val['attr_group']?>
                                    </td>
                                    <td class="align-left">
                                        <a href="<?= Url::to(['attribute/list', 'tid' => $val['type_id']])?>">属性列表</a> | 
                                        <a href="#">修改</a> | 
                                        <a href="#">删除</a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <center><table><tr class='first'><td colspan="4"><h1>哎呀，暂时没有数据啦~~</h1></td></tr></table></center>
                            <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- end products table -->

                <div class="pagination pull-right">
                    <?= LinkPager::widget(['pagination' => $page])?>
                </div>
            </div>
        </div>
    </div>