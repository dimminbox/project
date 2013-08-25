<?php
/* @var $this AdminController */
/* @var $model User */
?>
<div class="widget stacked ">
<div class="widget-header">
    <i class="icon-spinner"></i>
    <h3>Потенциальные выплаты :: Баланс пользователей</h3>
</div> <!-- /widget-header -->

<div class="widget-content">

<?php

    $this->widget('zii.widgets.grid.CGridView', array(
    'dataProvider'=>$users,
     'itemsCssClass' => 'table table-bordered table-striped',
    'columns'=>array(
        array(
            'name'=>'username',
            'type'=>'raw',
            'value'=>'CHtml::link($data->username,
                         array("/user/admin/view","id" => $data->id))',
        ),
        array(
            'name'=>'amount',
            'value'=>'$data->userAmount($data->id)',
        ),

    ),
));
?>
</div> <!-- /widget-content -->
    </div>
<?php
/*
foreach( $users as $user ) {
    echo $user->username . ' - ' . (float)$user->userAmount($user->id) . '<br />';
}
*/
?>
