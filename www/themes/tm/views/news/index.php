<?php
/* @var $this NewsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
    Yii::t('news','News'),
);

?>

<h2 class='h2'><?php echo Yii::t('news','All news') ?></h2>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
