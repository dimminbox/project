<?php
$this->breadcrumbs=array(
	'General Percents'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List GeneralPercent','url'=>array('index')),
	array('label'=>'Manage GeneralPercent','url'=>array('admin')),
);
?>

<h1>Создание общего процента на <?php echo date('M.Y', strtotime($date)) ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'week'=>$week,'date'=>$date)); ?>