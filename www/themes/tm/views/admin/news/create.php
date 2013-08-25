<?php
/* @var $this NewsController */
/* @var $model News */

$this->breadcrumbs=array(
	'News'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List News', 'url'=>array('index')),
	array('label'=>'Manage News', 'url'=>array('admin')),
);
?>
<div class="widget stacked ">
    <div class="widget-header">
        <i class="icon-copy"></i>
        <h3>Добавить новость</h3>
    </div> <!-- /widget-header -->

    <div class="widget-content">

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
    </div> <!-- /widget-content -->
</div>