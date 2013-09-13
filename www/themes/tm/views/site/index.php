<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<h2 class='h2'><i><?php echo CHtml::encode(Yii::app()->name); ?></i></h2>
<p class='p1'>
Общий процент: <?php echo Deposit::findTodayGeneralPercent(); ?><br />
Реферальный процент: <?php echo 100 * Referral::REFERRAL_PERCENT; ?>%
</p>