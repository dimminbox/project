<?php
$this->pageTitle=Yii::app()->name . ' - ' . UserModule::t('Deposits');
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
<div class="span12">
    <div class="widget stacked">
        <div class="widget-header">
            <i class="icon-money"></i>
            <h3>
                <?php echo UserModule::t('Your deposits')?>
            </h3></div>
        <div class="widget-content">
<table class="table table-bordered table-striped">
        <thead>
        <tr>
            <td>№</td>
            <td>Amount</td>
            <td>Program period</td>
            <td>Percent</td>
            <td>Start date</td>
            <td>Exception date</td>
            <?php echo ( Yii::app()->params['reinvest'] ) ? '<td>Reinvest</td>' : '' ?>
            <td>Status</td></tr>
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

                <?php if ( Yii::app()->params['reinvest'] ) :?>
                <td><?php
                    if ( $deposit->reinvest == Deposit::REINVEST_YES ) {
                        echo 'Да';
                    } elseif ( $deposit->reinvest == Deposit::REINVEST_NO ) {
                        echo 'Нет';
                    } else {
                        echo '';
                    }
                    ?></td>
                <?php endif; ?>

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
        </div>
    </div>
