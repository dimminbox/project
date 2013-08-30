<?php $this->pageTitle = Yii::app()->name . ' - ' . UserModule::t("Change Password");
$this->breadcrumbs = array(
    UserModule::t("Profile") => array('/profile'),
    UserModule::t("Edit profile") => array('/user/profile/edit'),
    UserModule::t("Change Password"),
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
                <?php echo UserModule::t("Change password"); ?>
            </h3></div>
        <div class="widget-content">


            <div class="form">
                <?php $form = $this->beginWidget('CActiveForm', array(
                    'id' => 'changepassword-form',
                    'enableAjaxValidation' => true,
                    'clientOptions' => array(
                        'validateOnSubmit' => true,
                    ),
                )); ?>

                <p class="note"><?php echo UserModule::t('Fields with <span class="required">*</span> are required.'); ?></p>
                <?php echo $form->errorSummary($model); ?>

                <div>
                    <?php echo $form->labelEx($model, 'oldPassword'); ?>
                    <?php echo $form->passwordField($model, 'oldPassword'); ?>
                    <?php echo $form->error($model, 'oldPassword'); ?>
                </div>

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
                    <?php echo CHtml::submitButton(UserModule::t("Save")); ?>
                </div>

                <?php $this->endWidget(); ?>
            </div>
            <!-- form -->
        </div>
    </div>
