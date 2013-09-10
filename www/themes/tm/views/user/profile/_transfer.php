<?php
$this->beginWidget(
    'zii.widgets.jui.CJuiDialog', array(
        'id'      => 'transfer',
        'options' => array(
            'title'    => UserModule::t('Transfer cash'),
            'autoOpen' => false,
            'modal'    => 'true',
            'width'    => '250',
            'height'   => 'auto',
            'resizable'=> false,
        ),
    )
); ?>

        <?php $form=$this->beginWidget('CActiveForm', array(
            'id'=>'transfer-form',
            'action' => $this->createAbsoluteUrl('/user/profile/transfer'),
            'enableClientValidation'=>true,
            'clientOptions'=>array(
                'validateOnSubmit'=>true,
            ),
            'htmlOptions' => array(
                'class' => 'modal-window'
            ),
        )); ?>

            <?php echo $form->labelEx($model,UserModule::t('Internal purse')); ?>
            <?php echo $form->textField($model,'internal_purse', array('value' => '')); ?>
            <?php echo $form->error($model,'internal_purse'); ?>

            <?php echo $form->labelEx($model,UserModule::t('Secret')); ?>
            <?php echo $form->textField($model,'secret', array('value' => '')); ?>
            <?php echo $form->error($model,'secret'); ?>

            <?php echo $form->labelEx($transfer,UserModule::t('Amount')); ?>
            <?php echo $form->textField($transfer,'amount'); ?>
            <?php echo $form->error($transfer,'amount'); ?>

             <br />
            <?php echo CHtml::submitButton(UserModule::t('Transfer'),array('class'=>'btn btn-large btn-primary')); ?>


        <?php $this->endWidget(); ?>

<?php $this->endWidget('zii.widgets.jui.CJuiDialog');?>