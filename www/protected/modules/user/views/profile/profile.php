<?php $this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Profile");
$this->breadcrumbs=array(
	UserModule::t("Profile"),
);
$this->menu=array(
	((UserModule::isAdmin())
		?array('label'=>UserModule::t('Manage Users'), 'url'=>array('/user/admin'))
		:array()),
    array('label'=>UserModule::t('List User'), 'url'=>array('/user')),
    array('label'=>UserModule::t('Referral'), 'url'=>array('referral')),
    array('label'=>UserModule::t('Edit'), 'url'=>array('edit')),
    array('label'=>UserModule::t('Change password'), 'url'=>array('changepassword')),
    array('label'=>UserModule::t('Logout'), 'url'=>array('/user/logout')),
);
?><h1><?php echo UserModule::t('Your profile'); ?></h1>

<?php if(Yii::app()->user->hasFlash('profileMessage')): ?>
<div class="success" style="text-align:center;padding:10px;color:green;font-weight:bold;border:1px solid green">
	<?php echo Yii::app()->user->getFlash('profileMessage'); ?>
</div>
<?php endif; ?>
<?php if(Yii::app()->user->hasFlash('profileMessageFail')): ?>
    <div class="fail" style="text-align:center;padding:10px;color:red;font-weight:bold;border:1px solid red">
        <?php echo Yii::app()->user->getFlash('profileMessageFail'); ?>
    </div>
<?php endif;?>

<strong>Ваш баланс:</strong>
<?php echo sprintf("%0.0f", $model->amount); ?> бубликов.<br />
<?php $this->renderPartial('_recharge_amount', array('deposit' => $deposit)) ?>
<?php echo CHtml::link('Пополнить баланс', '#', array('onclick' => '$("#recharge_amount").dialog("open"); return false;',)); ?>
