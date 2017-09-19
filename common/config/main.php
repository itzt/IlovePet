<?php
return [
    'language' => 'zh-CN', //中文包
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'authManager' => [
		    'class' => 'yii\rbac\DbManager',
		    'itemTable' => 'yii_item',
		    'assignmentTable' => 'yii_assignment',
		    'itemChildTable' => 'yii_item_child',
        ],
        
    ],


];
