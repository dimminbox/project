<?php
$this->beginWidget(
    'zii.widgets.jui.CJuiDialog', array(
        'id'      => 'Messages',
        'options' => array(
            'title'    => 'Сообщение',
            'autoOpen' => true,
            'modal'    => 'true',
            'width'    => '250',
            'height'   => 'auto',
            'resizable'=> false,
        ),
    )
); ?>
    <div class="form">
        У вас <?php echo $messages ?> важных сообщений<br /><br />

        <?php echo CHtml::link('Прочитать сообщения', $this->createAbsoluteUrl('/admin/messages')); ?>
    </div>
<?php $this->endWidget('zii.widgets.jui.CJuiDialog');?>