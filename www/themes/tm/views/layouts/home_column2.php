<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/home'); ?>
    <div class="grid_8">
        <div class="pad-1">
            <?php echo $content; ?>
        </div>
    </div>
    <div class="grid_4">

        <?php $this->widget('newsWidget'); ?>
        <?php $this->widget('windowPayment'); ?>

    </div>

    <div class="clear"></div>
<?php $this->endContent(); ?>