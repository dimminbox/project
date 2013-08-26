<?php
/* @var $this NewsController */
/* @var $model News */

$this->breadcrumbs=array(
	'News'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List News', 'url'=>array('index')),
	array('label'=>'Create News', 'url'=>array('create')),
	array('label'=>'Update News', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete News', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage News', 'url'=>array('admin')),
);
?>

<div class="widget stacked ">
    <div class="widget-header">
        <i class="icon-copy"></i>
        <h3><?php echo CHtml::encode($model->title); ?></h3>
    </div> <!-- /widget-header -->

    <div class="widget-content">

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'description',
		'text',
		'image',
		'status',
		'created_time',
		'update_time',
	),
)); ?>
    </div> <!-- /widget-content -->
</div>