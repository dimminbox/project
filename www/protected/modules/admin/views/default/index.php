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
    array('label'=>'Пользователи', 'url'=>array('/admin/user')),
    array('label'=>'Транзакции', 'url'=>array('/admin/userTransaction')),
);
?>

<h1>Админпанель</h1>

<p>тут мы будем выводить некую статистику по сайту</p>