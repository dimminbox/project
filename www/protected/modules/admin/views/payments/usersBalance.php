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
<h1>Баланс пользователей</h1>
<br />

<?php

    $this->widget('zii.widgets.grid.CGridView', array(
    'dataProvider'=>$users,
    'columns'=>array(
        array(
            'name'=>'username',
            'value'=>'$data->username',
        ),
        array(
            'name'=>'amount',
            'value'=>'$data->userAmount($data->id)',
        ),

    ),
));

/*
foreach( $users as $user ) {
    echo $user->username . ' - ' . (float)$user->userAmount($user->id) . '<br />';
}
*/
?>
