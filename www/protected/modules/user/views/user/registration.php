<?php $this->pageTitle = Yii::app()->name . ' - ' . UserModule::t("Registration");
$this->breadcrumbs = array(
    UserModule::t("Registration"),
);
$this->layout = '//layouts/login';
?>
<div class="container">
    <div class="account-container-register stacked">
        <div class="content clearfix">
            <h1><?php echo UserModule::t("Register"); ?></h1>
            <div class="register-content">
            <?php $form = $this->beginWidget('UActiveForm', array(
                'id' => 'registration-form',
                'enableAjaxValidation' => true,
                'disableAjaxValidationAttributes' => array('RegistrationForm_verifyCode'),
                'clientOptions' => array(
                    'validateOnSubmit' => true,
                ),
                'htmlOptions' => array('enctype' => 'multipart/form-data'),
            )); ?>
            <?php if (Yii::app()->user->hasFlash('registration')): ?>
                <div class="success">
                    <?php echo Yii::app()->user->getFlash('registration'); ?>
                </div>
            <?php else: ?>
                <p class="note"><?php echo UserModule::t('Fields with <span class="required">*</span> are required.'); ?></p>
                <div>
                    <?php echo $form->labelEx($model, 'username'); ?>
                    <?php echo $form->textField($model, 'username'); ?>
                    <?php echo $form->error($model, 'username'); ?>
                </div>


                <?php echo $form->errorSummary(array($model, $profile)); ?>
                <div>
                    <?php echo $form->labelEx($model, 'password'); ?>
                    <?php echo $form->passwordField($model, 'password'); ?>
                    <?php echo $form->error($model, 'password'); ?>
                    <p class="hint">
                        <?php echo UserModule::t("Minimal password length 4 symbols."); ?>
                    </p>
                </div>

                <div>
                    <?php echo $form->labelEx($model, 'verifyPassword'); ?>
                    <?php echo $form->passwordField($model, 'verifyPassword'); ?>
                    <?php echo $form->error($model, 'verifyPassword'); ?>
                </div>

                <div>
                    <?php echo $form->labelEx($model, 'email'); ?>
                    <?php echo $form->textField($model, 'email'); ?>
                    <?php echo $form->error($model, 'email'); ?>
                </div>

                <div>
                    <?php echo $form->labelEx($model, 'secret'); ?>
                    <?php echo $form->textField($model, 'secret'); ?>
                    <?php echo $form->error($model, 'secret'); ?>
                </div>
                <?php if (Yii::app()->user->getState('ref') != null &&
                    $user = User::model()->referralUser(Yii::app()->user->getState('ref'))
                ) : ?>

                    <div>
                        <?php echo $form->labelEx($model, 'referrer'); ?>
                        <?php echo $form->textField($model, 'referrer', array('value' => $user->username,
                            'disabled' => 'disabled'
                        )); ?>
                        <?php echo $form->error($model, 'referrer'); ?>
                        <p class="hint">
                        </p>
                    </div>
                    <?php echo $form->hiddenField($model, 'referrer_id', array('value' => $user->id,)); ?>
                <?php endif; ?>
                </div>
                <div float="left" width="300px">
                <h5>Данные необходимые для восстановления аккаунта</h5>
                <?php
                $profileFields = $profile->getFields();
                if ($profileFields) {
                    foreach ($profileFields as $field) {
                        ?>
                        <div>
                            <?php echo $form->labelEx($profile, $field->varname); ?>
                            <?php
                            if ($widgetEdit = $field->widgetEdit($profile)) {
                                echo $widgetEdit;
                            } elseif ($field->range) {
                                echo $form->dropDownList($profile, $field->varname, Profile::range($field->range));
                            } elseif ($field->field_type == "TEXT") {
                                echo $form->textArea($profile, $field->varname, array('rows' => 6, 'cols' => 50));
                            } else {
                                echo $form->textField($profile, $field->varname, array('size' => 60, 'maxlength' => (($field->field_size) ? $field->field_size : 255)));
                            }
                            ?>
                            <?php echo $form->error($profile, $field->varname); ?>
                        </div>
                    <?php
                    }
                }
                ?>
                </div>
            <div style='clear:both'></div>
            <div style='padding-left: 120px;'>
                <?php if (UserModule::doCaptcha('registration')): ?>
                    <div>
                        <?php echo $form->labelEx($model, 'verifyCode'); ?>

                        <?php $this->widget('CCaptcha'); ?>
                        <?php echo $form->textField($model, 'verifyCode'); ?>
                        <?php echo $form->error($model, 'verifyCode'); ?>

                        <p class="hint"><?php echo UserModule::t("Please enter the letters as they are shown in the image above."); ?>
                            <br/><?php echo UserModule::t("Letters are not case-sensitive."); ?></p>
                    </div>
                <?php endif; ?>
                <div>
                    <button class="button btn btn-warning btn-large">
                        <?php echo UserModule::t("Register"); ?>
                    </button>
                </div>
            <?php endif; ?>
            <?php $this->endWidget(); ?>
            </div>


    </div>
</div>



