<?php
$this->breadcrumbs=array(
	UserModule::t('Manage')=>array('admin'),
	UserModule::t('Create'),
);

$this->menu=array(
    array('label'=>UserModule::t('Manage Users'), 'url'=>array('admin')),
    array('label'=>UserModule::t('Manage Profile Field'), 'url'=>array('profileField/admin')),
   # array('label'=>UserModule::t('List User'), 'url'=>array('/user')),
);
?>
<div class="widget stacked ">
    <div class="widget-header">
        <i class="icon-user"></i>
        <h3><?php echo UserModule::t("Create User"); ?></h3>
    </div> <!-- /widget-header -->

    <div class="widget-content">


<?php
	echo $this->renderPartial('_form', array('model'=>$model,'profile'=>$profile));
?>
    </div> <!-- /widget-content -->
</div>