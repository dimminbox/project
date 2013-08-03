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
    'id'=>'investment',
    'action' => '/user/profile/investment',
    'enableClientValidation'=>true,
    'enableAjaxValidation' => true,
    'clientOptions'=>array(
        'validateOnSubmit'=>true,
    ),
)); ?>
    <div class="row">
        <?php echo $form->labelEx($investment,'deposit_amount'); ?>
        <?php echo $form->textField($investment,'deposit_amount', array('value' => Deposit::MIN_AMOUNT)); ?>
        <?php echo $form->error($investment,'deposit_amount'); ?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($investment,'deposit_type'); ?>
        <?php echo $form->radioButtonList($investment,'deposit_type', $investment->deposit_type); ?>
        <?php echo $form->error($investment,'deposit_type'); ?>
    </div>
<div class="row buttons">
    <?php echo CHtml::submitButton('Инвестировать'); ?>
</div>

<?php $this->endWidget(); ?>
</div>
<?php $this->endWidget('zii.widgets.jui.CJuiDialog');?>