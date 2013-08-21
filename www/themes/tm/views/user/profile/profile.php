<?php $this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Profile");
$this->breadcrumbs=array(
	UserModule::t("Profile"),
);
$this->menu=array(
	#array('label'=>UserModule::t('List User'), 'url'=>array('/user')),
    #array('label'=>UserModule::t('Investment'), 'url'=>array('/user/deposit')),
    array('label'=>UserModule::t('Referral'), 'url'=>array('referral')),
    array('label'=>UserModule::t('All operations'),'url'=>array('/user/profile/operations')),
    array('label'=>UserModule::t('All deposits'),'url'=>array('/user/profile/deposits')),
    array('label'=>UserModule::t('Edit'), 'url'=>array('edit')),

    array('label'=>UserModule::t('Logout'), 'url'=>array('/user/logout')),
);

?>

<?php if(Yii::app()->user->hasFlash('profileMessage')): ?>
<div class="success" style="text-align:center;padding:10px;color:green;font-weight:bold;border:1px solid green">
	<?php echo Yii::app()->user->getFlash('profileMessage'); ?>
</div>
<?php endif; ?>
<?php if(Yii::app()->user->hasFlash('profileMessageFail')): ?>
    <div class="fail" style="text-align:center;padding:10px;color:red;font-weight:bold;border:1px solid red">
        <?php echo Yii::app()->user->getFlash('profileMessageFail'); ?>
    </div>
<?php endif;?>
<h2><?php echo $user->username; ?></h2>

<?php


if ( $user->deposit != null ) {

    foreach( $user->deposit as $dep ) {

        $cookie = Yii::app()->request->cookies['deposit_message' . $dep->id]->value;

        if ( $dep->expire <= date('Y-m-d H:i:s', time() + 2592000) &&
            $cookie != 1 &&
            $dep->reinvest == 0
        ) {

            ?>

            <div id='deposit_message<?php echo $dep->id; ?>' style='position:relative;border:1px solid green;padding: 15px;margin-bottom: 10px;'>
                <div style='position:absolute;top:3px;right:5px;'>
                    <a id='deposit_message_close<?php echo $dep->id; ?>' href="#" style='text-decoration:none; color:black'>X</a></div>

                До срока окончания депозита #<strong><?php echo $dep->id; ?></strong> осталось менее 1го месяца.<br />
                Реинвестировать его еще на <?php echo $dep->deposit_type->type ?> ? <br />

                <?php echo CHtml::link('Да', $this->createAbsoluteUrl('/user/profile/depositReinvest', array(
                                                                        'deposit_id' => $dep->id,
                                                                        'reinvest' => Deposit::REINVEST_YES))) ?>
                <?php echo CHtml::link('нет', $this->createAbsoluteUrl('/user/profile/depositReinvest', array(
                    'deposit_id' => $dep->id,
                    'reinvest' => Deposit::REINVEST_NO))) ?>

            </div>

            <script type="text/javascript">

                $(document).ready(function(){
                    $('#deposit_message_close<?php echo $dep->id; ?>').click(function () {
                        $('#deposit_message<?php echo $dep->id; ?>').hide(200);
                        $.cookie('deposit_message<?php echo $dep->id; ?>', 1,{
                            expires: 1,
                            path: '/'
                         });
                    });
                });

            </script>
<?php
        }
    }
}
?>

<p>
<strong>Ваш баланс:</strong>
<?php echo (float)$user->amount; ?> бубликов.<br />
<?php echo CHtml::link('Пополнить счет', '#', array('onclick' => '$("#recharge_amount").dialog("open"); return false;',)); ?><br />
<?php echo CHtml::link('Вывести', '#', array('onclick' => '$("#output_money").dialog("open"); return false;',)); ?>
<?php $this->renderPartial('_recharge_amount', array('deposit' => $deposit)) ?>
<?php $this->renderPartial('_outputmoney', array('model' => $user)) ?>
<strong>Внутренний кошелек:</strong> <?php echo $user->internal_purse; ?><br />
<strong>Всего пополнено:</strong> <?php echo (float)$user->paymentAmount; ?><br />
<strong>Всего инвестировано:</strong> <?php echo (float)$user->investmentAmount; ?><br />
<strong>Всего заработано:</strong> <?php echo (float)$user->earningsAmount; ?><br />
<strong>Всего выведено:</strong> <?php echo (float)abs($user->outputAmount); ?><br />
<strong>Партнерская программа:</strong> <?php echo (float)$user->ReferralAmount; ?><br />
</p>

<p>
    <?php echo CHtml::link('Инвестировать', '#', array('onclick' => '$("#investment").dialog("open"); return false;',)); ?>
    <br />
    <?php $this->renderPartial('_investment', array('investment' => $investment, 'model' => $user)) ?>
</p>

<p>
    <?php echo CHtml::link('Перевести средства', '#', array('onclick' => '$("#transfer").dialog("open"); return false;',)); ?>
    <br />
    <?php $this->renderPartial('_transfer', array('transfer' => $transfer,'model' => $user)) ?>
</p>