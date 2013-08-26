<?php
/* @var $this DepositController */
/* @var $data Deposit */
?>

<div class="widget stacked ">
    <div class="widget-header">
        <i class="icon-signal"></i>
        <h3>Депозит #<?php echo CHtml::encode($data->id); ?> пользователя <?php echo CHtml::encode($data->user->username); ?></h3>
    </div> <!-- /widget-header -->

    <div class="widget-content">

	<b>№ депозита:</b> <?php echo CHtml::encode($data->id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
        <?php echo CHtml::link(CHtml::encode($data->user->username), array('/user/admin/view/', 'id'=>$data->user->id)); ?>

	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('deposit_type_id')); ?>:</b>
	<?php echo CHtml::encode($data->deposit_type->type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('deposit_amount')); ?>:</b>
	<?php echo CHtml::encode($data->deposit_amount) . '$' ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo ($data->status == 1) ? '<span style="color:green">Активен</span>' : '<span style="color:darkgray">Не активен</span>' ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date')); ?>:</b>
	<?php echo CHtml::encode($data->date); ?>
	<br />
        <?php echo CHtml::link('Редактировать', array('/admin/deposit/update/', 'id'=>$data->id)); ?>
    </div> <!-- /widget-content -->
</div>