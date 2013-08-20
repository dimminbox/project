<?php
$this->breadcrumbs=array(
	UserModule::t('Manage')=>array('admin'),
	$model->username,
);


$this->menu=array(
    array('label'=>UserModule::t('Create User'), 'url'=>array('create')),
    array('label'=>UserModule::t('Update User'), 'url'=>array('update','id'=>$model->id)),
    array('label'=>UserModule::t('Delete User'), 'url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>UserModule::t('Are you sure to delete this item?'))),
    array('label'=>UserModule::t('Manage Users'), 'url'=>array('admin')),
    array('label'=>UserModule::t('Manage Profile Field'), 'url'=>array('profileField/admin')),
   # array('label'=>UserModule::t('List User'), 'url'=>array('/user')),
);
?>
<div style="width: 48%; float: left;">
    <h1><?php echo UserModule::t('View User').' "'.$model->username.'"'; ?></h1>
        <?php

        $attributes = array(
            'username',
            'secret',
        );

        $profileFields=ProfileField::model()->forOwner()->sort()->findAll();
        if ($profileFields) {
            foreach($profileFields as $field) {
                array_push($attributes,array(
                        'label' => UserModule::t($field->title),
                        'name' => $field->varname,
                        'type'=>'raw',
                        'value' => (($field->widgetView($model->profile))?$field->widgetView($model->profile):(($field->range)?Profile::range($field->range,$model->profile->getAttribute($field->varname)):$model->profile->getAttribute($field->varname))),
                    ));
            }
        }

        array_push($attributes,
            'email',
            'create_at',
            'lastvisit_at'
        );

        $this->widget('zii.widgets.CDetailView', array(
            'data'=>$model,
            'attributes'=>$attributes,
        ));
        ?>
</div>

<div style="width: 45%; float: left; padding-left: 20px;">
    <h1><?php echo 'Баланс пользователя' ?></h1>
    <h3><?php echo $model->userAmount($model->id);?></h3>
    <?php echo CHtml::link('Подробнее...', $this->createAbsoluteUrl('/admin/default/operations')) ?>
    <h1><?php echo 'Сумма депозитов' ?></h1>
    <h3><?php echo $model->adminInvestmentAmount($model->id);?></h3>
    <?php echo CHtml::link('Подробнее...', $this->createAbsoluteUrl('/admin/default/deposits')) ?>
    <h1><?php echo 'Количество реферралов' ?></h1>
    <h3><?php echo $model->countReferral($model->id);?></h3>
</div>

<div style="clear: both"></div>


