<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<h2><i><?php echo CHtml::encode(Yii::app()->name); ?></i></h2>

Общий процент: <?php echo Deposit::GLOBAL_PERCENT; ?><br />
Реферальный процент: <?php echo Referral::REFERRAL_PERCENT; ?>