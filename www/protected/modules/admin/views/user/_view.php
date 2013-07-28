<?php
/* @var $this UserController */
/* @var $data User */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
    <?php echo CHtml::encode($data->name); ?>
    <br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('password')); ?>:</b>
	<?php echo CHtml::encode($data->password); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('register_time')); ?>:</b>
	<?php echo CHtml::encode($data->register_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('update_time')); ?>:</b>
	<?php echo CHtml::encode($data->update_time); ?>
	<br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('role.name')); ?>:</b>
    <?php echo CHtml::encode($data->role->name); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('tel')); ?>:</b>
    <?php echo CHtml::encode($data->tel); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('purse')); ?>:</b>
    <?php echo CHtml::encode($data->purse); ?>
    <br />
    
</div>