<?php
/* @var $this DepositTypeController */
/* @var $data DepositType */
?>
<div class="widget stacked ">
    <div class="widget-header">
        <i class="icon-signal"></i>
        <h3><?php echo CHtml::encode($data->type); ?></h3>
    </div> <!-- /widget-header -->

    <div class="widget-content">

	<b><?php echo CHtml::encode($data->getAttributeLabel('type')); ?>:</b>
	<?php echo CHtml::encode($data->type); ?>
	<br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('days')); ?>:</b>
    <?php echo CHtml::encode($data->days); ?>
    <br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('percent')); ?>:</b>
	<?php echo CHtml::encode($data->percent); ?>
	<br />

    <?php echo CHtml::link('Редактировать', array('update', 'id'=>$data->id)); ?>

    </div> <!-- /widget-content -->
</div>