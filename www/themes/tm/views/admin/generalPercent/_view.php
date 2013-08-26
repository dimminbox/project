<div class="widget stacked ">
    <div class="widget-header">
        <i class="icon-signal"></i>
        <h3><?php echo date('M.Y', strtotime($data->date)); ?></h3>
    </div> <!-- /widget-header -->

    <div class="widget-content">

	<b><?php echo CHtml::encode($data->getAttributeLabel('date')); ?>:</b>
	<h3><?php echo date('M.Y', strtotime($data->date)); ?></h3>
	<br />
        <?php echo CHtml::link('Редактировать',array('update','id'=>$data->id)); ?>
    </div> <!-- /widget-content -->
</div>