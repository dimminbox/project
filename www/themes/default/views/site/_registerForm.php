<div class="form">
    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'register-form',
        'enableClientValidation'=>false,
    )); ?>

    <div class="row">
        <?php echo $form->labelEx($model,'name'); ?>
        <?php echo $form->textField($model,'name'); ?>
        <?php echo $form->error($model,'name'); ?>
        <p class="hint">
        </p>
    </div>

    <div class="row">
        <label for="RegisterForm_email" class="required">E-mail <span class="required">*</span></label>
        <?php echo $form->textField($model,'email'); ?>
        <?php echo $form->error($model,'email'); ?>
        <p class="hint">
        </p>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'password'); ?>
        <?php echo $form->passwordField($model,'password'); ?>
        <?php echo $form->error($model,'password'); ?>
        <p class="hint">
        </p>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'password_repeat'); ?>
        <?php echo $form->passwordField($model,'password_repeat'); ?>
        <?php echo $form->error($model,'password_repeat'); ?>
        <p class="hint">
        </p>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'tel'); ?>
        <?php echo $form->textField($model,'tel'); ?>
        <?php echo $form->error($model,'tel'); ?>
        <p class="hint">
        </p>
    </div>

    <?php if ( Yii::app()->user->getState('ref') != null ) {
        echo 'Реферал: ' . Yii::app()->user->getState('ref');
    } ?>

    <div class="row buttons">
        <?php echo CHtml::submitButton('Зарегистрироваться'); ?>
        <!-- a class="alter-button" href="#"
           onclick="$('.register-block').hide();$('.login-block').show();return false;">
            Уже есть аккаунт</a -->
    </div>


    <?php $this->endWidget(); ?>
</div><!-- form -->