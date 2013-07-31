<?php $this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Profile");
$this->breadcrumbs=array(
    UserModule::t("Profile"),
);
$this->menu=array(
    ((UserModule::isAdmin())
        ?array('label'=>UserModule::t('Manage Users'), 'url'=>array('/user/admin'))
        :array()),
    array('label'=>UserModule::t('List User'), 'url'=>array('/user')),
    array('label'=>UserModule::t('Deposit'), 'url'=>array('deposit')),
    array('label'=>UserModule::t('Referral'), 'url'=>array('referral')),
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
    <strong>Ваша реферальная ссылка:</strong> <?php  echo  CHtml::link(Yii::app()->request->hostInfo . '/?ref=' . $user->username, Yii::app()->request->hostInfo . '/?ref=' . $user->username) ?><br />
    <strong>Процентная ставка: 8%</strong><br />
</p>
<p>
<h2>Список рефералов:</h2>
</p>
<?php if ( !empty($user->refs) ) :?>
    <ol>
        <?php foreach ( $user->refs as $referral ): ?>
            <li><?php echo $referral->user->username?></li>
        <?php endforeach; ?>
    </ol>
<?php else : ?>
    У Вас нет приглашенных инвесторов
<?php endif ?>
