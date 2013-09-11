<?php
$this->pageTitle = Yii::app()->name . ' - ' . UserModule::t('Transactions');
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
            <i class="icon-exchange"></i>

            <h3>
                <?php echo UserModule::t('Your transactions')?>
            </h3></div>
        <div class="widget-content">

            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <td>№</td>
                    <td>Date</td>
                    <td>Transaction amount</td>
                    <td>Type of transaction</td>
                    <td>Amount</td>
                </tr>
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
            <div class="pagination" align="center">
                <?php $this->widget('CLinkPager', array(
                    'firstPageLabel' => '<<',
                    'prevPageLabel' => '<',
                    'nextPageLabel' => '>',
                    'lastPageLabel' => '>>',
                    'selectedPageCssClass' => 'active',
                    'header' => '',
                    'pages' => $pages,
                    'cssFile' => false,
                ))?>
            </div>
        </div>
    </div>
</div>
