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

<!--p>
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
</p-->

<!--p>
    <?php echo CHtml::link('Инвестировать', '#', array('onclick' => '$("#investment").dialog("open"); return false;',)); ?>
    <br />

</p>

<p>
    <?php echo CHtml::link('Перевести средства', '#', array('onclick' => '$("#transfer").dialog("open"); return false;',)); ?>
    <br />

</p-->
<?php $this->renderPartial('_investment', array('investment' => $investment, 'model' => $user)) ?>
<?php $this->renderPartial('_transfer', array('transfer' => $transfer,'model' => $user)) ?>
<!-- Левый блок -->
<div class="span6">
    <!-- 1 виджет -->
    <div class="widget stacked">

        <div class="widget-header">
            <i class="icon-star"></i>
            <h3>Общая информация</h3>
        </div> <!-- /widget-header -->

        <div class="widget-content">

            <div class="stats">

                <div class="stat">
                    <!--span class="stat-value">12,386</span-->
                    <h2><?php echo $user->profile->first_name; ?><br />
                        <?php echo $user->profile->last_name; ?></h2>
                    <strong>Логин:</strong> <?php echo $user->username; ?><br />
                    <strong>Внутренний кошелек:</strong> <?php echo $user->internal_purse; ?><br />
                </div> <!-- /stat -->

                <div class="stat">Ваш баланс:
                    <span class="stat-value"><?php echo (float)$user->amount; ?>$</span>

                </div> <!-- /stat -->

                <div class="stat">
                    <!--span class="stat-value">70%</span-->
                    <?php echo CHtml::link('Пополнить счет', '#', array('onclick' => '$("#recharge_amount").dialog("open"); return false;',)); ?><br />
                    <?php echo CHtml::link('Перевести', '#', array('onclick' => '$("#transfer").dialog("open"); return false;',)); ?><br />
                    <?php echo CHtml::link('Вывести', '#', array('onclick' => '$("#output_money").dialog("open"); return false;',)); ?>

                </div> <!-- /stat -->

            </div> <!-- /stats -->


        </div> <!-- /widget-content -->

    </div> <!-- /widget -->
    <!-- Конец первого виджета -->
    <!-- Второй виджет -->

    <div class="widget widget-nopad stacked">

        <div class="widget-header">
            <i class="icon-list-alt"></i>
            <h3>Recent News</h3>
        </div> <!-- /widget-header -->

        <div class="widget-content">

            <ul class="news-items">
                <li>

                    <div class="news-item-detail">
                        <a href="javascript:;" class="news-item-title">Duis aute irure dolor in reprehenderit</a>
                        <p class="news-item-preview">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore.</p>
                    </div>

                    <div class="news-item-date">
                        <span class="news-item-day">08</span>
                        <span class="news-item-month">Mar</span>
                    </div>
                </li>
                <li>
                    <div class="news-item-detail">
                        <a href="javascript:;" class="news-item-title">Duis aute irure dolor in reprehenderit</a>
                        <p class="news-item-preview">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore.</p>
                    </div>

                    <div class="news-item-date">
                        <span class="news-item-day">08</span>
                        <span class="news-item-month">Mar</span>
                    </div>
                </li>
                <li>
                    <div class="news-item-detail">
                        <a href="javascript:;" class="news-item-title">Duis aute irure dolor in reprehenderit</a>
                        <p class="news-item-preview">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore.</p>
                    </div>

                    <div class="news-item-date">
                        <span class="news-item-day">08</span>
                        <span class="news-item-month">Mar</span>
                    </div>
                </li>
            </ul>

        </div> <!-- /widget-content -->

    </div> <!-- /widget -->
    <!-- Конец Второй виджет -->
    <!-- Третий виджет -->
    <div class="widget stacked">

        <div class="widget-header">
            <i class="icon-file"></i>
            <h3>Content</h3>
        </div> <!-- /widget-header -->

        <div class="widget-content">

            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>


            <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

        </div> <!-- /widget-content -->

    </div> <!-- /widget -->
    <!-- Третий виджет -->
</div> <!-- /span6 -->
<!-- Конец левого блока -->

<!-- Правый блок -->
<div class="span6">

<?php if ( $chart != null ) :?>
<div class="widget stacked">

    <div class="widget-header">
        <i class="icon-signal"></i>
        <h3>График прибыли за <?php echo  User::model()->declension(count($chart['days']), count($chart['days']) . ' день', 'последние ' . count($chart['days']) . ' дня', 'последние ' . count($chart['days']) . ' дней')?> </h3>
    </div> <!-- /widget-header -->

    <div class="widget-content">
        <?php
        $datasets = array();
        $chartsTitle ='';

        if ( isset($chart['deposits']) ){
            $strokeColor = 'green';
            $datasets[] = array(
                "fillColor" => "transparent",
                "strokeColor" => $strokeColor,
                "pointColor" => "rgba(220,220,220,1)",
                "pointStrokeColor" => $strokeColor,
                "data" => $chart['deposits'],
            );
            $chartsTitle .= '<span style="color:' . $strokeColor .'">Депозиты</span><br />';
        }
        if ( isset($chart['referral']) ){
            $strokeColor = 'blue';
            $datasets[] = array(
                "fillColor" => "transparent",
                "strokeColor" => $strokeColor,
                "pointColor" => "rgba(220,220,220,1)",
                "pointStrokeColor" => $strokeColor,
                "data" => $chart['referral'],
            );
            $chartsTitle .= '<span style="color:' . $strokeColor .'">Реферальная программа</span><br />';
        }

        $this->widget(
            'chartjs.widgets.ChLine',
            array(
                'width' => 540,
                'height' => 300,
                'htmlOptions' => array(),
                'labels' => $chart['days'],
                'datasets' => $datasets,
                'options' => array()
            )
        );

        echo $chartsTitle;
        ?>

    </div>

</div>
<?php endif; ?>

    <div class="widget stacked">

        <div class="widget-header">
            <i class="icon-bookmark"></i>
            <h3>Quick Shortcuts</h3>
        </div> <!-- /widget-header -->

        <div class="widget-content">

            <div class="shortcuts">
                <a href="javascript:;" class="shortcut">
                    <i class="shortcut-icon icon-list-alt"></i>
                    <span class="shortcut-label">Apps</span>
                </a>

                <a href="javascript:;" class="shortcut">
                    <i class="shortcut-icon icon-bookmark"></i>
                    <span class="shortcut-label">Bookmarks</span>
                </a>

                <a href="javascript:;" class="shortcut">
                    <i class="shortcut-icon icon-signal"></i>
                    <span class="shortcut-label">Reports</span>
                </a>

                <a href="javascript:;" class="shortcut">
                    <i class="shortcut-icon icon-comment"></i>
                    <span class="shortcut-label">Comments</span>
                </a>

                <a href="javascript:;" class="shortcut">
                    <i class="shortcut-icon icon-user"></i>
                    <span class="shortcut-label">Users</span>
                </a>

                <a href="javascript:;" class="shortcut">
                    <i class="shortcut-icon icon-file"></i>
                    <span class="shortcut-label">Notes</span>
                </a>

                <a href="javascript:;" class="shortcut">
                    <i class="shortcut-icon icon-picture"></i>
                    <span class="shortcut-label">Photos</span>
                </a>

                <a href="javascript:;" class="shortcut">
                    <i class="shortcut-icon icon-tag"></i>
                    <span class="shortcut-label">Tags</span>
                </a>
            </div> <!-- /shortcuts -->

        </div> <!-- /widget-content -->

    </div> <!-- /widget -->







    <div class="widget stacked widget-table action-table">

        <div class="widget-header">
            <i class="icon-th-list"></i>
            <h3>Table</h3>
        </div> <!-- /widget-header -->

        <div class="widget-content">

            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>Engine</th>
                    <th>Browser</th>
                    <th class="td-actions"></th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Trident</td>
                    <td>Internet
                        Explorer 4.0</td>
                    <td class="td-actions">
                        <a href="javascript:;" class="btn btn-small btn-warning">
                            <i class="btn-icon-only icon-ok"></i>
                        </a>

                        <a href="javascript:;" class="btn btn-small">
                            <i class="btn-icon-only icon-remove"></i>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>Trident</td>
                    <td>Internet
                        Explorer 5.0</td>
                    <td class="td-actions">
                        <a href="javascript:;" class="btn btn-small btn-warning">
                            <i class="btn-icon-only icon-ok"></i>
                        </a>

                        <a href="javascript:;" class="btn btn-small">
                            <i class="btn-icon-only icon-remove"></i>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>Trident</td>
                    <td>Internet
                        Explorer 5.5</td>
                    <td class="td-actions">
                        <a href="javascript:;" class="btn btn-small btn-warning">
                            <i class="btn-icon-only icon-ok"></i>
                        </a>

                        <a href="javascript:;" class="btn btn-small">
                            <i class="btn-icon-only icon-remove"></i>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>Trident</td>
                    <td>Internet
                        Explorer 5.5</td>
                    <td class="td-actions">
                        <a href="javascript:;" class="btn btn-small btn-warning">
                            <i class="btn-icon-only icon-ok"></i>
                        </a>

                        <a href="javascript:;" class="btn btn-small">
                            <i class="btn-icon-only icon-remove"></i>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>Trident</td>
                    <td>Internet
                        Explorer 5.5</td>
                    <td class="td-actions">
                        <a href="javascript:;" class="btn btn-small btn-warning">
                            <i class="btn-icon-only icon-ok"></i>
                        </a>

                        <a href="javascript:;" class="btn btn-small">
                            <i class="btn-icon-only icon-remove"></i>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>Trident</td>
                    <td>Internet
                        Explorer 5.5</td>
                    <td class="td-actions">
                        <a href="javascript:;" class="btn btn-small btn-warning">
                            <i class="btn-icon-only icon-ok"></i>
                        </a>

                        <a href="javascript:;" class="btn btn-small">
                            <i class="btn-icon-only icon-remove"></i>
                        </a>
                    </td>
                </tr>
                </tbody>
            </table>

        </div> <!-- /widget-content -->

    </div> <!-- /widget -->

</div> <!-- /span6 -->
<!-- Конец правого блока -->
