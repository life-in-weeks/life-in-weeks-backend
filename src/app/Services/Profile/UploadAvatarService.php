<?php

namespace App\Services\Profile;

use App\Models\Image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;

use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Imagick\Driver;

class UploadAvatarService
{
    public function __invoke($data)
    {
        $manager = new ImageManager(new Driver());

        try {
            $profile = auth()->user()->profile;
            $avatar = $data["images"][0];
            $path = $avatar->store("avatars", "public");

            $image = $manager->read("storage/" . $path);
            $encoded = $image->toWebp(60);
            Storage::put("public/avatars/{$avatar->hashName()}.webp", $encoded);

            Storage::disk("public")->delete($path);
            $webpPath = "avatars/{$avatar->hashName()}.webp";
            $webpUrl = Storage::url($webpPath);

            if ($profile->avatar) {
                $profile->avatar->update([
                    "url" => $webpUrl,
                ]);
            } else {
                $image = new Image(["url" => $webpUrl]);
                $profile->image()->save($image);
            }
            return $profile->avatar;
        } catch (\Exception $e) {
            return $e;
        }
    }
}
