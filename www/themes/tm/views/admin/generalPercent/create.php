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
<div class="widget stacked widget-table action-table">
    <div class="widget-header">
        <i class="icon-signal"></i>
        <h3>Создание общего процента на <?php echo date('M.Y', strtotime($date)) ?></h3>
    </div> <!-- /widget-header -->

    <div class="widget-content">



<?php echo $this->renderPartial('_createForm', array('model'=>$model,'week'=>$week,'date'=>$date)); ?>
    </div> <!-- /widget-content -->
</div>