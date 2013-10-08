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
            <h1><?php echo UserModule::t("Change password"); ?></h1>

            <?php if (Yii::app()->user->hasFlash('activation')): ?>
                <div class="success">
                    <?php echo Yii::app()->user->getFlash('activation'); ?>
                </div>
            <?php endif ?>
            <div class="login-fields"><p>
                    <?php echo CHtml::beginForm(); ?>

                <?php echo CHtml::errorSummary($form); ?>

                <div class="field">
                    <?php echo CHtml::activeLabelEx($form,'password'); ?>
                    <?php echo CHtml::activePasswordField($form,'password'); ?>
                    <p class="hint">
                        <?php echo UserModule::t("Minimal password length 4 symbols."); ?>
                    </p>
                </div>

                <div class="field">
                    <?php echo CHtml::activeLabelEx($form,'verifyPassword'); ?>
                    <?php echo CHtml::activePasswordField($form,'verifyPassword'); ?>
                </div>

                <div>
                    <button class="button btn btn-warning btn-large">
                        <?php echo UserModule::t("Save"); ?>
                    </button>
                </div>


                <?php echo CHtml::endForm(); ?>

            </div>


        </div>
        <!-- form -->


    </div>
    <!-- .actions -->
</div>
<!-- /content -->
