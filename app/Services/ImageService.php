<?php


namespace App\Services;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Laravel\Facades\Image;//imageアップロード

class ImageService
{
    public static function upload($imageFile, $folderName)
    {
        // dd($imageFile['image']);
        if(is_array($imageFile)){
            $file = $imageFile['image'];
        } else {
            $file = $imageFile;
        }
        $fileName = uniqid(rand().'_');
        $extension = $file->extension();
        $fileNameToStore = $fileName. '.' . $extension;
        $resizedImage = Image::read($file)->resize(1280, 854)->encode();
        Storage::put('public/' . $folderName . '/' . $fileNameToStore, $resizedImage );

        return $fileNameToStore;
    }
}
