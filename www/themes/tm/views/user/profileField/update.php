<?php
$this->breadcrumbs=array(
	UserModule::t('Profile Fields')=>array('admin'),
	$model->title=>array('view','id'=>$model->id),
	UserModule::t('Update'),
);
$this->menu=array(
    array('label'=>UserModule::t('Create Profile Field'), 'url'=>array('create')),
    array('label'=>UserModule::t('View Profile Field'), 'url'=>array('view','id'=>$model->id)),
    array('label'=>UserModule::t('Manage Profile Field'), 'url'=>array('admin')),
    array('label'=>UserModule::t('Manage Users'), 'url'=>array('/user/admin')),
);
?>
<div class="widget stacked ">
    <div class="widget-header">
        <i class="icon-cog"></i>
        <h3><?php echo UserModule::t('Update Profile Field ').$model->id; ?></h3>
    </div> <!-- /widget-header -->

    <div class="widget-content">

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
    </div> <!-- /widget-content -->
</div>