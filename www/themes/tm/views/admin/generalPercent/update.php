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
<div class="widget stacked widget-table action-table">
    <div class="widget-header">
        <i class="icon-signal"></i>
        <h3>Редактирование общего процента на <?php echo date('M.Y', strtotime($model->date)) ?></h3>
    </div> <!-- /widget-header -->

    <div class="widget-content">

<?php echo $this->renderPartial('_updateForm',array('model'=>$model, 'week' => $week, 'json' => $json,)); ?>
    </div> <!-- /widget-content -->
</div>