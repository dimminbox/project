<?php
$this->pageTitle = Yii::app()->name . ' - ' . UserModule::t("Login");
$this->breadcrumbs = array(
    UserModule::t("Login"),
);
$this->layout = '//layouts/login';
?>
<div class="container">
    <div class="account-container stacked">

        <div class="content clearfix">
            <h1><?php echo UserModule::t("Login"); ?></h1>

            <?php if (Yii::app()->user->hasFlash('activation')): ?>
                <div class="success">
                    <?php echo Yii::app()->user->getFlash('activation'); ?>
                </div>
            <?php endif ?>
            <div class="login-fields"><p>
                    <?php echo CHtml::beginForm(); ?>


                    <?php echo CHtml::errorSummary($model); ?>

                <div class='field'>
                    <?php echo CHtml::activeLabelEx($model, 'username'); ?>
                    <?php echo CHtml::activeTextField($model, 'username', array('class' => 'login', 'placeholder' => UserModule::t('Login'))) ?>
                </div>

                <div class='field'>
                    <?php echo CHtml::activeLabelEx($model, 'password'); ?>
                    <?php echo CHtml::activePasswordField($model, 'password', array('class' => 'login', 'placeholder' => UserModule::t('Password'))) ?>
                </div>

                <div>
                    <p class="hint">
                        <?php echo CHtml::link(UserModule::t("Register"), Yii::app()->getModule('user')->registrationUrl); ?>
                        | <?php echo CHtml::link(UserModule::t("Lost Password?"), Yii::app()->getModule('user')->recoveryUrl); ?>
                    </p>
                </div>

                <div>
                    <?php echo UserModule::t("Remember me next time") ?>

                    <?php echo CHtml::activeCheckBox($model, 'rememberMe'); ?>

                </div>

                <div>
                    <button class="button btn btn-warning btn-large">
                        <?php echo UserModule::t("Login"); ?>
                    </button>
                </div>

                <div>
                    <?php echo CHtml::link(UserModule::t("Cancel"),
                        array(
                            '/index.php',
                        ),

                        array(
                            'class' => 'button btn btn-large btn-secondary',
                        )
                    );
                    ?>
                </div>
            </div>


        </div>
        <!-- form -->


    </div>
    <!-- .actions -->
</div>
<!-- /content -->


