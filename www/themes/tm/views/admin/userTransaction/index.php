<?php
/* @var $this UserTransactionController */
/* @var $dataProvider CActiveDataProvider */
?>
<div class="widget stacked ">
    <div class="widget-header">
        <i class="icon-exchange"></i>
        <h3>Транзакции</h3>
    </div> <!-- /widget-header -->

    <div class="widget-content">

    <?php $this->widget('zii.widgets.CListView', array(
        'dataProvider'=>$dataProvider,
        'itemView'=>'_view',
    )); ?>
    </div> <!-- /widget-content -->
</div>