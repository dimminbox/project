<?php
$this->pageTitle=Yii::app()->name . ' - Полный список операций';
$this->breadcrumbs=array(
    UserModule::t("Profile") => array('/profile'),
    'Все депозиты',
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
<table class="table table-bordered table-striped">
        <thead>
        <tr><td>№</td><td>Сумма</td><td>Срок</td><td>Процент</td><td>Дата создания</td><td>Дата окончания</td><td>Реинвест</td><td>Состояние</td></tr>
        </thead>
        <?php
        foreach ($models as $deposit): ?>

            <tr>
                <td><?php echo $deposit->id; ?></td>
                <td><?php echo $deposit->deposit_amount; ?></td>
                <td><?php echo $deposit->deposit_type->type; ?></td>
                <td><?php echo $deposit->deposit_type->percent; ?></td>
                <td><?php echo $deposit->date; ?></td>
                <td><?php echo $deposit->expire; ?></td>
                <td><?php
                    if ( $deposit->reinvest == Deposit::REINVEST_YES ) {
                        echo 'Да';
                    } elseif ( $deposit->reinvest == Deposit::REINVEST_NO ) {
                        echo 'Нет';
                    } else {
                        echo '';
                    }
                    ?></td>
                <td><?php if ( $deposit->status == 1 )
                            { echo 'Действует'; }
                        else { echo 'Закрыт'; }
                ?></td>
            </tr>

        <?php endforeach; ?>
    </table>
<?php $this->widget('CLinkPager', array(
    'pages' => $pages,
))?>
