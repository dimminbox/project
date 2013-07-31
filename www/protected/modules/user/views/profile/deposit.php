<?php $this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Profile");
$this->breadcrumbs=array(
    UserModule::t("Profile"),
);
$this->menu=array(
    ((UserModule::isAdmin())
        ?array('label'=>UserModule::t('Manage Users'), 'url'=>array('/user/admin'))
        :array()),
    array('label'=>UserModule::t('List User'), 'url'=>array('/user')),
    array('label'=>UserModule::t('Deposit'), 'url'=>array('deposit')),
    array('label'=>UserModule::t('Referral'), 'url'=>array('referral')),
    array('label'=>UserModule::t('Edit'), 'url'=>array('edit')),
    array('label'=>UserModule::t('Change password'), 'url'=>array('changepassword')),
    array('label'=>UserModule::t('Logout'), 'url'=>array('/user/logout')),
);
?><h1><?php echo UserModule::t('Your profile'); ?></h1>

<?php if(Yii::app()->user->hasFlash('profileMessage')): ?>
    <div class="success">
        <?php echo Yii::app()->user->getFlash('profileMessage'); ?>
    </div>
<?php endif; ?>
<hr>
<h1>Пополнение счета</h1>



<div class="form">
    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'deposit-form',
        'action' => 'https://perfectmoney.is/api/step1.asp',
        'enableClientValidation'=>true,
        'clientOptions'=>array(
            'validateOnSubmit'=>true,
        ),
    )); ?>

    <?php echo $form->hiddenField($deposit,'PAYEE_ACCOUNT', array('name' => 'PAYEE_ACCOUNT')); ?>
    <?php echo $form->hiddenField($deposit,'PAYEE_NAME', array('name' => 'PAYEE_NAME')); ?>
    <?php echo $form->hiddenField($deposit,'PAYMENT_ID', array('name' => 'PAYMENT_ID')); ?>
    <?php echo $form->labelEx($deposit,'PAYMENT_AMOUNT'); ?>
    <?php echo $form->textField($deposit,'PAYMENT_AMOUNT', array('name' => 'PAYMENT_AMOUNT')); ?>
    <?php echo $form->hiddenField($deposit,'PAYMENT_UNITS', array('name' => 'PAYMENT_UNITS')); ?>
    <?php echo $form->hiddenField($deposit,'STATUS_URL', array('name' => 'STATUS_URL')); ?>
    <?php echo $form->hiddenField($deposit,'PAYMENT_URL', array('name' => 'PAYMENT_URL')); ?>
    <?php echo $form->hiddenField($deposit,'PAYMENT_URL_METHOD', array('name' => 'PAYMENT_URL_METHOD')); ?>
    <?php echo $form->hiddenField($deposit,'NOPAYMENT_URL', array('name' => 'NOPAYMENT_URL')); ?>

    <div class="row buttons">
        <?php echo CHtml::submitButton('Пополнить счет', array('name', 'PAYMENT_METHOD')); ?>
    </div>

    <?php $this->endWidget(); ?>
</div>