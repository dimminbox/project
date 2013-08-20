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
