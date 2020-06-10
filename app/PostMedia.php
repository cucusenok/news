<?php

namespace App;

use App\library\media\MediaFile;
use function GuzzleHttp\Psr7\str;
use Illuminate\Database\Eloquent\Model;
use App\library\media\FileManager;


/**
 * Class PostMedia
 * @package App
 */
class PostMedia extends Model
{

    const TYPE_MAIN_IMAGE = 1;

    public $timestamps = false;

    public function loadFromMediaFile(MediaFile $mediaFile, $disc) {
        $media = new Media();
        $media->disk = $disc;
        $media->ext = $mediaFile->ext();
        $media->fileName = $mediaFile->name();
        $media->type = 1;
        $media->save();

        return $media->id;

    }

    public function saveMainImage(string $base64Image) {
         $mainImage = FileManager::base64ToImage($base64Image);
         $mainImage->setName((string)uniqid());


         if ( $mainImage->file() and FileManager::saveFileToDisk( $mainImage, FileManager::DISK_POST_MAIN_IMAGES ) ){

             $postMedia = new PostMedia();
             $this->media_id = $postMedia->loadFromMediaFile($mainImage, FileManager::DISK_POST_MAIN_IMAGES );
             return $this;

         }
    }


    public function media()
    {
        return $this->hasOne('App\Media', 'id', 'media_id');
    }

    public function saveMedia() {

    }

}
