<?php

namespace worstinme\thumbnailer;

use yii\imagine\Image;
use Imagine\Image\Box;

use yii\web\NotFoundHttpException;
use Yii;

class ImagesController extends \yii\web\Controller
{
  

    public function actionThumbnails($width,$height,$image)
    {

    	$image_path = Yii::getAlias("@webroot/".$image);


    	if (is_file($image_path) && $width > 0 && $height > 0) {

            $thumbnail = Yii::getAlias("@webroot/thumbnails/".$width."-".$height."/".$image);

            $array = explode("/", $thumbnail);

            array_pop($array);

            $dir = implode("/",$array);

            if (!is_dir($dir)) {
                mkdir($dir, 0700, true);
            }

            if (is_dir($dir)) {

                try {
        
                    $this->createThumbnail($image_path, $thumbnail, $width, $height);

                } catch (\Exception $ex) {

                    echo $ex;
                }

            }

            return $this->refresh();

    	}  
    	
		else throw new NotFoundHttpException('The requested page does not exist.');
    	
    }

    protected function createThumbnail($image_path, $thumbnail, $width, $height) {

        Image::thumbnail($image_path, $width, $height, \Imagine\Image\ManipulatorInterface::THUMBNAIL_INSET)
            ->save($thumbnail, ['quality'=>85]);

        return true;
    }
}

