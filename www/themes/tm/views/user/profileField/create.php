<?php
$this->breadcrumbs=array(
	UserModule::t('Profile Fields')=>array('admin'),
	UserModule::t('Create'),
);
$this->menu=array(
    array('label'=>UserModule::t('Manage Profile Field'), 'url'=>array('admin')),
    array('label'=>UserModule::t('Manage Users'), 'url'=>array('/user/admin')),
);
?>
<div class="widget stacked ">
    <div class="widget-header">
        <i class="icon-cog"></i>
        <h3><?php echo UserModule::t('Create Profile Field'); ?></h3>
    </div> <!-- /widget-header -->

    <div class="widget-content">

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
    </div> <!-- /widget-content -->
</div>