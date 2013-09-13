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
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/public/tm/profile/css/signin.css" rel="stylesheet">
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/public/tm/profile/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/public/tm/profile/css/bootstrap-responsive.min.css" rel="stylesheet">

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

            <a class="brand" href="/"><img src="<?php echo Yii::app()->request->baseUrl; ?>/public/tm/images/logo.png" alt=""></a>
            <div class="stat stat-time">
                <span class="stat-value"><?php echo date('H:i:s')?></span>
            </div>







        </div>

    </div> <!-- /navbar-inner -->
    <div class="container">

        <?php echo $content; ?>

    </div> <!-- /container -->

</div> <!-- /navbar -->
