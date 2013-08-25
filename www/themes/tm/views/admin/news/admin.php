<?php
/* @var $this NewsController */
/* @var $model News */

$this->breadcrumbs=array(
	'News'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List News', 'url'=>array('index')),
	array('label'=>'Create News', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#news-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<div class="widget stacked ">
    <div class="widget-header">
        <i class="icon-copy"></i>
        <h3>Редактирование новостей</h3>
    </div> <!-- /widget-header -->

    <div class="widget-content">

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'news-grid',
    'itemsCssClass' => 'table table-bordered table-striped',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'title',
		'description',
		'text',
		'image',
		'status',
		/*
		'created_time',
		'update_time',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
    </div> <!-- /widget-content -->
</div>