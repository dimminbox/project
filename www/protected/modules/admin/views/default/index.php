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
    array('label'=>('Потенциальные выплаты'), 'url'=>array('/admin/payments')),
    array('label'=>('Управление пользователями'), 'url'=>array('/user/admin')),
    array('label'=>Yii::t('app','Права доступа'), 'url'=>array('/rights')),
    array('label'=>'Транзакции', 'url'=>array('/admin/userTransaction')),
    array('label'=>'Депозиты', 'url'=>array('/admin/deposit')),
    array('label'=>'Новости', 'url'=>array('/admin/news')),
    array('label'=>'Сообщения', 'url'=>array('/admin/messages')),
    array('label'=>'PerfectMoney', 'url'=>array('/admin/money')),
);
?>

<h1>Админпанель</h1>
<?php
    if ( $messages != null ) {
        $high = 0;
        $normal = 0;
        $low = 0;
        foreach( $messages  as $message ) {

            if ( $message->status == 1 ) {
                switch( $message->importance ) {
                    case Message::IMPORTANCE_1:
                        $high++;break;
                    case Message::IMPORTANCE_2:
                        $normal++;break;
                    case Message::IMPORTANCE_3;
                        $low; break;
                }
            }

        }
        if ( $high > 0 ) {
            $this->renderPartial('_high_messages', array('messages' => $high));
        }
        $messages = $high + $normal + $low;
        echo CHtml::link('У Вас ' . $messages . ' новых сообщений', $this->createAbsoluteUrl('/admin/messages/'));
    }
?>
