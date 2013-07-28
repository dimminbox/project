<?php
/* @var $this DefaultController */

$this->breadcrumbs=array(
	$this->module->id,
);?>
<h1>Личный кабинет</h1>
<?php
foreach(Yii::app()->user->getFlashes() as $key => $message) {
    echo '<div style="color:green;font-size: 16px" class="flash-' . $key . '">' . $message . "</div>\n";
}
?>
Ваш баланс:
<?php echo sprintf("%0.0f", $user->amount); ?>
<br />
<?php echo CHtml::link('Пополнить счет', 'private/default/deposit') ?><br /><br />
<?php echo CHtml::link('Партнерская программа', 'private/default/referral') ?>