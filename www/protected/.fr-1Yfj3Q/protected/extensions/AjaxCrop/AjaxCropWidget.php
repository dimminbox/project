<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Goloveshko Iliya
 * Date: 23.10.12
 * Time: 17:06
 */
class AjaxCropWidget extends CWidget
{
    public $model;
    public $multiply = true;

    /**
     * Init
     */
    public function init()
    {
        $this->_addHiddenFields();
        $this->_registerAssets();
        $this->_setAjaxCropConfig();
    }


    /**
     * Run
     */
    public function run()
    {
        $alreadySelected = false;


        // If already selected
        if( isset($_POST['ajax_crop_is_already_selected_image']) && $_POST['ajax_crop_is_already_selected_image'] == 'selected' )
        {
            $this->_runAjaxCrop();
            $alreadySelected = true;
        }


        $this->render('view', array(
            'alreadySelected' => $alreadySelected,
            'multiply' => $this->multiply,
        ));
    }


    /**
     * Add hidden fields
     */
    private function _addHiddenFields()
    {
        echo CHtml::activeHiddenField( $this->model, $this->model->ajaxCropBehavior->attribute );

        echo $this->_activeHiddenField('ajax_crop_is_already_selected_image');

        echo $this->_activeHiddenField('ajax_crop_x', array('class' => 'coords'));
        echo $this->_activeHiddenField('ajax_crop_y', array('class' => 'coords'));
        echo $this->_activeHiddenField('ajax_crop_w', array('class' => 'coords'));
        echo $this->_activeHiddenField('ajax_crop_h', array('class' => 'coords'));
        echo $this->_activeHiddenField('ajax_crop_x2', array('class' => 'coords'));
        echo $this->_activeHiddenField('ajax_crop_y2', array('class' => 'coords'));
    }


    /**
     * Register assets
     */
    private function _registerAssets()
    {
        $baseUrl = Yii::app()->assetManager->publish( dirname(__FILE__) . '/assets', false, -1, YII_DEBUG );
        $cs = Yii::app()->getClientScript();

        $cs->registerScriptFile( $baseUrl . '/js/script.js', CClientScript::POS_HEAD );

        $cs->registerScriptFile( $baseUrl . '/js/jquery.Jcrop' . (YII_DEBUG ? '' : '.min') . '.js' );
        $cs->registerCssFile( $baseUrl . '/css/jquery.Jcrop.css' );
    }


    /**
     * Set ajax crop config
     */
    private function _setAjaxCropConfig()
    {
        // Id of model attribute element
        $attributeElementId = CJavaScript::encode( CHtml::getIdByName( CHtml::resolveName($this->model, $this->model->ajaxCropBehavior->attribute) ) );

        // Upload dir
        $uploadDir = CJavaScript::encode( $this->model->ajaxCropBehavior->uploadDir . 'original/' );

        // Min size
        $minSize = CJavaScript::encode( $this->model->ajaxCropBehavior->minSize );

        // Box width
        $boxWidth = CJavaScript::encode( $this->model->ajaxCropBehavior->boxWidth );

        // Aspect ratio
        if( $this->model->ajaxCropBehavior->aspectRatio )
        {
            $aspectRatio = $this->model->ajaxCropBehavior->minSize[0] / $this->model->ajaxCropBehavior->minSize[1];
        }

        // Set config
        Yii::app()->getClientScript()->registerScript('set_ajax_crop_config',"js:
            ajaxCrop.cropConfig.uploadDir = {$uploadDir};
            ajaxCrop.cropConfig.attributeElementId = {$attributeElementId};
            ajaxCrop.cropConfig.boxWidth = {$boxWidth};
            ajaxCrop.cropConfig.minSize = {$minSize};
            ajaxCrop.cropConfig.aspectRatio = {$aspectRatio};
        ");
    }


    /**
     * Run ajax cropt
     */
    private function _runAjaxCrop()
    {
        // File name
        $fileName = CJavaScript::encode( $this->model->{$this->model->ajaxCropBehavior->attribute} );

        // Coords
        $coords = CJavaScript::encode( array(
            (int)$_POST['ajax_crop_x'],
            (int)$_POST['ajax_crop_y'],
            (int)$_POST['ajax_crop_x2'],
            (int)$_POST['ajax_crop_y2'],
        ));

        // Run ajax crop
        Yii::app()->getClientScript()->registerScript('run_ajax_crop',"js:
            ajaxCrop.cropConfig.fileName = {$fileName};
            ajaxCrop.cropConfig.coords = {$coords};
            ajaxCrop.createCropArea();
        ");
    }


    private function _activeHiddenField( $fieldName, $htmlOptions=array(), $defaultValue = 0 )
    {
        return CHtml::hiddenField(
            $fieldName,
            isset($_POST[$fieldName]) ? $_POST[$fieldName] : $defaultValue,
            $htmlOptions
        );
    }


}