<?php $this->pageTitle = Yii::app()->name . ' - ' . UserModule::t("Profile");
$this->breadcrumbs = array(
    UserModule::t("Profile") => array('/profile'),
    UserModule::t("Edit"),
);
$this->menu = array(
#array('label'=>UserModule::t('List User'), 'url'=>array('/user')),
#array('label'=>UserModule::t('Investment'), 'url'=>array('/user/deposit')),
    array('label' => UserModule::t('All operations'), 'url' => array('/user/profile/operations')),
    array('label' => UserModule::t('All deposits'), 'url' => array('/user/profile/deposits')),
    array('label' => UserModule::t('Referral'), 'url' => array('referral')),
    array('label' => UserModule::t('EditProfile'), 'url' => array('edit')),
    array('label' => UserModule::t('Logout'), 'url' => array('/user/logout')),
);
?>
<div class="span12">
    <div class="widget stacked">
        <div class="widget-header">
            <i class="icon-wrench"></i>

            <h3>
                <?php echo UserModule::t('Edit profile'); ?>
            </h3></div>

        <div class="widget-content">
            <?php if (Yii::app()->user->hasFlash('profileMessage')): ?>
                <div class="success">
                    <?php echo Yii::app()->user->getFlash('profileMessage'); ?>
                </div>
            <?php endif; ?>
            <div class="form">
                <?php $form = $this->beginWidget('CActiveForm', array(
                    'id' => 'profile-form',
                    'enableAjaxValidation' => true,
                    'htmlOptions' => array('enctype' => 'multipart/form-data'),
                )); ?>

                <p class="note"><?php echo UserModule::t('Fields with <span class="required">*</span> are required.'); ?></p>

                <?php echo $form->errorSummary(array($model, $profile)); ?>

                <?php
                $profileFields = $profile->getFields();
                if ($profileFields) {
                    foreach ($profileFields as $field) {
                        ?>
                        <div>
                            <?php echo $form->labelEx($profile, $field->varname);

                            if ($widgetEdit = $field->widgetEdit($profile)) {
                                echo $widgetEdit;
                            } elseif ($field->range) {
                                echo $form->dropDownList($profile, $field->varname, Profile::range($field->range));
                            } elseif ($field->field_type == "TEXT") {
                                echo $form->textArea($profile, $field->varname, array('rows' => 6, 'cols' => 50));
                            } else {
                                echo $form->textField($profile, $field->varname, array('size' => 60, 'maxlength' => (($field->field_size) ? $field->field_size : 255)));
                            }
                            echo $form->error($profile, $field->varname); ?>
                        </div>
                    <?php
                    }
                }
                ?>
                <div>
                    <?php echo $form->labelEx($model, 'username'); ?>
                    <?php echo $form->textField($model, 'username', array('size' => 20, 'maxlength' => 20)); ?>
                    <?php echo $form->error($model, 'username'); ?>
                </div>

                <div>
                    <?php echo $form->labelEx($model, 'email'); ?>
                    <?php echo $form->textField($model, 'email', array('size' => 60, 'maxlength' => 128)); ?>
                    <?php echo $form->error($model, 'email'); ?>
                </div>
                <div>
                    <?php echo $form->labelEx($model, 'perfect_purse'); ?>
                    <?php echo $form->textField($model, 'perfect_purse', array('size' => 60, 'maxlength' => 128)); ?>
                    <?php echo $form->error($model, 'perfect_purse'); ?>
                </div>

                <?php echo CHtml::link('Изменить пароль', $this->createAbsoluteUrl('/user/profile/changepassword')); ?>
                <br/>

                <div>
                    <?php echo CHtml::submitButton($model->isNewRecord ? UserModule::t('Create') : UserModule::t('Save')); ?>
                </div>

                <?php $this->endWidget(); ?>

            </div>
        </div>
        <!-- form -->
    </div>
</div>