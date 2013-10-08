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
            <h1><?php echo UserModule::t("Enter Activate Code"); ?></h1>

            <div class="login-fields"><p>
                    <?php $form=$this->beginWidget('CActiveForm', array(
                        'id'=>'activate-form',
                        // Please note: When you enable ajax validation, make sure the corresponding
                        // controller action is handling ajax validation correctly.
                        // There is a call to performAjaxValidation() commented in generated controller code.
                        // See class documentation of CActiveForm for details on this.
                        'enableAjaxValidation'=>false,
                    )); ?>

                    <?php if (Yii::app()->user->hasFlash('errorActivationCode')): ?>
                <div class="fail" style="margin: 0 auto 25px auto;width:60%;text-align:center;padding:10px;color:red;font-weight:bold;border:2px solid red">
                    <?php echo Yii::app()->user->getFlash('errorActivationCode'); ?>
                </div>
                <?php endif; ?>

                <div class='field'>
                    <?php echo CHtml::activeLabelEx($model, 'activkey'); ?>
                    <?php echo CHtml::activeTextField($model, 'activkey', array('class' => 'login', 'value'=>'')) ?>
                </div>

                <div>
                    <button class="button btn btn-warning btn-large">
                        <?php echo UserModule::t("Activate"); ?>
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

            <?php $this->endWidget(); ?>
        </div>
        <!-- form -->


    </div>
    <!-- .actions -->
</div>
<!-- /content -->
</div>
</div>
<!-- /account-container -->
<!-- /login-extra -->

<!-- Le javascript
================================================== -->

<!-- Placed at the end of the document so the pages load faster -->
<script src="./js/libs/jquery-1.8.3.min.js"></script>
<script src="./js/libs/jquery-ui-1.10.0.custom.min.js"></script>
<script src="./js/libs/bootstrap.min.js"></script>
<script src="./js/Application.js"></script>
<script src="./js/signin.js"></script><a id="back-to-top" href="#top" style="display: none;"><i
        class="icon-chevron-up"></i></a></body></html>


<div class="form">
