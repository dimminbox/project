<h2 class="left-1"><?php echo Yii::t('news','News') ?></h2>
<br />
<div class="inner">
<?php foreach( $news as $new ) :?>

    <div class="wrap block-3 border-1">
        <img src="<?php echo $new->image; ?>" alt="" class="img-indent">
        <div class="extra-wrap">
            <p class="color-1"><?php echo $new->title; ?></p>
            <p><?php echo $new->description; ?></p>
            <p class="color-2"><time><?php echo date('d.m.Y h:i', strtotime($new->created_time)); ?></time>
                <?php echo CHtml::link(Yii::t('news','read more...'), array('/news/'. $new->id), array('class' => 'link')) ?></p>
        </div>
    </div>
<?php endforeach; ?>

</div>
