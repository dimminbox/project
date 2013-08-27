<?php
$this->breadcrumbs=array(
	'General Percents'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List GeneralPercent','url'=>array('index')),
	array('label'=>'Create GeneralPercent','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('general-percent-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<div class="widget stacked ">
    <div class="widget-header">
        <i class="icon-signal"></i>
        <h3>Общий процент</h3>
    </div> <!-- /widget-header -->

    <div class="widget-content">


<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'general-percent-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
        array(
            'name'=>'date',
            'value'=>'date("M Y", strtotime($data->date))',
        ),
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
            'template' => '{update} {delete}',
		),
	),
)); ?>
    </div> <!-- /widget-content -->
</div>