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
    <i class="icon-spinner"></i>
    <h3>Потенциальные выплаты</h3>
</div> <!-- /widget-header -->

<div class="widget-content">

    <p>
        <?php echo CHtml::link('Общий баланс пользователей:', $this->createAbsoluteUrl('/admin/payments/usersBalance')) ?>
         <span class='stat-value'><?php echo (float)User::model()->allAmount; ?>$</span>
        </p>


    <h3>Список окончания депозитов (30дней):</h3>
    <table class='table table-bordered table-striped'>
        <thead>
        <tr>
            <td>Дата</td><td>Сумма</td>
        </tr>
        </thead>
        <?php foreach( $deps as $deposit ) : ?>
            <tr>
                <td><?php echo date("d.m.Y", strtotime($deposit['expire'])) ?></td>
                <td><?php echo $deposit['amount'] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>


</div> <!-- /widget-content -->


