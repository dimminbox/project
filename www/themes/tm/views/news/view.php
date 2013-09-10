<?php
/* @var $this NewsController */
/* @var $model News */

$this->breadcrumbs=array(
    Yii::t('news','News')=>array('index'),
);

?>

<h3 class='h3'><?php echo $model->title; ?></h3>
<?php echo date('d.m.Y h:i', strtotime($model->created_time)); ?>
<p class='p1'>
    <?php echo $model->text; ?>
</p>
