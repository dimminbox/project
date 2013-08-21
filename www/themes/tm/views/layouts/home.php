<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title></title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo Yii::app()->request->baseUrl; ?>/public/tm/css/reset.css">
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo Yii::app()->request->baseUrl; ?>/public/tm/css/style.css">
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo Yii::app()->request->baseUrl; ?>/public/tm/css/grid_12.css">
    <?php Yii::app()->clientScript->registerCoreScript('cookie'); ?>
    <!--script src="<?php echo Yii::app()->request->baseUrl; ?>/public/tm/js/jquery-1.7.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/public/tm/js/jquery.easing.1.3.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/public/tm/js/cufon-yui.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/public/tm/js/Vegur-L_300.font.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/public/tm/js/Vegur-M_500.font.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/public/tm/js/Vegur-R_400.font.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/public/tm/js/cufon-replace.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/public/tm/js/FF-cash.js"></script-->
    <!--[if lt IE 8]>
    <div style=' clear: both; text-align:center; position: relative;'>
        <a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode">
            <img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today." />
        </a>
    </div>
    <![endif]-->
    <!--[if lt IE 9]>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/public/tm/js/html5.js"></script>
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo Yii::app()->request->baseUrl; ?>/public/tm/css/ie.css">
    <![endif]-->
</head>
<body>
<!--==============================header=================================-->
<header>
    <div class="main">
        <h1><a href="/"><img src="<?php echo Yii::app()->request->baseUrl; ?>/public/tm/images/logo.png" alt=""></a></h1>
        <nav>
            <ul class="menu">
                <li><?php echo CHtml::link('Главная', $this->createAbsoluteUrl('/')) ?></li>
                <li><?php echo CHtml::link('Новости', $this->createAbsoluteUrl('/news')) ?></li>
                <li><?php echo CHtml::link('О компании', $this->createAbsoluteUrl('/about')) ?></li>
                <li><?php echo CHtml::link('Контакты', $this->createAbsoluteUrl('/contact')) ?></li>
                <li><?php echo CHtml::link('Личный кабинет', $this->createAbsoluteUrl('/profile')) ?></li>
            </ul>
        </nav>
    </div>
</header>
<section id="header-content">
    <div class="main">
        <div class="sub-page-banner page2-banner">
            <p><strong class="font-1">Use</strong><strong class="font-2">our time</strong><strong class="font-1">to save your</strong><strong class="font-2">money!</strong></p>
        </div>
    </div>
</section>
<!--==============================content================================-->
<section id="content" class="border subpage-content">
    <div class="container_12">
        <?php if(isset($this->breadcrumbs)):?>
            <?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
        <?php endif?>
        <?php echo $content; ?>
    </div>
</section>
<!--==============================footer=================================-->
<footer>
    <p>© 2012 Genesis Group</p>
    <p>Website Template by <a class="link" href="http://www.templatemonster.com/" target="_blank" rel="nofollow">www.templatemonster.com</a></p>
</footer>
<!--script>
    Cufon.now();
</script-->
</body>
</html>