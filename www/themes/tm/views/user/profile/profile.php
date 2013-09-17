<?php $this->pageTitle = UserModule::t("Home profile");
$this->breadcrumbs = array(
    UserModule::t("Profile"),
);
$this->menu = array(
    #array('label'=>UserModule::t('List User'), 'url'=>array('/user')),
    #array('label'=>UserModule::t('Investment'), 'url'=>array('/user/deposit')),
    array('label' => UserModule::t('Referral'), 'url' => array('referral')),
    array('label' => UserModule::t('All operations'), 'url' => array('/user/profile/operations')),
    array('label' => UserModule::t('All deposits'), 'url' => array('/user/profile/deposits')),
    array('label' => UserModule::t('Edit'), 'url' => array('edit')),

    array('label' => UserModule::t('Logout'), 'url' => array('/user/logout')),
);

?>

<?php if (Yii::app()->user->hasFlash('profileMessage')): ?>
    <div class="success" style="margin: 0 auto 25px auto;width:60%;text-align:center;padding:10px;color:green;font-weight:bold;border:2px solid green">
        <?php echo Yii::app()->user->getFlash('profileMessage'); ?>
    </div>
<?php endif; ?>
<?php if (Yii::app()->user->hasFlash('profileMessageFail')): ?>
    <div class="fail" style="margin: 0 auto 25px auto;width:60%;text-align:center;padding:10px;color:red;font-weight:bold;border:2px solid red">
        <?php echo Yii::app()->user->getFlash('profileMessageFail'); ?>
    </div>
<?php endif; ?>

<?php


if ( Yii::app()->params['reinvest'] == true && $user->deposit != null ) {

    foreach ($user->deposit as $dep) {

        $cookie = Yii::app()->request->cookies['deposit_message' . $dep->id]->value;

        if ($dep->expire <= date('Y-m-d H:i:s', time() + 2592000) &&
            $cookie != 1 &&
            $dep->reinvest == 0
        ) {

            ?>

            <div id='deposit_message<?php echo $dep->id; ?>'
                 style='position:relative;border:1px solid green;padding: 15px;margin-bottom: 10px;'>
                <div style='position:absolute;top:3px;right:5px;'>
                    <a id='deposit_message_close<?php echo $dep->id; ?>' href="#"
                       style='text-decoration:none; color:black'>X</a></div>

                Prior to the deadline for the deposit #<strong><?php echo $dep->id; ?></strong> remains less than the 1st of the month.<br/>
                Reinvest it for another <?php echo $dep->deposit_type->type ?> ? <br/>

                <?php echo CHtml::link(UserModule::t('Yes'), $this->createAbsoluteUrl('/user/profile/depositReinvest', array(
                    'deposit_id' => $dep->id,
                    'reinvest' => Deposit::REINVEST_YES))) ?>
                <?php echo CHtml::link(UserModule::t('No'), $this->createAbsoluteUrl('/user/profile/depositReinvest', array(
                    'deposit_id' => $dep->id,
                    'reinvest' => Deposit::REINVEST_NO))) ?>

            </div>

            <script type="text/javascript">

                $(document).ready(function () {
                    $('#deposit_message_close<?php echo $dep->id; ?>').click(function () {
                        $('#deposit_message<?php echo $dep->id; ?>').hide(200);
                        $.cookie('deposit_message<?php echo $dep->id; ?>', 1, {
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



<?php $this->renderPartial('_recharge_amount', array('deposit' => $deposit)) ?>
<?php $this->renderPartial('_outputmoney', array('model' => $user)) ?>

<?php $this->renderPartial('_transfer', array('transfer' => $transfer,'model' => $user)) ?>
<!-- left block -->
<div class="span6">
    <!-- 1 widget -->
    <div class="widget stacked">

        <div class="widget-header">
            <i class="icon-star"></i>

            <h3><?php echo UserModule::t('Information')?></h3>
        </div>
        <!-- /widget-header -->

        <div class="widget-content">

            <div class="stats">

                <div class="stat">
                    <!--span class="stat-value">12,386</span-->
                    <h2><?php echo $user->profile->first_name; ?><br/>
                        <?php echo $user->profile->last_name; ?></h2>
                    <strong><?php echo UserModule::t('Login')?>:</strong> <?php echo $user->username; ?><br/>
                    <strong><?php echo UserModule::t('Internal purse')?>:</strong> <?php echo $user->internal_purse; ?><br/>
                </div>
                <!-- /stat -->

                <div class="stat"><?php echo UserModule::t('Your cash')?>:
                    <span class="stat-value">$<?php echo (float)$user->amount; ?></span>

                </div>
                <!-- /stat -->

                <div class="stat">
                    <!--span class="stat-value">70%</span-->
                    <?php echo CHtml::link(UserModule::t('Cash in'), '#', array('onclick' => '$("#recharge_amount").dialog("open"); return false;',)); ?>
                    <br/>
                    <?php echo CHtml::link(UserModule::t('Transfer cash'), '#', array('onclick' => '$("#transfer").dialog("open"); return false;',)); ?>
                    <br/>
                    <?php echo CHtml::link(UserModule::t('Cash out'), '#', array('onclick' => '$("#output_money").dialog("open"); return false;',)); ?>

                </div>
                <!-- /stat -->

            </div>
            <!-- /stats -->


        </div>
        <!-- /widget-content -->

    </div>
    <!-- /widget -->
    <!-- end 1 widget -->
    <!-- 2 widget -->

    <?php if ($chart != null) : ?>
        <div class="widget stacked">

            <div class="widget-header">
                <i class="icon-signal"></i>

                <h3><?php echo UserModule::t('Profit charts for')?>
                    <?php echo User::model()->declension(count($chart['days']), count($chart['days']) . ' ' . UserModule::t('day'), ' ' . UserModule::t('last') . ' ' . count($chart['days']) . ' ' . UserModule::t('day'), ' ' . UserModule::t('last') . ' ' . count($chart['days']) . ' ' .UserModule::t('days')) ?> </h3>
            </div>
            <!-- /widget-header -->

            <div class="widget-content">
                <?php
                $datasets = array();
                $chartsTitle = '';

                if (isset($chart['deposits'])) {
                    $strokeColor = 'green';
                    $datasets[] = array(
                        "fillColor" => "transparent",
                        "strokeColor" => $strokeColor,
                        "pointColor" => "rgba(220,220,220,1)",
                        "pointStrokeColor" => $strokeColor,
                        "data" => $chart['deposits'],
                    );
                    $chartsTitle .= '<span style="color:' . $strokeColor . '">' . UserModule::t('Deposits') . '</span><br />';
                }
                if (isset($chart['referral'])) {
                    $strokeColor = 'blue';
                    $datasets[] = array(
                        "fillColor" => "transparent",
                        "strokeColor" => $strokeColor,
                        "pointColor" => "rgba(220,220,220,1)",
                        "pointStrokeColor" => $strokeColor,
                        "data" => $chart['referral'],
                    );
                    $chartsTitle .= '<span style="color:' . $strokeColor . '">' . UserModule::t('Referral program') . '</span><br />';
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

</div> <!-- /span6 -->
<!-- end left block -->

<!-- right block -->
<div class="span6">

    <?php foreach ( $listDeposits as $depositPlan ) : ?>
    <div class="widget widget-nopad stacked">

        <div class="widget-header">
            <i class="icon-money"></i>

            <h3><?php echo UserModule::t('Investment program')?> - <?php echo $depositPlan->type; ?></h3>
        </div>
        <!-- /widget-header -->

        <div class="widget-content">

            <ul class="news-items">

                    <li>

                        <div style="margin: 0 auto">
                            <div style="float:left;margin: 0 0 0 10px">
                                <?php echo UserModule::t('Daily profit')?>: <?php echo 100 * $depositPlan->percent; ?>%*<br />
                                <?php echo UserModule::t('Amount')?>: $<?php echo $depositPlan->min_amount; ?> - $<?php echo $depositPlan->max_amount; ?>
                            </div>
                            <div style="float:left; margin: 0 30px 0 30px">
                                <?php echo UserModule::t('Period') ?>: <?php echo $depositPlan->days; ?> working days<br />
                                <?php echo UserModule::t('Total return') ?>: ~<?php echo $depositPlan->total_return; ?>%
                            </div>
                                <p class="news-item-preview">
                                <?php echo $depositPlan->description; ?>
                            </p>
                        </div>

                        <div class="news-item-date">
                            <?php echo CHtml::link(UserModule::t('Invest'), '#', array('class'=>'btn','onclick' => '$("#investment' . $depositPlan->id . '").dialog("open"); return false;',)); ?>


                            <?php
                            $this->beginWidget(
                                'zii.widgets.jui.CJuiDialog', array(
                                    'id'      => 'investment' . $depositPlan->id,
                                    'options' => array(
                                        'title'    => 'Deposit: ' . $depositPlan->type . ' - ' . $depositPlan->percent . '%',
                                        'autoOpen' => false,
                                        'modal'    => 'true',
                                        'width'    => '350',
                                        'height'   => 'auto',
                                        'resizable'=> false,
                                    ),
                                )
                            ); ?>
                            <div class="form">
                                <?php $form=$this->beginWidget('CActiveForm', array(
                                    'id'=>'investment-form' . $depositPlan->id,
                                    'action' => $this->createAbsoluteUrl('/user/profile/investment'),
                                    'enableClientValidation'=>true,
                                    'clientOptions'=>array(
                                        'validateOnSubmit'=>true,
                                    ),
                                    'htmlOptions' => array(
                                        'class' => 'modal-window'
                                    ),
                                )); ?>

                                <?php echo $form->labelEx($investment,'deposit_amount'); ?>
                                <?php echo $form->textField($investment,'deposit_amount', array('value' => $depositPlan->min_amount)); ?>
                                <?php echo $form->error($investment,'deposit_amount'); ?>

                                <?php echo $form->hiddenField($investment,'deposit_type_id', array('value' => $depositPlan->id) ); ?>
                                <div class='modal_form_button'>
                                    <?php echo CHtml::submitButton(UserModule::t('Invest'),array('class'=>'btn btn-large btn-primary')); ?>
                                </div>

                                <?php $this->endWidget(); ?>
                            </div>
                            <?php $this->endWidget('zii.widgets.jui.CJuiDialog');?>


                        </div>
                    </li>


            </ul>

        </div>
        <!-- /widget-content -->

    </div>
    <?php endforeach; ?>
    <!-- /widget -->
    <!-- end 2 widget -->
    * Percentage of the total income of the investor return on investment

</div>

</div> <!-- /span6 -->
<!-- end right block -->
