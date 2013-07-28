<?php
/* @var $this DefaultController */

$this->breadcrumbs=array(
	$this->module->id,
);?>
<h1>Личный кабинет</h1>
Ваш баланс: 0
<br />
<?php echo CHtml::link('Пополнить счет', 'private/default/deposit') ?><br /><br />
<?php echo CHtml::link('Партнерская программа', 'private/default/referral') ?>