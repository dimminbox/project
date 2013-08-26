<?php
/* @var $this DepositTypeController */
/* @var $model DepositType */
?>
<div class="widget stacked ">
    <div class="widget-header">
        <i class="icon-signal"></i>
        <h3>Депозит #<?php echo $model->id; ?></h3>
    </div> <!-- /widget-header -->

    <div class="widget-content">

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,

	'attributes'=>array(
		'id',
		'type',
		'percent',
        'days',
	),
)); ?>
    </div> <!-- /widget-content -->
</div>