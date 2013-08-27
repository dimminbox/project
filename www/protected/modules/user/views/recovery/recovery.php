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
<?php echo CHtml::beginForm(); ?>

	<?php echo CHtml::errorSummary($form); ?>
	
	<div>
		<?php echo CHtml::activeTextField($form,'login_or_email',array('placeholder' => 'Логин или email')); ?>
		<p class="hint"><?php echo UserModule::t("Please enter your login or email addres."); ?></p>
	</div>

    <div>
        <button class="button btn btn-warning btn-large">
            <?php echo UserModule::t("Restore"); ?>
        </button>
    </div>

<?php echo CHtml::endForm(); ?>
</div><!-- form -->
<?php endif; ?>
        </div>
    </div>
</div>