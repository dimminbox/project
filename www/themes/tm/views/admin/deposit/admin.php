<?php
/* @var $this DepositController */
/* @var $model Deposit */

$this->breadcrumbs=array(
	'Deposits'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Deposit', 'url'=>array('index')),
	array('label'=>'Create Deposit', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#deposit-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<div class="widget stacked ">
    <div class="widget-header">
        <i class="icon-signal"></i>
        <h3>Редактирование депозитов пользователей</h3>
    </div> <!-- /widget-header -->

    <div class="widget-content">


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'deposit-grid',
	'dataProvider'=>$model->search(),
    'itemsCssClass' => 'table table-bordered table-striped',
	'filter'=>$model,
	'columns'=>array(
		'id',
        array(
            'name'=>'user_id',
            'type'=>'raw',
            'value'=>'CHtml::link($data->user->username,
                         array("/user/admin/view/","id" => $data->user->id))',
        ),
        array(
            'name'=>'deposit_type_id',
            'type'=>'raw',
            'value'=>'$data->deposit_type->type',
        ),
		'deposit_amount',
        array(
            'name'=>'status',
            'type'=>'raw',
            'value'=>'$data->status',
        ),

		'date',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
    </div> <!-- /widget-content -->
</div>