<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/home'); ?>
<article class="grid_9">
    <?php echo $content; ?>

</article>
<article class="grid_3">

    <?php
    $this->beginWidget('zii.widgets.CPortlet', array(
        'title'=>'Operations',
    ));
    $this->widget('zii.widgets.CMenu', array(
        'items'=>$this->menu,
        'htmlOptions'=>array('class'=>'operations'),
    ));
    $this->endWidget();
    ?>

</article>
<?php $this->endContent(); ?>

