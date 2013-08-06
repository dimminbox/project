<?php
$this->beginWidget(
    'zii.widgets.jui.CJuiDialog', array(
        'id'      => 'output_money',
        'options' => array(
            'title'    => 'Вывод средств',
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
            'id'=>'output-form',
            'action' => $this->createAbsoluteUrl('/user/profile/outputmoney'),
            'enableClientValidation'=>true,
            'clientOptions'=>array(
                'validateOnSubmit'=>true,
            ),
        )); ?>

        <?php echo 'Сумма' ?>
        <?php echo CHtml::textField('output_money', (float)$model->amount); ?>

        <div class="row buttons">
            <?php echo CHtml::submitButton('Вывести'); ?>
        </div>

        <?php $this->endWidget(); ?>
    </div>
<?php $this->endWidget('zii.widgets.jui.CJuiDialog');?>