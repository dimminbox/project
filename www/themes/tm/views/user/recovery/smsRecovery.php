<?php $this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Restore");
$this->breadcrumbs=array(
	UserModule::t("Login") => array('/user/login'),
	UserModule::t("Restore"),
);
$this->layout = '//layouts/login';
?>
<div class="container" >
    <div class="account-container stacked">
    <div class="content clearfix" >
<h1><?php echo UserModule::t("Restore"); ?></h1>

<?php if(Yii::app()->user->hasFlash('recoveryMessage')): ?>
<div class="success">
<?php echo Yii::app()->user->getFlash('recoveryMessage'); ?>
</div>
<?php else: ?>

<div class="form">
    <div class="login-fields"><p>
            <?php $form=$this->beginWidget('CActiveForm', array(
                'id'=>'recovery-form',
                // Please note: When you enable ajax validation, make sure the corresponding
                // controller action is handling ajax validation correctly.
                // There is a call to performAjaxValidation() commented in generated controller code.
                // See class documentation of CActiveForm for details on this.
                'enableAjaxValidation'=>false,
            )); ?>
	<div>
		<?php echo CHtml::textField('phone','',array('placeholder' => UserModule::t('Your phone number'))); ?>
		<p class="hint"><?php echo UserModule::t("Please enter your phone number.<br />(example: 1 212 222-33-44) "); ?></p>
	</div>

    <div>
        <button class="button btn btn-warning btn-large">
            <?php echo UserModule::t("Restore"); ?>
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
        <?php $this->endWidget(); ?>
</div><!-- form -->
<?php endif; ?>
        </div>
    </div>
</div>