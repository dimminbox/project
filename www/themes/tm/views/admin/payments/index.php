<?php
/* @var $this AdminController */
/* @var $model User */
?>

<?php
/*
$this->widget('zii.widgets.grid.CGridView', array(
    'dataProvider'=>$deposits,
     'columns'=>array(
         array(
             'name'=>'expire',
             'value'=>'$data->expire',
         ),
         array(
             'name'=>'deposit_amount',
             'value'=>'$data->deposit_amount',
         ),

     ),
 ));
*/
?>


<div class="widget-header">
    <i class="icon-pencil"></i>
    <h3>Потенциальные выплаты</h3>
</div> <!-- /widget-header -->

<div class="widget-content">


<br />

    <p>Общий баланс пользователей: <strong><?php echo (float)User::model()->allAmount; ?></strong><br />
        <?php echo CHtml::link('Подробнее...', $this->createAbsoluteUrl('/admin/payments/usersBalance')) ?></p>


    <h3>График окончания депозитов (30дней):</h3>
    <table>
        <thead>
        <tr>
            <td>Дата</td><td>Сумма</td>
        </tr>
        </thead>
        <?php foreach( $deps as $deposit ) : ?>
            <tr>
                <td><?php echo date("d-m-Y", strtotime($deposit['expire'])) ?></td>
                <td><?php echo $deposit['amount'] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>


</div> <!-- /widget-content -->


