<?php
$this->beginWidget(
    'zii.widgets.jui.CJuiDialog', array(
        'id'      => 'recharge_amount',
        'options' => array(
            'title'    => 'Пополнить счет',
            'autoOpen' => false,
            'modal'    => 'true',
            'width'    => '350',
            'height'   => 'auto',
            'resizable'=> false,
        ),
    )
); ?>

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
<?php $this->endWidget('zii.widgets.jui.CJuiDialog');?>