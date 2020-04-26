<?php


namespace App\library\media;

use Faker\Provider\File;
use Illuminate\Support\Facades\Storage;
use App\library\media\MediaFile;

class FileManager
{
    const DISK_POST_MAIN_IMAGES = 'postMainImages';

    const SUPPORT_IMAGES = ['jpeg', 'jpg', 'png'];

    public static function base64ToImage(string $base64Image) : MediaFile {
        //delete data from base64 format enc

        $fileInfoBase64 = explode('base64,', $base64Image);
        $fileInfo = $fileInfoBase64[0];

        $fileInfo = explode( '/', $fileInfo);

        $fileType = $fileInfo[0];
        $fileExt = rtrim($fileInfo[1], ';');

        if(!$fileInfo[0] == 'image' or !in_array(  $fileExt , self::SUPPORT_IMAGES ))
            return new MediaFile();


        $image = base64_decode (
            str_replace(' ', '+', $fileInfoBase64[1])
        );


        return new MediaFile(  $image, '' , $fileExt );


    }

    public static function saveFileToDisk(MediaFile $mediaFile, string $disk){
        return self::saveFile($mediaFile, $disk);
    }

    private static function saveFile(MediaFile $mediaFile, string $disk){
        return Storage::disk($disk)->put($mediaFile->fullName(), $mediaFile->file());
    }

}