<?php
/* @var $this DepositTypeController */
/* @var $model DepositType */
?>
<div class="widget stacked ">
    <div class="widget-header">
        <i class="icon-signal"></i>
        <h3>Создать депозит</h3>
    </div> <!-- /widget-header -->

    <div class="widget-content">


<?php $this->renderPartial('_form', array('model'=>$model)); ?>
    </div> <!-- /widget-content -->
</div>