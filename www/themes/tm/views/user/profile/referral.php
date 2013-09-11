<?php $this->pageTitle = UserModule::t("referral");;
/*$this->breadcrumbs=array(
    UserModule::t("Profile") => array('/profile'),
    UserModule::t("Партнерская программа"),
);*/
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
            <i class="icon-group"></i>

            <h3>
                <?php echo UserModule::t('Referral program')?>
            </h3></div>
        <div class="widget-content">
            <?php if (Yii::app()->user->hasFlash('profileMessage')): ?>
                <div class="success">
                    <?php echo Yii::app()->user->getFlash('profileMessage'); ?>
                </div>
            <?php endif; ?>

            <p>
                <strong><?php echo UserModule::t('Referral code')?>:</strong> <?php echo CHtml::textField('referral_link', Yii::app()->request->hostInfo . '/?ref=' . $user->username) ?>
                <br/>
                <strong><?php echo UserModule::t('Your profit')?>: <?php echo Referral::REFERRAL_PERCENT * 100 . ' %'; ?></strong><br/>
            </p>
            </p>
            <p>

            <h2>List of referrals:</h2>
            </p>
            <?php if (!empty($user->refs)) : ?>
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <td>№</td>
                        <td>Name</td>
                        <td>Deposits</td>
                        <td>Profit</td>
                    </tr>
                    </thead>

                    <?php foreach ($user->refs as $referral): ?>
                        <tr>
                            <td><?php echo $referral->id ?></td>
                            <td><?php echo $referral->user->username ?></td>
                            <td><?php echo User::model()->referralDeposit($referral->ref_id) ?></td>
                            <td><?php echo User::model()->referralInvestment($referral->ref_id) ?></td>
                        </tr>
                    <?php endforeach; ?>

                </table>
            <?php else : ?>
                <?php echo UserModule::t('You have not referrals')?>
            <?php endif ?>
        </div>
    </div>
</div>


