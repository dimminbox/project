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
        <div  id="language-selector" style="float:right; margin:5px;">
            <?php
            $this->widget('application.components.widgets.LanguageSelector');
            ?>
        </div>
        <nav>
            <ul class="menu">
                <li><?php echo CHtml::link(Yii::t('site','Home'), $this->createUrl('site/index'))?></li>
                <li><?php echo CHtml::link(Yii::t('site','About'), $this->createUrl('about')) ?></li>
                <li><?php echo CHtml::link(Yii::t('site','Referral'), $this->createAbsoluteUrl('referral')) ?></li>
                <li><?php echo CHtml::link(Yii::t('site','FAQ'), $this->createAbsoluteUrl('faq')) ?></li>
                <li><?php echo CHtml::link(Yii::t('site','Contacts'), $this->createAbsoluteUrl('contact')) ?></li>
                <li><?php echo CHtml::link(Yii::t('site','Sign in'), $this->createAbsoluteUrl('user/profile/')) ?></li>
            </ul>
        </nav>
    </div>
</header>
<section id="header-content">
    <div class="main">
        <div class="home-banner home-page-banner1">

        </div>
    </div>

</section>
<section id="header-plans">
    <div class="main-plans">

        <?php foreach( DepositType::getDepositTypes() as $depositType ) :?>
        <div class="plan">
            <span class="plan-title"><?php echo $depositType->type; ?></span>
            <hr />
            <div>
                <span class="profit">DAILY PROFIT</span> <span class="percent"><?php echo 100 * $depositType->percent; ?>%*</span>

                <span class="other">
                    Amount <i>$<?php echo $depositType->min_amount; ?> - $<?php echo $depositType->max_amount; ?></i><br />
                    Period <i><?php echo $depositType->days; ?> working days</i>
                </span>

            </div>

        </div>
        <?php endforeach; ?>
    </div>
    <div style="clear:both"></div>
    * Percentage of the total income of the investor return on investment
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
    <p>© <?php echo date('Y')  . ' ' . Yii::app()->name; ?></p>
</footer>
</body>
</html>