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

<h1>График потенциальных выплат</h1>
<table>
    <thead>
        <tr>
            <td>Дата</td><td>Сумма баланса</td><td>Сумма депозитов</td>
        </tr>
    </thead>
        <tr>
            <td></td>
            <td></td>
            <td></td>
        </tr>
</table>