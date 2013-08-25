<?php
/* @var $this AdminController */
/* @var $model User */
?>
<div class="widget stacked ">
    <div class="widget-header">
        <i class="icon-home"></i>
        <h3>Админпанель</h3>
    </div> <!-- /widget-header -->

    <div class="widget-content">

        <br />


    </div> <!-- /widget-content -->
</div>

<?php /*
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
    } */
?>
