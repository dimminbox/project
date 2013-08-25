<?php
$this->breadcrumbs=array(
	(UserModule::t('Manage'))=>array('admin'),
	$model->username=>array('view','id'=>$model->id),
	(UserModule::t('Update')),
);
$this->menu=array(
    array('label'=>UserModule::t('Create User'), 'url'=>array('create')),
    array('label'=>UserModule::t('View User'), 'url'=>array('view','id'=>$model->id)),
    array('label'=>UserModule::t('Manage Users'), 'url'=>array('admin')),
    array('label'=>UserModule::t('Manage Profile Field'), 'url'=>array('profileField/admin')),
   # array('label'=>UserModule::t('List User'), 'url'=>array('/user')),
);
?>
<div class="widget stacked ">
    <div class="widget-header">
        <i class="icon-user"></i>
        <h3><?php echo  UserModule::t('Update User')." ".$model->id; ?></h3>
    </div> <!-- /widget-header -->

    <div class="widget-content">

<?php
	echo $this->renderPartial('_form', array('model'=>$model,'profile'=>$profile));
?>
    </div> <!-- /widget-content -->
</div>
