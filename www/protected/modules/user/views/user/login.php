<?php
$this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Login");
$this->breadcrumbs=array(
    UserModule::t("Login"),
);
$this->layout='//layouts/login';
?>
<div class="container" >
    <div class="account-container stacked">
        <div class="content clearfix" >
            <h1><?php echo UserModule::t("Login"); ?></h1>
            <div class="login-fields"><p>
                <?php echo CHtml::beginForm(); ?>


                <?php echo CHtml::errorSummary($model); ?>

                    <div class='field'>
                        <?php echo CHtml::activeLabelEx($model,'username'); ?>
                        <?php echo CHtml::activeTextField($model,'username', array('class' => 'login', 'placeholder' => 'Логин')) ?>
                    </div>

                <div class='field'>
                    <?php echo CHtml::activeLabelEx($model,'password'); ?>
                    <?php echo CHtml::activePasswordField($model,'password', array('class' => 'login', 'placeholder' => 'Пароль')) ?>
                </div>

                <div>
                    <p class="hint">
                        <?php echo CHtml::link(UserModule::t("Register"),Yii::app()->getModule('user')->registrationUrl); ?> | <?php echo CHtml::link(UserModule::t("Lost Password?"),Yii::app()->getModule('user')->recoveryUrl); ?>
                    </p>
                </div>

                <div >
                    <?php echo UserModule::t("Remember me next time") ?>

                    <?php echo CHtml::activeCheckBox($model,'rememberMe'); ?>

                </div>

                <div>
                    <button class="button btn btn-warning btn-large">
                        <?php echo UserModule::t("Login"); ?>
                    </button>
                </div>
                <div>
                    <button class="btn btn-large btn-tertiary" action="index">
                        <?php echo UserModule::t("Cancel"); ?>
                    </button>
                </div>
                

                <?php echo CHtml::endForm(); ?>
            </div><!-- form -->


        </div>
        <!-- .actions -->
        </form></div>
    <!-- /content -->
</div>
</div>
<!-- /account-container -->
<!-- /login-extra -->

<!-- Le javascript
================================================== -->

<!-- Placed at the end of the document so the pages load faster -->
<script src="./js/libs/jquery-1.8.3.min.js"></script><script src="./js/libs/jquery-ui-1.10.0.custom.min.js"></script><script src="./js/libs/bootstrap.min.js"></script><script src="./js/Application.js"></script><script src="./js/signin.js"></script><a id="back-to-top" href="#top" style="display: none;"><i class="icon-chevron-up"></i></a></body></html>







<div class="form">
