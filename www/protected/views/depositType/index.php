<?php
/* @var $this DepositTypeController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Deposit Types',
);

$this->menu=array(
	array('label'=>'Create DepositType', 'url'=>array('create')),
	array('label'=>'Manage DepositType', 'url'=>array('admin')),
);
?>

<h1>Deposit Types</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
