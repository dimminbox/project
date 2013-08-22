<?php
$this->beginWidget(
    'zii.widgets.jui.CJuiDialog', array(
        'id'      => 'investment',
        'options' => array(
            'title'    => 'Инвестирование',
            'autoOpen' => false,
            'modal'    => 'true',
            'width'    => '250',
            'height'   => 'auto',
            'resizable'=> false,
        ),
    )
); ?>
<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'investment-form',
    'action' => $this->createAbsoluteUrl('/user/profile/investment'),
    'enableClientValidation'=>true,
    'clientOptions'=>array(
        'validateOnSubmit'=>true,
    ),
    'htmlOptions' => array(
        'class' => 'modal-window'
    ),
)); ?>

        <?php echo $form->labelEx($investment,'deposit_amount'); ?>
        <?php echo $form->textField($investment,'deposit_amount', array('value' => Deposit::MIN_AMOUNT)); ?>
        <?php echo $form->error($investment,'deposit_amount'); ?>

        <?php echo $form->labelEx($investment,'deposit_type_id'); ?>
        <?php echo $form->dropDownList($investment,'deposit_type_id', CHtml::listData( DepositType::model()->findAll(), 'id', 'type') ); ?>
        <?php echo $form->error($investment,'deposit_type_id'); ?>

         <?php echo CHtml::submitButton('Инвестировать',array('class'=>'btn btn-large btn-primary')); ?>


<?php $this->endWidget(); ?>
</div>
<?php $this->endWidget('zii.widgets.jui.CJuiDialog');?>