<?php
/* @var $this DepositTypeController */
/* @var $model DepositType */
/* @var $form CActiveForm */
?>



<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'deposit-type-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Поля отмеченные <span class="required">*</span> обязательны для заполнения.</p>

	<?php echo $form->errorSummary($model); ?>

	<div>
		<?php echo $form->labelEx($model,'type'); ?>
		<?php echo $form->textField($model,'type',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'type'); ?>
	</div>

    <div>
        <?php echo $form->labelEx($model,'description'); ?>
        <?php echo $form->textArea($model,'description',array()); ?>
        <?php echo $form->error($model,'description'); ?>
    </div>

	<div>
		<?php echo $form->labelEx($model,'percent'); ?>
		<?php echo $form->textField($model,'percent'); ?>
		<?php echo $form->error($model,'percent'); ?>
	</div>

    <div>
        <?php echo $form->labelEx($model,'days'); ?>
        <?php echo $form->textField($model,'days'); ?>
        <?php echo $form->error($model,'days'); ?>
    </div>

    <div>
        <?php echo $form->labelEx($model,'min_amount'); ?>
        <?php echo $form->textField($model,'min_amount'); ?>
        <?php echo $form->error($model,'min_amount'); ?>
    </div>

    <div>
        <?php echo $form->labelEx($model,'max_amount'); ?>
        <?php echo $form->textField($model,'max_amount'); ?>
        <?php echo $form->error($model,'max_amount'); ?>
    </div>

	<div>
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>
