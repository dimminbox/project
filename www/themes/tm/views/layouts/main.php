<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo Yii::app()->request->baseUrl; ?>/public/tm/css/reset.css">
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo Yii::app()->request->baseUrl; ?>/public/tm/css/style.css">
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo Yii::app()->request->baseUrl; ?>/public/tm/css/grid_12.css">
    <?php Yii::app()->clientScript->registerCoreScript('cookie'); ?>
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
                <li><?php echo CHtml::link('О нас', $this->createAbsoluteUrl('/about')) ?></li>
                <li><?php echo CHtml::link('Партнерам', $this->createAbsoluteUrl('/referral')) ?></li>
                <li><?php echo CHtml::link('FAQ', $this->createAbsoluteUrl('/faq')) ?></li>
                <li><?php echo CHtml::link('Контакты', $this->createAbsoluteUrl('/contact')) ?></li>
                <li><?php echo CHtml::link('Личный кабинет', $this->createAbsoluteUrl('/profile')) ?></li>
            </ul>
        </nav>
    </div>
</header>
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
    <p>© <?php echo date('Y')  . ' ' . Yii::app()->name; ?></p>
</footer>
</body>
</html>