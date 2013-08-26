<?php
/* @var $this NewsController */
/* @var $data News */
?>

<div class="widget stacked ">
    <div class="widget-header">
        <i class="icon-copy"></i>
        <h3><?php echo CHtml::encode($data->title); ?></h3>
    </div> <!-- /widget-header -->

    <div class="widget-content">
	<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
        <?php echo CHtml::link(CHtml::encode($data->title), array('view', 'id'=>$data->id)); ?>
	<br />
    <b><?php echo CHtml::encode($data->getAttributeLabel('created_time')); ?>:</b>
    <?php echo CHtml::encode($data->created_time); ?>
    <br />
	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />


        <?php echo CHtml::link('Редактировать', array('update', 'id'=>$data->id)); ?>
	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('update_time')); ?>:</b>
	<?php echo CHtml::encode($data->update_time); ?>
	<br />

	*/ ?>
    </div> <!-- /widget-content -->
</div>