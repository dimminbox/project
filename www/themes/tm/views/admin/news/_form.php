<?php
/* @var $this NewsController */
/* @var $model News */
/* @var $form CActiveForm */
?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'news-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note"><span class="required">*</span> Обязательные поля.</p>

	<?php echo $form->errorSummary($model); ?>

	<div>
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div>
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description', array('class' => 'redactor')); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div>
		<?php echo $form->labelEx($model,'text'); ?>
		<?php echo $form->textArea($model,'text', array('class' => 'redactor')); ?>
		<?php echo $form->error($model,'text'); ?>
	</div>
    <?php
    $this->widget('ImperaviRedactorWidget', array(
    // Селектор для textarea
    'selector' => '.redactor',
    // Немного опций, см. http://imperavi.com/redactor/docs/
    'options' => array(
        'lang' => 'ru',
        'toolbar' => true,
    ),
    )); ?>
	<!--div>
		<?php echo $form->labelEx($model,'image'); ?>
		<?php echo $form->textField($model,'image',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'image'); ?>
	</div-->
    <div class="">
        Загрузите Вашу фотографию, или мы присвоим Вам случайный юзерпик.<br /><br />
        <?php

        $this->widget(
            'ext.AjaxCrop.AjaxCropWidget',
            array(
                'model' => $model,
            )
        ); ?>

        <?php echo $form->error($model, 'image'); ?>
    </div>
	<!--div>
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->textField($model,'status'); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div>
		<?php echo $form->labelEx($model,'created_time'); ?>
		<?php echo $form->textField($model,'created_time'); ?>
		<?php echo $form->error($model,'created_time'); ?>
	</div>

	<div>
		<?php echo $form->labelEx($model,'update_time'); ?>
		<?php echo $form->textField($model,'update_time'); ?>
		<?php echo $form->error($model,'update_time'); ?>
	</div-->

	<div>
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>
