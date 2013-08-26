<?php
$this->breadcrumbs=array(
	'General Percents'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List GeneralPercent','url'=>array('index')),
	array('label'=>'Create GeneralPercent','url'=>array('create')),
	array('label'=>'View GeneralPercent','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage GeneralPercent','url'=>array('admin')),
);
?>

<h1>Update GeneralPercent <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>