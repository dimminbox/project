<?php
$this->pageTitle=Yii::app()->name . ' - Полный список операций';
$this->breadcrumbs=array(
    'Личный кабинет'=>array('profile'),
    'Полный список операций',
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
?>
    <table>
        <thead>
        <tr><td>№</td><td>Дата</td><td>Сумма до операции</td><td>Приход</td><td>Расход</td><td>Тип операции</td><td>Остаток</td></tr>
        </thead>
        <?php
        foreach ($models as $user): ?>

            <tr>
                <td><?php echo $user->id; ?></td>
                <td><?php echo strstr($user->time,'.',true); ?></td>
                <td><?php echo sprintf("%0.0f", $user->amount_before); ?></td>

                <td><?php
                    $formatted = sprintf("%0.0f", $user->amount);
                    if($formatted >0){
                        echo $formatted;
                    }?></td>
                <td><?php if($formatted <0){
                        echo $formatted;
                    }?></td>
                <td><?php echo $user->reason; ?></td>
                <td><?php echo sprintf("%0.0f", $user->amount_after) ?></td>
            </tr>

        <?php endforeach; ?>
    </table>
<?php $this->widget('CLinkPager', array(
    'pages' => $pages,
))?>
