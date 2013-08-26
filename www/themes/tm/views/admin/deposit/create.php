<?php
/* @var $this DepositController */
/* @var $model Deposit */

$this->breadcrumbs=array(
	'Deposits'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Deposit', 'url'=>array('index')),
	array('label'=>'Manage Deposit', 'url'=>array('admin')),
    array('label'=>'Типы депозитов', 'url'=>array('/admin/depositType')),
);
?>

<h1>Create Deposit</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>