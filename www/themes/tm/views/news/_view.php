<?php
/* @var $this NewsController */
/* @var $data News */
?>

<div class="view">


    <div class="wrap block-3 border-1">
        <img src="<?php echo $data->image; ?>" alt="" class="img-indent">
        <div class="extra-wrap">
            <p class="color-1"><?php echo $data->title; ?></p>
            <p><?php echo $data->description; ?></p>
            <p class="color-2"><time datetime="2012-02-18"><?php echo date('d.m.Y', strtotime($data->created_time)); ?></time>
                <?php echo CHtml::link(Yii::t('news','read more...'), array('/news/'. $data->id), array('class' => 'link')) ?></p>
        </div>
    </div>


</div>