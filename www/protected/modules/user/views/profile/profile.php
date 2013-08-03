<?php $this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Profile");
$this->breadcrumbs=array(
	UserModule::t("Profile"),
);
$this->menu=array(
	((UserModule::isAdmin())
		?array('label'=>UserModule::t('Manage Users'), 'url'=>array('/user/admin'))
		:array()),
    array('label'=>UserModule::t('List User'), 'url'=>array('/user')),
    array('label'=>UserModule::t('Investment'), 'url'=>array('/user/deposit')),
    array('label'=>UserModule::t('Referral'), 'url'=>array('referral')),
    array('label'=>UserModule::t('Edit'), 'url'=>array('edit')),
    array('label'=>UserModule::t('Change password'), 'url'=>array('changepassword')),
    array('label'=>UserModule::t('Logout'), 'url'=>array('/user/logout')),
);
?>
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
<h2><?php echo $model->username; ?></h2>

<?php if ( $model->lastvisit_at != '0000-00-00 00:00:00' ) : ?>
<p>
    Ваш последний визит: <?php echo $model->lastvisit_at; ?><br />
</p>
<?php endif; ?>
<p>
<strong>Ваш баланс:</strong>
<?php
if ($model->amount) {
    echo rtrim($model->amount,"0");
} else {
    echo 0;
}
 ?> бубликов.<br />
<?php echo CHtml::link('Пополнить счет', '#', array('onclick' => '$("#recharge_amount").dialog("open"); return false;',)); ?>
<?php $this->renderPartial('_recharge_amount', array('deposit' => $deposit)) ?><br />
<strong>Внутренний кошелек:</strong> <?php echo $model->internal_purse; ?><br />
<strong>Всего пополнено:</strong> #<br />
<strong>Всего инвестировано:</strong> #<br />
<strong>Всего заработано:</strong> #<br />
<strong>Всего выведено:</strong> #<br />
<strong>Партнерская программа:</strong> #<br />
</p>

<p>
    <?php echo CHtml::link('Инвестировать', '#', array('onclick' => '$("#investment").dialog("open"); return false;',)); ?>
    <br />
    <?php $this->renderPartial('_investment', array('investment' => $investment)) ?>
</p>