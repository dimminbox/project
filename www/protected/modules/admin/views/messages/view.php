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

<h1><?php echo $message->subject ?></h1>

От кого:
<?php
if( $message->sender == null ) {
    echo 'Системное сообщение';
} else {
    echo $message->sender;
}
?>
<br />
Время отправления: <?php echo $message->time; ?><br />
Сообщение: <?php echo $message->message; ?>
