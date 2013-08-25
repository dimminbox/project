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

            <a class="brand" href="<?php echo Yii::app()->createAbsoluteUrl('/site/index') ?>">
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

                    <li <?php echo ( $this->active == 'profile') ? 'class="active"' : ''?>>
                        <a href="/profile">
                            <i class="icon-home"></i>
                            <span>Home</span>
                        </a>
                    </li >
                    <?php if ( UserModule::isAdmin() ) :?>
                        <li>
                            <a href="/admin">
                                <i class="icon-star"></i>
                                <span>Админпанель</span>
                            </a>
                        </li>
                    <?php endif; ?>
                    <li <?php echo ( $this->active == 'operations') ? 'class="active"' : ''?>>
                        <a href="/user/profile/operations">
                            <i class="icon-exchange"></i>
                            <span>Операции</span>
                        </a>
                    </li>

                    <li <?php echo ( $this->active == 'deposits') ? 'class="active"' : ''?>>
                        <a href="/user/profile/deposits" >
                            <i class="icon-money"></i>
                            <span>Депозиты</span>
                        </a>
                    </li>

                    <li <?php echo ( $this->active == 'referral') ? 'class="active"' : ''?>">
                        <a href="/user/profile/referral" >
                            <i class="icon-group"></i>
                            <span>Реферралы</span>
                        </a>
                    </li>
                    <li <?php echo ( $this->active == 'edit') ? 'class="active"' : ''?>>
                        <a href="/user/profile/edit" >
                            <i class="icon-wrench"></i>
                            <span>Редактировать профиль</span>
                        </a>
                    </li>
                    <li class="dropdown">
                        <a href="/user/logout" >
                            <i class="icon-off"></i>
                            <span>Выход</span>
                        </a>
                    </li>

                   <!-- <li class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="icon-external-link"></i>
                            <span>Extra Pages</span>
                            <b class="caret"></b>
                        </a>

                        <ul class="dropdown-menu">
                            <li><a href="http://jumpstartuidemo.com/themes/base/login.html">Login</a></li>
                            <li><a href="http://jumpstartuidemo.com/themes/base/signup.html">Signup</a></li>
                            <li><a href="http://jumpstartuidemo.com/themes/base/error.html">Error</a></li>
                            <li class="dropdown-submenu">
                                <a tabindex="-1" href="http://jumpstartuidemo.com/themes/base/index.html#">Dropdown menu</a>
                                <ul class="dropdown-menu">
                                    <li><a tabindex="-1" href="http://jumpstartuidemo.com/themes/base/index.html#">Second level link</a></li>
                                    <li><a tabindex="-1" href="http://jumpstartuidemo.com/themes/base/index.html#">Second level link</a></li>
                                    <li><a tabindex="-1" href="http://jumpstartuidemo.com/themes/base/index.html#">Second level link</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>-->

                </ul>
            </div> <!-- /.subnav-collapse -->

        </div> <!-- /container -->

    </div> <!-- /subnavbar-inner -->

</div> <!-- /subnavbar -->

    <!-- Конец Менюшка -->

<div class="main">

<div class="container">

    <?php echo $content; ?>

</div> <!-- /container -->

</div> <!-- /main -->


<div class="footer">

    <div class="container">

        <div class="row">

            <p>© <?php echo date('Y')  . ' ' . Yii::app()->name; ?></p>

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