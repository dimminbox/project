<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/profile_main'); ?>

    <?php /*
    $this->beginWidget('zii.widgets.CPortlet', array(
        'title'=>'Operations',
    ));
    $this->widget('zii.widgets.CMenu', array(
        'items'=>$this->menu,
        'htmlOptions'=>array('class'=>'operations'),
    ));
    $this->endWidget(); */
    ?>

<div class="row">
<?php echo $content; ?>

</div> <!-- /row -->
<?php $this->endContent(); ?>