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
<div class="widget stacked ">
    <div class="widget-header">
        <i class="icon-envelope"></i>
        <h3>Сообщения</h3>
    </div> <!-- /widget-header -->

    <div class="widget-content">

<?php if ( $messages != null ) {?>
<table class="table table-bordered table-striped">
    <thead>
    <tr><td>Статус</td><td>Тема сообщения</td><td>От кого</td><td>Важность</td><td>Дата отправки</td></tr>
    </thead>
    <?php
    foreach ($messages as $message): ?>

        <tr>
            <td><?php if ( $message->status == 0 )
                { echo 'Прочитано'; }
                else { echo 'Новое сообщение'; }
                ?></td>
            <td><?php echo CHtml::link($message->subject, $this->createAbsoluteUrl('/admin/messages/view/', array('id' => $message->id))); ?></td>
            <td><?php if( $message->sender == null ) {
                    echo 'Системное сообщение';
                }
            ?></td>
            <td><?php echo $message->importance; ?></td>
            <td><?php echo $message->time; ?></td>
         </tr>

    <?php endforeach; ?>
</table>
<?php $this->widget('CLinkPager', array(
    'pages' => $pages,
));

} else {
    echo 'У вас нет входящих сообщений';
}

?>
    </div> <!-- /widget-content -->
</div>