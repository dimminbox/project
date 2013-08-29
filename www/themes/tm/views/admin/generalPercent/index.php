<?php
$this->breadcrumbs=array(
	'General Percents',
);

$this->menu=array(
	array('label'=>'Create GeneralPercent','url'=>array('create')),
	array('label'=>'Manage GeneralPercent','url'=>array('admin')),
);
?>

<h1>Общий процент</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
