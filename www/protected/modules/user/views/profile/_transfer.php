<?php
$this->beginWidget(
    'zii.widgets.jui.CJuiDialog', array(
        'id'      => 'transfer',
        'options' => array(
            'title'    => 'Перевод средств',
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
            'id'=>'transfer-form',
            'action' => $this->createAbsoluteUrl('/user/profile/transfer'),
            'enableClientValidation'=>true,
            'clientOptions'=>array(
                'validateOnSubmit'=>true,
            ),
        )); ?>
        <div class="row">
            <?php echo $form->labelEx($model,'Кошелек'); ?>
            <?php echo $form->textField($model,'internal_purse', array('value' => '')); ?>
            <?php echo $form->error($model,'internal_purse'); ?>
        </div>
        <div class="row">
            <?php echo $form->labelEx($transfer,'Сумма'); ?>
            <?php echo $form->textField($transfer,'amount'); ?>
            <?php echo $form->error($transfer,'amount'); ?>
        </div>
        <div class="row buttons">
            <?php echo CHtml::submitButton('Перевести'); ?>
        </div>

        <?php $this->endWidget(); ?>
    </div>
<?php $this->endWidget('zii.widgets.jui.CJuiDialog');?>