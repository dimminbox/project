<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'general-percent-form',
	'enableAjaxValidation'=>false,
));

echo "<table class='table table-bordered table-striped'>";

    for($j = 0; $j < 7; $j++)
    {
    echo "<tr>";
        for($i = 0; $i < count($week); $i++)
        {
        if(!empty($week[$i][$j]))
        {
        // Если имеем дело с субботой и воскресенья
        // подсвечиваем их
        if($j == 5 || $j == 6)
        echo "<td><font color=red>".$week[$i][$j]."</font></td>";
        else echo "<td>".$week[$i][$j]."<input type='text' name='". $week[$i][$j] . "' value='" . $json[$week[$i][$j]] . "'></td>";
        }
        else echo "<td>&nbsp;</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
?>

	<!--p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'date',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'json_days',array('class'=>'span5','maxlength'=>255)); ?> -->

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
