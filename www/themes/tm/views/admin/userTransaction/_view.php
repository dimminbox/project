<?php
/* @var $this UserTransactionController */
/* @var $data UserTransaction */
?>

<div class="widget stacked ">
    <div class="widget-header">
        <i class="icon-exchange"></i>
        <h3>Транзакция #<?php echo CHtml::encode($data->id) ?></h3>
    </div> <!-- /widget-header -->

    <div class="widget-content">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::encode($data->id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
        <?php echo CHtml::link(CHtml::encode($data->user->username), array('/user/admin/view/', 'id'=>$data->user->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('amount')); ?>:</b>
	<?php echo CHtml::encode($data->amount); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('reason')); ?>:</b>
	<?php echo CHtml::encode($data->reason); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('time')); ?>:</b>
	<?php echo CHtml::encode($data->time); ?>
	<br />
    </div> <!-- /widget-content -->
</div>