<?php
/* @var $this DepositTypeController */
/* @var $model DepositType */

$this->breadcrumbs=array(
	'Deposit Types'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List DepositType', 'url'=>array('index')),
	array('label'=>'Create DepositType', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#deposit-type-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<div class="widget stacked ">
    <div class="widget-header">
        <i class="icon-signal"></i>
        <h3>Редактирование депозитов</h3>
    </div> <!-- /widget-header -->

    <div class="widget-content">

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'deposit-type-grid',
	'dataProvider'=>$model->search(),
    'itemsCssClass' => 'table table-bordered table-striped',
	'filter'=>$model,
	'columns'=>array(
        array(
            'name'=>'type',
            'type'=>'raw',
            'value'=>'CHtml::link($data->type,
                         array("/admin/depositType/view","id" => $data->id))',
        ),
		'percent',
        'days',
        'min_amount',
        'max_amount',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
    </div> <!-- /widget-content -->
</div>