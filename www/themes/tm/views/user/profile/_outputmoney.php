<?php
$this->beginWidget(
    'zii.widgets.jui.CJuiDialog', array(
        'id'      => 'output_money',
        'options' => array(
            'title'    => UserModule::t('Cash out'),
            'autoOpen' => false,
            'modal'    => 'true',
            'width'    => '250',
            'height'   => 'auto',
            'resizable'=> false,
        ),
    )
); ?>


        <?php $form=$this->beginWidget('CActiveForm', array(
            'id'=>'output-form',
            'action' => $this->createAbsoluteUrl('/user/profile/outputmoney'),
            'enableClientValidation'=>true,
            'clientOptions'=>array(
                'validateOnSubmit'=>true,
            ),
            'htmlOptions' => array(
                'class' => 'modal-window'
            ),
        )); ?>

        <?php echo UserModule::t('Amount') ?>
        <?php echo CHtml::textField(UserModule::t('Cash out'), (float)$model->amount); ?>
        <?php echo $form->labelEx($model,'secret'); ?>
        <?php echo $form->textField($model,'secret', array('value' => '')); ?>
        <?php echo $form->error($model,'secret'); ?>

        <br />
        <?php echo CHtml::submitButton('Cash out',array('class'=>'btn btn-large btn-primary')); ?>

        <?php $this->endWidget(); ?>

<?php $this->endWidget('zii.widgets.jui.CJuiDialog');?>