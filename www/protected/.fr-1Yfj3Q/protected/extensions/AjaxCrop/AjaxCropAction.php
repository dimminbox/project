<?php

Yii::import('ext.AjaxCrop.Uploader.qqFileUploader');

class AjaxCropAction extends CAction
{
    public $modelName;

    public $uploadDir;

    // Default 10MB
    public $sizeLimit = 10485760;

    public $allowedExtensions = array('jpg', 'jpeg', 'png', 'gif');

    public $minSize;



    public function run()
    {
        $this->_init();

        $uploadDir = $this->uploadDir;

        $uploader = new qqFileUploader( $this->allowedExtensions, $this->sizeLimit );

        $result = $uploader->handleUpload( $uploadDir, $this->minSize );

        $response = htmlspecialchars( json_encode($result), ENT_NOQUOTES );

        echo $response;
    }


    private function _init()
    {
        $modelName = $this->modelName;

        $this->sizeLimit = $modelName::model()->ajaxCropBehavior->sizeLimit;
        $this->allowedExtensions = $modelName::model()->ajaxCropBehavior->allowedExtensions;
        $this->uploadDir = $modelName::model()->ajaxCropBehavior->uploadDir;
        $this->minSize = $modelName::model()->ajaxCropBehavior->minSize;


        // Add sub directory to path
        $this->uploadDir .= 'original/';
    }


}
