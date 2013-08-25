<?php

?>
<div style="width: 48%; float: left;">
    <h1><?php echo UserModule::t('View User').' "'.$model->username.'"'; ?></h1>
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
</div>

<div style="width: 45%; float: left; padding-left: 20px;">
    <h1><?php echo 'Баланс пользователя' ?></h1>
    <h3><?php echo $model->userAmount($model->id);?></h3>

    <h1><?php echo 'Сумма депозитов пользователя' ?></h1>
    <h3><?php echo $model->adminInvestmentAmount($model->id);?></h3>

    <h1><?php echo 'Количество реферралов' ?></h1>
    <h3><?php echo $model->countReferral($model->id);?></h3>
</div>

<div style="clear: both"></div>
<h1><?php echo "Депозиты профиля " .$model->username ?></h1>
<table>
    <thead>
    <tr><td>№</td><td>Сумма депозита</td><td>Тип депозита</td><td>Процент</td><td>Дата создания</td><td>Дата окончания</td><<td>Состояние</td></tr>
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

<h1><?php echo "Последние 10 операций профиля " .$model->username ?></h1>
<table>
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


