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

);
?>

<h1>Админпанель</h1>

<p>тут мы будем выводить некую статистику по сайту</p>

<?php echo CHtml::link('Начислить проценты по депозитам', $this->createAbsoluteUrl('/admin/demon/deposit')); ?><br />
<?php echo CHtml::link('Начислить реферальные проценты', $this->createAbsoluteUrl('/admin/demon/deposit')); ?>