<?php
/* @var $this AdminController */
/* @var $model User */
?>

<?php
$this->breadcrumbs=array(
    'Админпанель'
);
?>

<?php
$this->menu=array(
    array('label'=>('Управление пользователями'), 'url'=>array('/user/admin')),
    array('label'=>Yii::t('app','Права доступа'), 'url'=>array('/rights')),
    array('label'=>'Транзакции', 'url'=>array('/admin/userTransaction')),
    array('label'=>'Депозиты', 'url'=>array('/admin/deposit')),
    array('label'=>'Типы депозитов', 'url'=>array('/admin/depositType')),
    array('label'=>'Сообщения', 'url'=>array('/admin/messages')),
    array('label'=>'PerfectMoney', 'url'=>array('/admin/money')),
);
?>

<h1>Баланс PerfectMoney</h1>
<table>
    <thead>
    <tr>
        <td>
            Номер кошелька
        </td>
        <td>
            Сумма
        </td>
    </tr>
    </thead>

<?php foreach( $balances as $purse=>$balance ) : ?>

    <tr>
        <td><?php echo $purse ?></td>
        <td><?php echo $balance ?></td>
    </tr>

<?php endforeach ?>
</table>