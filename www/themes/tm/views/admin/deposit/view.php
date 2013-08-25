<?php
/* @var $this DepositController */
/* @var $model Deposit */
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
		'user_id',
		'deposit_type_id',
		'deposit_amount',
		'status',
		'date',
	),
)); ?>
    </div> <!-- /widget-content -->
</div>