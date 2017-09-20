<?php
use yii\helpers\Url;
use yii\helpers\Html;

?>
<!DOCTYPE html>
<html>
<head>
    <title>爱宠 志愿者平台</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <!-- bootstrap -->
    <link href="/statics/css/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="/statics/css/bootstrap/bootstrap-responsive.css" rel="stylesheet" />
    <link href="/statics/css/bootstrap/bootstrap-overrides.css" type="text/css" rel="stylesheet" />

    <!-- libraries -->
    <link href="/statics/css/lib/jquery-ui-1.10.2.custom.css" rel="stylesheet" type="text/css" />
    <link href="/statics/css/lib/font-awesome.css" type="text/css" rel="stylesheet" />

    <!-- global styles -->
    <link rel="stylesheet" type="text/css" href="/statics/css/layout.css" />
    <link rel="stylesheet" type="text/css" href="/statics/css/elements.css" />
    <link rel="stylesheet" type="text/css" href="/statics/css/icons.css" />

    <!-- this page specific styles -->
    <link rel="stylesheet" href="/statics/css/compiled/index.css" type="text/css" media="screen" />
    <!-- this page specific styles -->
    <link rel="stylesheet" href="/statics/css/compiled/user-list.css" type="text/css" media="screen" />
    <!-- this page specific styles -->
    <link rel="stylesheet" href="/statics/css/compiled/new-user.css" type="text/css" media="screen" />

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script src="/statics/js/jquery-latest.js"></script>
    <script src="/statics/js/bootstrap.min.js"></script>
    <script src="/statics/js/theme.js"></script>


</head>
<body>

    <!-- navbar -->
    <div class="navbar navbar-inverse">
        <div class="navbar-inner">
            <button type="button" class="btn btn-navbar visible-phone" id="menu-toggler">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            
            <a class="brand" href="index.html" style="font-weight:700;font-family:Microsoft Yahei">爱宠 志愿者平台 - 管理</a>

            <ul class="nav pull-right">                
                <li class="hidden-phone">
                    <input class="search" type="text" />
                </li>
                <li class="notification-dropdown hidden-phone">
                    <a href="#" class="trigger">
                        <i class="icon-warning-sign"></i>
                        <span class="count">6</span>
                    </a>
                    <div class="pop-dialog">
                        <div class="pointer right">
                            <div class="arrow"></div>
                            <div class="arrow_border"></div>
                        </div>
                        <div class="body">
                            <a href="#" class="close-icon"><i class="icon-remove-sign"></i></a>
                            <div class="notifications">
                                <h3>你有 6 个新通知</h3>
                                <a href="#" class="item">
                                    <i class="icon-signin"></i> 新用户注册
                                    <span class="time"><i class="icon-time"></i> 13 分钟前.</span>
                                </a>
                                <a href="#" class="item">
                                    <i class="icon-signin"></i> 新用户注册
                                    <span class="time"><i class="icon-time"></i> 18 分钟前.</span>
                                </a>
                                <a href="#" class="item">
                                    <i class="icon-signin"></i> 新用户注册
                                    <span class="time"><i class="icon-time"></i> 49 分钟前.</span>
                                </a>
                                <a href="#" class="item">
                                    <i class="icon-download-alt"></i> 新订单
                                    <span class="time"><i class="icon-time"></i> 1 天前.</span>
                                </a>
                                <div class="footer">
                                    <a href="#" class="logout">查看所有通知</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                
                <li class="notification-dropdown hidden-phone">
                    <a href="#" class="trigger">
                        <i class="icon-envelope-alt"></i>
                    </a>
                    <div class="pop-dialog">
                        <div class="pointer right">
                            <div class="arrow"></div>
                            <div class="arrow_border"></div>
                        </div>
                        <div class="body">
                            <a href="#" class="close-icon"><i class="icon-remove-sign"></i></a>
                            <div class="messages">
                                <a href="#" class="item">
                                    <img src="/statics/img/contact-img.png" class="display" />
                                    <div class="name">Alejandra Galván</div>
                                    <div class="msg">
                                        There are many variations of available, but the majority have suffered alterations.
                                    </div>
                                    <span class="time"><i class="icon-time"></i> 13 min.</span>
                                </a>
                                <a href="#" class="item">
                                    <img src="/statics/img/contact-img2.png" class="display" />
                                    <div class="name">Alejandra Galván</div>
                                    <div class="msg">
                                        There are many variations of available, have suffered alterations.
                                    </div>
                                    <span class="time"><i class="icon-time"></i> 26 min.</span>
                                </a>
                                <a href="#" class="item last">
                                    <img src="/statics/img/contact-img.png" class="display" />
                                    <div class="name">Alejandra Galván</div>
                                    <div class="msg">
                                        There are many variations of available, but the majority have suffered alterations.
                                    </div>
                                    <span class="time"><i class="icon-time"></i> 48 min.</span>
                                </a>
                                <div class="footer">
                                    <a href="#" class="logout">View all messages</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle hidden-phone" data-toggle="dropdown">
                        账户管理
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="<?= Url::to(['admin/info'])?>">个人信息管理</a></li>
                        <li><a href="#">订单管理</a></li>
                    </ul>
                </li>
                <li class="settings hidden-phone">
                    <a href="personal-info.html" role="button">
                        <i class="icon-cog"></i>
                    </a>
                </li>
                <li class="settings hidden-phone">

               
                    
                </li>
            </ul>            
        </div>
    </div>
    <!-- end navbar -->

    <!-- sidebar -->
    <div id="sidebar-nav">
        <ul id="dashboard-menu">
            <li class="active">
                <div class="pointer">
                    <div class="arrow"></div>
                    <div class="arrow_border"></div>
                </div>
                <a href="<?= Url::to(['admin/index'])?>">
                    <i class="icon-th-large"></i>
                    <span>IC 首页</span>
                </a>
            </li>            
            <li>
                <a class="dropdown-toggle" href="#">
                    <i class="icon-signal"></i>
                    <span>CI天地</span>
                    <i class="icon-chevron-down"></i>
                </a>
                <ul class="submenu">
                    <li><a href="user-list.html">latest info(最新消息)</a></li>
                    <li><a href="new-user.html">new friends(新朋友)</a></li>
                </ul>
            </li>
          <!--   <li>
                <a class="dropdown-toggle" href="#">
                    <i class="icon-group"></i>
                    <span>用户管理</span>
                    <i class="icon-chevron-down"></i>
                </a>
                <ul class="submenu">
                    <li><a href="user-list.html">用户列表</a></li>
                    <li><a href="new-user.html">加入新用户</a></li>
                    <li><a href="user-profile.html">用户信息</a></li>
                </ul>
            </li> -->
            <li>
                <a class="dropdown-toggle" href="#">
                    <i class="icon-edit"></i>
                    <span>Pokemon(精灵小世界)</span>
                    <i class="icon-chevron-down"></i>
                </a>
                <ul class="submenu">
                    <li><a href="<?= Url::to(['goods/list'])?>">All elves(所有精灵)</a></li>
                    <li><a href="<?= Url::to(['category/list'])?>">The elves CAT(精灵品种)</a></li>
                </ul>
            </li>
            <li>
                <a href="javascript:;">
                    <i class="icon-picture"></i>
                    <span>PhotoAlbum(相册)</span>
                </a>
            </li>
            
            <li>
                <a class="dropdown-toggle" href="#">
                    <!-- <i class="icon-cog"></i> -->
                    <i class="icon-home"></i>
                    <span>Residence</span>
                    <i class="icon-chevron-down"></i>
                </a>
                <ul class="submenu">
                    <li><a href="<?= Url::to(['admin/info'])?>">Personal information(个人信息管理)</a></li>
                    <li><a href="<?= Url::to(['brand/list'])?>">Dribs and drabs(我的点点滴滴)</a></li>
                </ul>
            </li>
                <?= Html::beginForm(['/site/logout'], 'post');?>
                <?= Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                );?>
                <?= Html::endForm();?>
            
        </ul>
    </div>
    <!-- end sidebar -->


  <?= $content?>





    <script src="/statics/js/jquery-ui-1.10.2.custom.min.js"></script>

    <script src="/statics/js/jquery.knob.js"></script>

    <script src="/statics/js/jquery.flot.js"></script>
    <script src="/statics/js/jquery.flot.stack.js"></script>
    <script src="/statics/js/jquery.flot.resize.js"></script>
    

    

</body>
</html>