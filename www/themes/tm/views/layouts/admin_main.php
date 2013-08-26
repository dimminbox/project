<?php /* @var $this Controller */ ?>
<!DOCTYPE html>

<html lang="ru"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/styles.css" />
    <?php Yii::app()->bootstrap->register(); ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/public/tm/profile/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/public/tm/profile/css/ui-lightness/jquery-ui-1.10.0.custom.min.css" rel="stylesheet">
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/public/tm/profile/css/base-admin-2.css" rel="stylesheet">
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/public/tm/profile/css/base-admin-2-responsive.css" rel="stylesheet">
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/public/tm/profile/css/dashboard.css" rel="stylesheet">

    <?php Yii::app()->clientScript->registerCoreScript('cookie'); ?>
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <style type="text/css"></style></head>

<body>

<!-- Верхний блок -->
<div class="navbar navbar-inverse navbar-fixed-top">

    <div class="navbar-inner">

        <div class="container">

            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <i class="icon-cog"></i>
            </a>

            <a class="brand" href="<?php echo Yii::app()->createAbsoluteUrl('/') ?>">
                Логотип
            </a>
            <div class="stat stat-time">
                <span class="stat-value"><?php echo date('H:i:s')?></span>
            </div>



        </div> <!-- /container -->

    </div> <!-- /navbar-inner -->

</div> <!-- /navbar -->

<!-- Конец верхний блок -->

<!-- Менюшка -->

<div class="subnavbar">

    <div class="subnavbar-inner">

        <div class="container">

            <a class="btn-subnavbar collapsed" data-toggle="collapse" data-target=".subnav-collapse">
                <i class="icon-reorder"></i>
            </a>

            <div class="subnav-collapse collapse">
                <ul class="mainnav">

                    <li <?php echo ( $this->active == 'index') ? 'class="active"' : ''?>>
                        <a href="/admin">
                            <i class="icon-home"></i>
                            <span>Главная</span>
                        </a>
                    </li>

                    <li <?php echo ( $this->active == 'payments') ? 'class="active"' : ''?>>
                        <a href="/admin/payments">
                            <i class="icon-spinner"></i>
                            <span>Выплаты</span>
                        </a>
                    </li>

                    <li class="dropdown <?php echo ( $this->active == 'deposit') ? 'active' : ''?>">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="icon-signal"></i>
                            <span>Депозиты</span>
                            <b class="caret"></b>
                        </a>

                        <ul class="dropdown-menu">

                            <li class="dropdown-submenu">
                                <a tabindex="-1" href="/admin/depositType">Типы депозитов</a>
                                <ul class="dropdown-menu">
                                    <li><a tabindex="-1" href="/admin/depositType">Список депозитов</a></li>
                                    <li><a tabindex="-1" href="/admin/depositType/create">Добавить</a></li>
                                    <li><a tabindex="-1" href="/admin/depositType/admin">Редактировать</a></li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu">
                                <a tabindex="-1" href="/admin/deposit">Депозиты польз.</a>
                                <ul class="dropdown-menu">
                                    <li><a tabindex="-1" href="/admin/deposit/admin">Редактировать депозиты</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown <?php echo ( $this->active == 'user') ? 'active' : ''?>">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="icon-user"></i>
                            <span>Пользователи</span>
                            <b class="caret"></b>
                        </a>

                        <ul class="dropdown-menu">
                            <li><a href="/user/admin/create">Добавить пользователя</a></li>
                            <li><a href="/user/admin/admin">Управление пользователями</a></li>
                        </ul>
                    </li>
                    <li  <?php echo ( $this->active == 'userTransaction') ? 'class="active"' : ''?>>
                        <a href="/admin/userTransaction">
                            <i class="icon-exchange"></i>
                            <span>Транзакции</span>
                        </a>
                    </li>

                    <li class="dropdown <?php echo ( $this->active == 'pages') ? 'active' : ''?>">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="icon-copy"></i>
                            <span>Страницы</span>
                            <b class="caret"></b>
                        </a>

                        <ul class="dropdown-menu">
                            <li class="dropdown-submenu">
                                <a tabindex="-1" href="/admin/news">Новости</a>
                                <ul class="dropdown-menu">
                                    <li><a tabindex="-1" href="/admin/news/create">Добавить</a></li>
                                    <li><a tabindex="-1" href="/admin/news/admin">Редактировать</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li <?php echo ( $this->active == 'message') ? 'class="active"' : ''?>>
                        <?php if ( User::model()->countMessages() > 0 ) : ?>
                        <a href="/admin/messages" style="color:red">
                            <i class="icon-envelope"></i>
                            <span>Сообщения(<?php echo User::model()->countMessages(); ?>)</span>
                        </a>
                        <?php else :?>
                            <a href="/admin/messages">
                                <i class="icon-envelope"></i>
                                <span>Сообщения(<?php echo User::model()->countMessages(); ?>)</span>
                            </a>
                        <?php endif; ?>
                    </li>
                    <li class="dropdown <?php echo ( $this->active == 'setup') ? 'active' : ''?>">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="icon-cog"></i>
                            <span>Настройки</span>
                            <b class="caret"></b>
                        </a>

                        <ul class="dropdown-menu">
                            <li class="dropdown-submenu">
                                <a tabindex="-1" href="javascript:;">Пользователи</a>
                                <ul class="dropdown-menu">
                                    <li><a tabindex="-1" href="/user/profileField/create">Добавить поле</a></li>
                                    <li><a tabindex="-1" href="/user/profileField/admin">Настройка полей</a></li>
                                </ul>
                            </li>
                            <li><a href="/rights">Права доступа</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="/logout" onclick="javascript: return confirm('Выйти?');">
                            <i class="icon-off"></i>
                            <span>Выход</span>
                        </a>
                    </li>
                </ul>
            </div> <!-- /.subnav-collapse -->

        </div> <!-- /container -->

    </div> <!-- /subnavbar-inner -->

</div> <!-- /subnavbar -->

<!-- Конец Менюшка -->

<div class="main">

    <div class="container">
        <div class="span12">


            <?php echo $content; ?>

        </div>
    </div> <!-- /container -->

</div> <!-- /main -->


<div class="footer">

    <div class="container">

        <div class="row">

            <div id="footer-copyright" class="span6">
                © <?php echo date('Y') ?>.
            </div> <!-- /span6 -->


        </div> <!-- /row -->

    </div> <!-- /container -->

</div> <!-- /footer -->





<!-- Le javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="jquery-1.8.3.min.js"></script>
<script src="jquery-ui-1.10.0.custom.min.js"></script>
<script src="bootstrap.min.js"></script>

<script src="jquery.flot.js"></script>
<script src="jquery.flot.pie.js"></script>
<script src="jquery.flot.resize.js"></script>

<script src="Application.js"></script>

<script src="area.js"></script>
<script src="donut.js"></script>

</body></html>