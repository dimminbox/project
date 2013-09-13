<?php /* @var $this Controller */ ?>
<!DOCTYPE html>

<html lang="ru"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">

    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
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

    <!-- Top block -->
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

        </div> <!-- /container -->

    </div> <!-- /navbar-inner -->

</div> <!-- /navbar -->

    <!-- end top block -->

    <!-- Menu -->

<div class="subnavbar">

    <div class="subnavbar-inner">

        <div class="container">

            <a class="btn-subnavbar collapsed" data-toggle="collapse" data-target=".subnav-collapse">
                <i class="icon-reorder"></i>
            </a>

            <div class="subnav-collapse collapse">
                <ul class="mainnav">

                    <li <?php echo ( $this->active == 'profile') ? 'class="active"' : ''?>>

                        <?php echo CHtml::link(
                            '<i class="icon-home"></i><span>' . UserModule::t('Home') . '</span>',
                            $this->createUrl('/user/profile')) ?>

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
                        <?php echo CHtml::link(
                            '<i class="icon-exchange"></i><span>' . UserModule::t('Transactions') . '</span>',
                            $this->createUrl('/user/profile/operations')) ?>
                    </li>

                    <li <?php echo ( $this->active == 'deposits') ? 'class="active"' : ''?>>
                        <?php echo CHtml::link(
                            '<i class="icon-money"></i><span>' . UserModule::t('Deposits') . '</span>',
                            $this->createUrl('/user/profile/deposits')) ?>
                    </li>

                    <li <?php echo ( $this->active == 'referral') ? 'class="active"' : ''?>">
                        <?php echo CHtml::link(
                            '<i class="icon-group"></i><span>' . UserModule::t('Referrals') . '</span>',
                            $this->createUrl('/user/profile/referral')) ?>
                    </li>
                    <li <?php echo ( $this->active == 'edit') ? 'class="active"' : ''?>>
                        <?php echo CHtml::link(
                            '<i class="icon-wrench"></i><span>' . UserModule::t('Edit profile') . '</span>',
                            $this->createUrl('/user/profile/edit')) ?>
                    </li>
                    <li class="dropdown">
                        <?php echo CHtml::link(
                            '<i class="icon-off"></i><span>' . UserModule::t('Exit') . '</span>',
                            $this->createUrl('/user/logout'), array('onclick'=>'javascript: return confirm("Exit?");')) ?>
                    </li>


                </ul>
            </div> <!-- /.subnav-collapse -->

        </div> <!-- /container -->

    </div> <!-- /subnavbar-inner -->

</div> <!-- /subnavbar -->

    <!-- End menu -->

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


</body></html>