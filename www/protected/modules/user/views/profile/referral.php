<?php $this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Profile");
$this->breadcrumbs=array(
    UserModule::t("Profile") => array('/user/profile'),
    UserModule::t("Партнерская программа"),
);
$this->menu=array(
#array('label'=>UserModule::t('List User'), 'url'=>array('/user')),
#array('label'=>UserModule::t('Investment'), 'url'=>array('/user/deposit')),
    array('label'=>UserModule::t('Referral'), 'url'=>array('referral')),
    array('label'=>UserModule::t('All operations'),'url'=>array('/user/profile/operations')),
    array('label'=>UserModule::t('All deposits'),'url'=>array('/user/profile/deposits')),
    array('label'=>UserModule::t('Edit'), 'url'=>array('edit')),
    array('label'=>UserModule::t('Change password'), 'url'=>array('changepassword')),
    array('label'=>UserModule::t('Logout'), 'url'=>array('/user/logout')),
);
?><h1><?php echo UserModule::t('Your profile'); ?></h1>

<?php if(Yii::app()->user->hasFlash('profileMessage')): ?>
    <div class="success">
        <?php echo Yii::app()->user->getFlash('profileMessage'); ?>
    </div>
<?php endif; ?>
<hr>
<h1>Партнерская программа</h1>
<p>
    <strong>Ваша реферальная ссылка:</strong> <?php  echo  CHtml::textField('referral_link', Yii::app()->request->hostInfo . '/?ref=' . $user->username) ?><br />
    <strong>Процентная ставка: <?php echo Referral::REFERRAL_PERCENT * 100 . ' %'; ?></strong><br />
</p>
</p>
<p>
<h2>Список рефералов:</h2>
</p>
<?php if ( !empty($user->refs) ) :?>
    <table>
        <thead>
        <tr><td>№</td><td>Имя реферрала</td><td>Сумма депозитов</td><td>Заработанная сумма</td></tr>
        </thead>

            <?php foreach ( $user->refs as $referral ): ?>
        <tr>
                <td><?php echo $referral->id ?></td>
                <td><?php echo $referral->user->username ?></td>
                <td><?php echo User::model()->referralDeposit($referral->ref_id)  ?></td>
                <td><?php echo User::model()->referralInvestment($referral->ref_id)  ?></td>
        </tr>
            <?php endforeach; ?>

    </table>
<?php else : ?>
    У Вас нет приглашенных инвесторов
<?php endif ?>
