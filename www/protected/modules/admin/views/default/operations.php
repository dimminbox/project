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