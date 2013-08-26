<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <title></title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/public/css/reset.css" type="text/css" media="screen">
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/public/css/style.css" type="text/css" media="screen">
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/public/css/grid.css" type="text/css" media="screen">
    <?php Yii::app()->clientScript->registerCoreScript('cookie'); ?>

    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/public/js/jquery.easing.1.3.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/public/js/tms-0.3.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/public/js/tms_presets.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/public/js/easyTooltip.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/public/js/script.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
    <!--[if lt IE 7]>
    <div style=' clear: both; text-align:center; position: relative;'>
        <a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode">
            <img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today." />
        </a>
    </div>
    <![endif]-->
    <!--[if lt IE 9]>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/public/js/html5.js"></script>
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/public/css/ie.css" type="text/css" media="screen">
    <![endif]-->
</head>
<body id="page1">
<!--==============================header=================================-->
<header>
    <div class="main">
        <div class="prev-indent-bot2">
            <h1><?php echo CHtml::link('Главная', $this->createAbsoluteUrl('/')) ?></h1>
            <nav>
                <ul class="menu">
                    <li><?php echo CHtml::link('Главная', $this->createAbsoluteUrl('/')) ?></li>
                    <li><?php echo CHtml::link('Новости', $this->createAbsoluteUrl('/news')) ?></li>
                    <li><?php echo CHtml::link('О компании', $this->createAbsoluteUrl('/about')) ?></li>
                    <li><?php echo CHtml::link('Контакты', $this->createAbsoluteUrl('/contact')) ?></li>
                    <li><?php echo CHtml::link('Личный кабинет', $this->createAbsoluteUrl('/profile')) ?></li>
                </ul>
            </nav>
            <div class="clear"></div>
        </div>
    </div>

</header>

<!--==============================content================================-->
<section id="content"><div class="ic"></div>
    <div class="main">
        <div class="container_12">
            <div class="wrapper">

                <?php if(isset($this->breadcrumbs)):?>
                    <?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
                <?php endif?>

                <?php echo $content; ?>

            </div>
        </div>
    </div>
</section>

<!--==============================footer=================================-->
<footer>
    <div class="main">
        <div class="container_12">
            <div class="wrapper">
                <article class="grid_3">
                    <ul class="list-services">
                        <li class="item-1"><a class="tooltips" title="facebook" href="#"></a></li>
                        <li class="item-2"><a class="tooltips" title="twiiter" href="#"></a></li>
                        <li class="item-3"><a class="tooltips" title="delicious" href="#"></a></li>
                        <li class="item-4"><a class="tooltips" title="youtube" href="#"></a></li>
                    </ul>
                </article>
                <article class="grid_3">
                    <div class="indent-left2">
                        <h5>Navigation</h5>
                        <ul class="list-1">
                            <li><a href="index.html">Home</a></li>
                            <li><a href="company.html">Company</a></li>
                            <li><a href="services.html">Services</a></li>
                            <li><a href="clients.html">Clients</a></li>
                            <li><a href="contacts.html">Contacts</a></li>
                        </ul>
                    </div>
                </article>
                <article class="grid_3">
                    <h5>Contact</h5>
                    <dl class="contact">
                        <dt>2256 S Norfolk Street<br>Seattle, WA<br>98118-5648</dt>
                        <dd><span>Phone:</span>  217-764-7449</dd>
                        <dd><span>Fax:</span>  217-763-7912</dd>
                    </dl>
                </article>
                <article class="grid_3">
                    <h5>Legal</h5>
                    <p class="prev-indent-bot3 color-1">Wise Solutions &copy; 2011</p>
                    <p class="prev-indent-bot3">Website Template by </p>
                    <p class="color-1 p0"><a class="link" href="http://www.templatemonster.com/" target="_blank" rel="nofollow">TemplateMonster.com</a></p>
                </article>
            </div>
        </div>
    </div>
</footer>
<script type="text/javascript"> Cufon.now(); </script>
<script type="text/javascript">
    $(window).load(function(){
        $('.slider')._TMS({
            duration:800,
            easing:'easeOutQuad',
            preset:'simpleFade',
            pagination:true,//'.pagination',true,'<ul></ul>'
            pagNums:false,
            slideshow:7000,
            banners:'fade',// fromLeft, fromRight, fromTop, fromBottom
            waitBannerAnimation:false
        })
    })
</script>
</body>
</html>