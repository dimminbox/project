<?php
/* @var $this DepositTypeController */
/* @var $dataProvider CActiveDataProvider */
?>

<h3>Типы депозитов</h3>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
