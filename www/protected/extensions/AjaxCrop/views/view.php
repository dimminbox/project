<?php if( !$alreadySelected ): ?>

    <!-- Uploader -->
    <?php $this->widget('ext.AjaxCrop.Uploader.EAjaxUpload', array(
        'config' => array(
            'action' => $this->model->ajaxCropBehavior->action,
            'sizeLimit' => $this->model->ajaxCropBehavior->sizeLimit,
            'allowedExtensions' => $this->model->ajaxCropBehavior->allowedExtensions,
            'failUpload' => 'qwe',
            'onComplete' => 'js:ajaxCrop.uploadComplete'
        ),
    )); ?>

<?php endif; ?>
<a class="remove-pic" href="#" style='display:none'><i class="icon-trash"></i></a>
<!-- Crop area -->
<div id="ajax-crop-area" style="display: none;"></div>

<script>

    $("a.remove-pic").click(function(e){
        e.preventDefault();
        $("qq-upload-list").html("");
        $("#ajax-crop-area").html("");
        $("#fileUploader").show();
        $("a.remove-pic").hide();
        $('.qq-upload-success').hide();
    });
</script>