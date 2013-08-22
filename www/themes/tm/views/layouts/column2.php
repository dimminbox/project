<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div class="grid_8">
    <div class="pad-1">
        <?php echo $content; ?>
    </div>
</div>
<div class="grid_4">
    <div class="pad-1">
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
    </div>
</div>
<div class="clear"></div>
<?php $this->endContent(); ?>