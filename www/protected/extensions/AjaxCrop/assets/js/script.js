var ajaxCrop = {

    cropConfig : {
        ajaxCropAreaId : 'ajax-crop-area'
    },


    /**
     * On image upload
     */
    uploadComplete : function(id, fileName, responseJson)
    {
        if( !responseJson.error )
        {
            // Set 'is already selected image' flag
            $('#ajax_crop_is_already_selected_image').val( 'selected' );

            ajaxCrop.cropConfig.fileName = responseJson.fileName;
            ajaxCrop.createCropArea();
        }
    },


    /**
     * Create crop area
     */
    createCropArea : function()
    {
        var _this = this;

        // Define config
        config = ajaxCrop.cropConfig;


        // Hide upload area
        $('#fileUploader').slideUp(200);
        $("a.remove-pic").show();

        // Set value to hidden field
        $('#' + this.cropConfig.attributeElementId).attr('value', config.fileName);


        // Correct upload directory path
        if( config.uploadDir.charAt(0) != '/' )
        {
            config.uploadDir = '/' + config.uploadDir;
        }


        // Create image to crop
        var image = $('<img>').attr(
            {
                'src': config.uploadDir + config.fileName,
                'id': 'ajax-crop-image'
            }
        )
        .hide()
        .load(function(){

            // Append image to crop area
            var cropArea = $('#' + _this.cropConfig.ajaxCropAreaId);
            cropArea.hide();
            cropArea.append(image);


            if( config.boxWidth == 'auto' )
            {
                config.boxWidth = $('#' + _this.cropConfig.ajaxCropAreaId).width();
            }


            // Run Jcrop
            image.Jcrop({
                aspectRatio : config.aspectRatio,
                minSize     : config.minSize,
                boxWidth    : config.boxWidth,
                setSelect   : config.coords || [0, 0, config.minSize[0], config.minSize[1]],
                onChange    : function(c) {
                    ajaxCrop.getCoords( c, 'ajax_crop' );
                }
            });

            cropArea.show()

            //$(this).show();
        });
    },


    /**
     * Get coordinates
     */
    getCoords : function( coords, id )
    {
        $('#'+ id +'_x').val(coords.x);
        $('#'+ id +'_y').val(coords.y);
        $('#'+ id +'_x2').val(coords.x2);
        $('#'+ id +'_y2').val(coords.y2);
        $('#'+ id +'_w').val(coords.w);
        $('#'+ id +'_h').val(coords.h);
    }

}
