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
<div class="widget stacked ">

<div class="widget-header">
    <i class="icon-spinner"></i>
    <h3>Потенциальные выплаты</h3>
</div> <!-- /widget-header -->

<div class="widget-content">

    <p>
        Общий баланс пользователей:
         <span class='stat-value'><?php echo (float)User::model()->allAmount; ?>$</span><br />
        <strong>Подробности:</strong><br />
        <?php echo CHtml::link('Баланс пользователей', $this->createAbsoluteUrl('/admin/payments/usersBalance')) ?>
    </p>


    <h3>Список окончания депозитов на <a href='javascript:;' onclick="$('#form').show(300);" id='day' title='Нажмите, чтобы изменить'><?php echo $this->expirationDate; ?></a> <?php echo User::model()->declension($this->expirationDate, 'день', 'дня', ' дней')?>:</h3>
    <div id='form' style='display:none'>
        <?php $form=$this->beginWidget('CActiveForm', array(
            'id'=>'day-form',
            'enableAjaxValidation'=>false,
        )); ?>
        <?php echo CHtml::textField('day',''); ?>
        <?php echo CHtml::submitButton('Изменить', array('class' => 'btn btn-large')); ?>
        <?php $this->endWidget(); ?>
    </div>
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


</div>