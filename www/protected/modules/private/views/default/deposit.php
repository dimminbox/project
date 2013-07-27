<?php

/* @var $this PrivateController */
/* @var $model DepositForm */
/* @var $form ActiveForm */

$this->pageTitle=Yii::app()->name . ' - Пополнение счета';
$this->breadcrumbs=array(
    'Личный кабинет' => array('/private'),
    'Пополнение счета',
);
?>

    <h1>Пополнение счета</h1>

<?php
foreach(Yii::app()->user->getFlashes() as $key => $message) {
    echo '<div class="flash-' . $key . '">' . $message . "</div>\n";
}
?>

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
    <?php echo $form->hiddenField($deposit,'PAYMENT_URL', array('name' => 'PAYMENT_URL')); ?>
    <?php echo $form->hiddenField($deposit,'PAYMENT_URL_METHOD', array('name' => 'PAYMENT_URL_METHOD')); ?>
    <?php echo $form->hiddenField($deposit,'NOPAYMENT_URL', array('name' => 'NOPAYMENT_URL')); ?>
    <?php echo $form->hiddenField($deposit,'NOPAYMENT_URL', array('name' => 'NOPAYMENT_URL')); ?>

    <div class="row buttons">
        <?php echo CHtml::submitButton('Пополнить счет', array('name', 'PAYMENT_METHOD')); ?>
    </div>

    <?php $this->endWidget(); ?>
</div><!-- form -->



<!--form action="https://perfectmoney.is/api/step1.asp" method="POST">
    <input type="hidden" name="PAYEE_ACCOUNT" value="U4330448">
    <input type="hidden" name="PAYEE_NAME" value="yborsc">
    <input type="hidden" name="PAYMENT_ID" value="upmoney">
    <input type="text" name="PAYMENT_AMOUNT" value=""><BR>
    <input type="hidden" name="PAYMENT_UNITS" value="USD">
    <input type="hidden" name="STATUS_URL" value="">
    <input type="hidden" name="PAYMENT_URL" value="http://yborsc.bget.ru/index.php/private/default/depositSucces">
    <input type="hidden" name="PAYMENT_URL_METHOD" value="POST">
    <input type="hidden" name="NOPAYMENT_URL" value="http://yborsc.bget.ru/index.php/private/default/depositFail">
    <input type="hidden" name="NOPAYMENT_URL_METHOD" value="POST">
    <input type="hidden" name="SUGGESTED_MEMO" value="">
    <input type="hidden" name="BAGGAGE_FIELDS" value="">
    <input type="submit" name="PAYMENT_METHOD" value="Pay Now!"-->
</form>