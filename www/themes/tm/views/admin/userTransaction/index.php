<?php
/* @var $this UserTransactionController */
/* @var $dataProvider CActiveDataProvider */
?>

    <h3>Транзакции</h3>

    <?php $this->widget('zii.widgets.CListView', array(
        'dataProvider'=>$dataProvider,
        'itemView'=>'_view',
    )); ?>
