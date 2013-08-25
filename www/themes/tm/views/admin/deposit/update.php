<?php
/* @var $this DepositController */
/* @var $model Deposit */
?>
<div class="widget stacked ">
    <div class="widget-header">
        <i class="icon-signal"></i>
        <h3>Редактирование депозита #<?php echo $model->id; ?></h3>
    </div> <!-- /widget-header -->

    <div class="widget-content">

<?php $this->renderPartial('_form', array('model'=>$model)); ?>

    </div> <!-- /widget-content -->
</div>