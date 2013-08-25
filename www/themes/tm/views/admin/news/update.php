<?php
/* @var $this NewsController */
/* @var $model News */

$this->breadcrumbs=array(
	'News'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List News', 'url'=>array('index')),
	array('label'=>'Create News', 'url'=>array('create')),
	array('label'=>'View News', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage News', 'url'=>array('admin')),
);
?>

<div class="widget stacked ">
    <div class="widget-header">
        <i class="icon-copy"></i>
        <h3>Редактирование новости <?php echo $model->title; ?></h3>
    </div> <!-- /widget-header -->

    <div class="widget-content">

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
    </div> <!-- /widget-content -->
</div>