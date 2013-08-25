<?php
/* @var $this DepositTypeController */
/* @var $dataProvider CActiveDataProvider */
?>

<h1>Deposit Types</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
