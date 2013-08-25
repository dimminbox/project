<?php
/* @var $this DepositController */
/* @var $dataProvider CActiveDataProvider */
?>

        <h3>Депозиты пользователей</h3>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
    </div> <!-- /widget-content -->
