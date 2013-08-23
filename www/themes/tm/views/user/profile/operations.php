<?php
$this->pageTitle=Yii::app()->name . ' - Полный список операций';
$this->breadcrumbs=array(
    UserModule::t("Profile") => array('/profile'),
    'Полный список операций',
);
$this->menu=array(
#array('label'=>UserModule::t('List User'), 'url'=>array('/user')),
#array('label'=>UserModule::t('Investment'), 'url'=>array('/user/deposit')),
    array('label'=>UserModule::t('All operations'),'url'=>array('/user/profile/operations')),
    array('label'=>UserModule::t('All deposits'),'url'=>array('/user/profile/deposits')),
    array('label'=>UserModule::t('Referral'), 'url'=>array('referral')),
    array('label'=>UserModule::t('EditProfile'), 'url'=>array('edit')),
    array('label'=>UserModule::t('Logout'), 'url'=>array('/user/logout')),
);
?>
    <table>
        <thead>
        <tr><td>№</td><td>Дата</td><td>Сумма операции</td><td>Тип операции</td><td>Остаток</td></tr>
        </thead>
        <?php
        foreach ($models as $user): ?>

            <tr>
                <td><?php echo $user->id; ?></td>
                <td><?php echo $user->time ?></td>
                <td><?php echo $formatted = (float)$user->amount; ?></td>
                <td><?php echo $user->reason; ?></td>
                <td><?php echo (float)$user->amount_after ?></td>
            </tr>

        <?php endforeach; ?>
    </table>
<?php $this->widget('CLinkPager', array(
    'pages' => $pages,

))?>
