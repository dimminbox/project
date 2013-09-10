<?php

/**
 * Base class.
 */
class EJCropper
{
	/**
	 * @var integer JPEG image quality
	 */
	public $jpeg_quality = 100;
	/**
	 * @var integer PNG compression level (0 = no compression).
	 */
	public $png_compression = 5;
	/**
	 * @var integer The thumbnail width
	 */
	public $targ_w = 100;
	/**
	 * @var integer The thumbnail height
	 */
	public $targ_h = 100;
	/**
	 * @var string The path for saving thumbnails
	 */
	public $thumbPath;

	/**
	 * Get the cropping coordinates from post.
	 * 
	 * @param type $attribute The model attribute name used.
	 * @return array Cropping coordinates indexed by : x, y, h, w
	 */
	public function getCoordsFromPost($attribute)
	{
		$coords = array('x' => null, 'y' => null, 'h' => null, 'w' => null);
		foreach ($coords as $key => $value) {
			$coords[$key] = $_POST[$attribute . '_' . $key];
		}
		return $coords;
	}

	/**
	 * Crop an image and save the thumbnail.
	 * 
	 * @param string $src Source image's full path.
	 * @param array $coords Cropping coordinates indexed by : x, y, h, w
	 * @return string $thumbName Path of thumbnail.
	 */
	public function crop($src, array $coords)
	{
		if (!$this->thumbPath) {
			throw new CException(__CLASS__ . ' : thumbpath is not specified.');
		}
		$file_type = strtolower(pathinfo($src, PATHINFO_EXTENSION));
		$thumbName = $this->thumbPath . pathinfo($src, PATHINFO_BASENAME);

		if ($file_type == 'jpg' || $file_type == 'jpeg') {
			$img = imagecreatefromjpeg($src);
		}
		elseif ($file_type == 'png') {
			$img = imagecreatefrompng($src);
		}
		elseif ($file_type == 'gif') {
			$img = imagecreatefromgif($src);
		}
		else {
			return false;
		}


        // If coords isn't assigned - then crop image by smaller side
        if( empty($coords) )
        {
            $realWidth = imagesx( $img );
            $realHeight = imagesy( $img );

            // Define smaller side length
            $smallerLength = ( $realWidth < $realHeight ) ? $realWidth : $realHeight;

            $coords = array(
                'x' => 0,
                'y' => 0,
                'w' => $smallerLength,
                'h' => $smallerLength,
            );
        }


		$dest_r = imagecreatetruecolor($coords['w'], $coords['h']);
		if (!imagecopyresampled($dest_r, $img, 0, 0, $coords['x'], $coords['y'], $coords['w'], $coords['h'], $coords['w'], $coords['h'])) {
			return false;
		}
		// save only png or jpeg pictures
		if ($file_type == 'jpg' || $file_type == 'jpeg') {
			imagejpeg($dest_r, $thumbName, $this->jpeg_quality);
		}
		elseif ($file_type == 'png') {
			imagepng($dest_r, $thumbName, $this->png_compression);
		}
		elseif ($file_type == 'gif') {
			imagegif($dest_r, $thumbName);
		}
		return $thumbName;
	}


    /**
     * Resize image
     *
     * @param $filename
     * @param $width
     * @param $height
     */
    public function resize( $filename, $destFilename, $width, $height )
    {
        // Load
        $image_info = getimagesize($filename);
        $image_type = strtolower($image_info[2]);

        if( $image_type == IMAGETYPE_JPEG )
        {
            $image = imagecreatefromjpeg( $filename );
        }
        elseif( $image_type == IMAGETYPE_GIF )
        {
            $image = imagecreatefromgif( $filename );
        }
        elseif( $image_type == IMAGETYPE_PNG )
        {
            $image = imagecreatefrompng( $filename );
        }


        // Resize
        $new_image = imagecreatetruecolor( $width, $height );
        imagecopyresampled( $new_image, $image, 0, 0, 0, 0, $width, $height, imagesx($image), imagesy($image));
        $image = $new_image;


        // Save
        if( $image_type == IMAGETYPE_JPEG )
        {
            imagejpeg( $image, $destFilename, $this->jpeg_quality );
        }
        elseif( $image_type == IMAGETYPE_GIF )
        {
            imagegif( $image, $destFilename );
        }
        elseif( $image_type == IMAGETYPE_PNG )
        {
            imagepng( $image, $destFilename, $this->png_compression );
        }
    }

}