<?php

namespace App\Components\ImageConverter;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Imagick\Driver;
use Intervention\Image\ImageManager;

class ImageConverter
{
    protected $manager;
    public function __construct()
    {
        $this->manager = new ImageManager(new Driver());
    }
    public function convertToWebP($pathToFile, $uploadedImage, $pathToSave)
    {
        $image = $this->manager->read("storage/" . $pathToFile);
        $encoded = $image->toWebp(60);

        Storage::put(
            "public/{$pathToSave}{$uploadedImage->hashName()}.webp",
            $encoded
        );
        Storage::disk("public")->delete($pathToFile);

        $webpPath = "{$pathToSave}{$uploadedImage->hashName()}.webp";
        $webpUrl = Storage::url($webpPath);

        return $webpUrl;
    }
}
