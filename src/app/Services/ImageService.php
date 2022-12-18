<?php

namespace App\Services;


use Illuminate\Support\Facades\Storage;


class ImageService
{
    public static function upload($imageFile, $folderName)
    {
        $fileName = uniqid(rand() . '_');
        $extension = $imageFile->extension();
        $fileNameToStore = $fileName . '.' . $extension;

        Storage::putFileAs('public/' . $folderName . '/', $imageFile, $fileNameToStore,);

        return $fileNameToStore;
    }
}
