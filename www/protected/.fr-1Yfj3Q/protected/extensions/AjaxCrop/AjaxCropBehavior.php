<?php


class AjaxCropBehavior extends CActiveRecordBehavior
{
    public $attribute;

    public $uploadDir;

    public $allowedExtensions = array('jpg', 'jpeg', 'png', 'gif');

    public $action;

    // Default 20MB
    public $sizeLimit = 2097152;

    public $minSize;

    public $boxWidth;

    public $aspectRatio;

    public $imageSizes = array(
        '50x50' => array(50, 50),
        '100x100' => array(100, 100),
        '180x180' => array(180, 180),
    );

    private $_jcropper;

    private $_origImage;

    private $_croppedSize;

    public $hashLength;


    public function beforeValidate( $event )
    {
        if( isset($_POST['ajax_crop_is_already_selected_image']) && ($_POST['ajax_crop_is_already_selected_image'] == 'selected'))
        {
            // Assign value to attribute
            $this->getOwner()->{$this->attribute} = $_POST[ get_class($this->getOwner()) ][ $this->attribute ];
        }
    }


    public function beforeSave( $event )
    {
        if( isset($_POST['ajax_crop_is_already_selected_image']) && ($_POST['ajax_crop_is_already_selected_image'] == 'selected'))
        {
            // Define cropped size
            $this->_croppedSize = "{$this->minSize[0]}x{$this->minSize[1]}";

            // Create Jcropper object
            $this->_createJcropper();

            // Crop image and create thumbs
            $this->_createCroppedThumbs();
        }
    }


    private function _createJcropper()
    {
        Yii::import( 'ext.AjaxCrop.Jcrop.EJCropper' );

        $this->_jcropper = new EJCropper();

        $this->_jcropper->jpeg_quality = 95;
        $this->_jcropper->png_compression = 8;

        $this->_origImage = $this->uploadDir . 'original/' . $this->getOwner()->{$this->attribute};
    }


    private function _createCroppedThumbs()
    {
        // Crop image by first size
        $croppedImage = $this->_cropByMinSize();

        // If other sizes preset - resize first image
        foreach( $this->imageSizes as $size )
        {
            if( $size != $this->_croppedSize )
            {
                $this->_doThumbnail( $croppedImage, $size );
            }
        }
    }


    private function _cropByMinSize()
    {
        $this->_jcropper->thumbPath = $this->_existPath( $this->uploadDir . $this->_croppedSize . '/');


        // Define coords
        $coords = array();

        if( isset($_POST['ajax_crop_w']) && isset($_POST['ajax_crop_h']) && $_POST['ajax_crop_w'] != 0 && $_POST['ajax_crop_h'] != 0 )
        {
            $coords = $this->_jcropper->getCoordsFromPost( 'ajax_crop' );
        }


        // Crop image
        $croppedImage = $this->_jcropper->crop( $this->_origImage, $coords );

        if ( !$croppedImage )
        {
            $this->getOwner()->addError('photo', 'При сохранении изображения произошла ошибка');
        }


        // Resize image
        $this->_jcropper->resize( $croppedImage, $croppedImage, $this->minSize[0], $this->minSize[1]);


        return $croppedImage;
    }


    private function _doThumbnail( $file, $size )
    {
        list( $width, $height ) = explode( 'x', $size );

        $thumbPath = $this->_existPath( $this->uploadDir . $size );

        $thumbName = $thumbPath . '/' . $this->getOwner()->{$this->attribute};

        $this->_jcropper->resize( $file, $thumbName, $width, $height );
    }


    private function _existPath( $path )
    {
        if( !file_exists($path) )
        {
            mkdir( $path, 0777 );
        }

        return $path;
    }


}
