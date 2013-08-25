<?php

?>

<div class="span6">
    <!-- 1 виджет -->
    <div class="widget stacked">

        <div class="widget-header">
            <i class="icon-user"></i>

            <h3>Общая информация пользователя <?php echo $model->username; ?></h3>
        </div> <!-- /widget-header -->

        <div class="widget-content">

                <?php

                $attributes = array(
                    'username',
                    'secret',
                );

                $profileFields=ProfileField::model()->forOwner()->sort()->findAll();
                if ($profileFields) {
                    foreach($profileFields as $field) {
                        array_push($attributes,array(
                            'label' => UserModule::t($field->title),
                            'name' => $field->varname,
                            'type'=>'raw',
                            'value' => (($field->widgetView($model->profile))?$field->widgetView($model->profile):(($field->range)?Profile::range($field->range,$model->profile->getAttribute($field->varname)):$model->profile->getAttribute($field->varname))),
                        ));
                    }
                }

                array_push($attributes,
                    'email',
                    'create_at',
                    'lastvisit_at'
                );

                $this->widget('zii.widgets.CDetailView', array(
                    'data'=>$model,
                    'attributes'=>$attributes,
                ));
                ?>


        </div> <!-- /widget-content -->

    </div> <!-- /widget -->
    <!-- Конец первого виджета -->
    <!-- Второй виджет -->

    <div class="widget widget-nopad stacked">

        <div class="widget-header">
            <i class="icon-list-alt"></i>
            <h3>Последние 10 транзакций</h3>
        </div> <!-- /widget-header -->

        <div class="widget-content">
            <table class="table table-bordered table-striped">
                <thead>
                <tr><td>№</td><td>Дата</td><td>Сумма до операции</td><td>Приход</td><td>Расход</td><td>Тип операции</td><td>Остаток</td></tr>
                </thead>
                <?php
                foreach ($userTransaction as $user): ?>

                    <tr>
                        <td><?php echo $user->id; ?></td>
                        <td><?php echo $user->time ?></td>
                        <td><?php echo (float)$user->amount_before ?></td>

                        <td><?php
                            $formatted = (float)$user->amount;
                            if($formatted >0){
                                echo $formatted;
                            }?></td>
                        <td><?php if($formatted <0){
                                echo $formatted;
                            }?></td>
                        <td><?php echo $user->reason; ?></td>
                        <td><?php echo (float)$user->amount_after ?></td>
                    </tr>

                <?php endforeach; ?>
            </table>


        </div> <!-- /widget-content -->

    </div> <!-- /widget -->
    <!-- Конец Второй виджет -->

</div> <!-- /span6 -->
<!-- Конец левого блока -->

<!-- Правый блок -->
<div class="span6">


    <div class="widget stacked">

        <div class="widget-header">
            <i class="icon-spinner"></i>
            <h3>Статистика</h3>
        </div> <!-- /widget-header -->

        <div class="widget-content">

                <?php echo 'Баланс: ' ?><span class='stat-value'><?php echo (float)$model->userAmount($model->id);?>$</span><br />

                <?php echo 'Сумма депозитов: ' ?><?php echo $model->adminInvestmentAmount($model->id);?><br />

                <?php echo 'Количество реферралов: ' ?><?php echo $model->countReferral($model->id);?>

        </div>

    </div>


<div class="widget widget-nopad  stacked">

    <div class="widget-header">
        <i class="icon-signal"></i>
        <h3>Депозиты</h3>
    </div> <!-- /widget-header -->

    <div class="widget-content">

        <table class='table table-bordered table-striped'>
            <thead>
            <tr><td>№</td><td>Сумма депозита</td><td>Тип депозита</td><td>Процент</td><td>Дата создания</td><td>Дата окончания</td><td>Состояние</td></tr>
            </thead>
            <?php
            foreach ($deposits as $deposit): ?>

                <tr>
                    <td><?php echo $deposit->id; ?></td>
                    <td><?php echo $deposit->deposit_amount; ?></td>
                    <td><?php echo $deposit->deposit_type->type; ?></td>
                    <td><?php echo $deposit->deposit_type->percent; ?></td>
                    <td><?php echo $deposit->date; ?></td>
                    <td><?php echo $deposit->expire; ?></td>
                    <td><?php if ( $deposit->status == 1 )
                        { echo 'Действует'; }
                        else { echo 'Закрыт'; }
                        ?></td>
                </tr>

            <?php endforeach; ?>
        </table>

    </div> <!-- /widget-content -->

</div> <!-- /widget -->


</div> <!-- /span6 -->
