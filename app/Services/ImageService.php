<?php


namespace App\Services;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Laravel\Facades\Image;//imageアップロード

class ImageService
{
    public static function upload($imageFile, $folderName)
    {
        $fileName = uniqid(rand().'_');
        $extension = $imageFile->extension();
        $fileNameToStore = $fileName. '.' . $extension;
        $resizedImage = Image::read($imageFile)->resize(1280, 854)->encode();
        Storage::put('public/' . $folderName . '/' . $fileNameToStore,$resizedImage );

        return $fileNameToStore;
    }
}
