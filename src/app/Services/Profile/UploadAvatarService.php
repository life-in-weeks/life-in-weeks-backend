<?php

namespace App\Services\Profile;

use App\Models\Image;
use App\Components\ImageConverter;

class UploadAvatarService
{
    public function __invoke($data)
    {
        try {
            $profile = auth()->user()->profile;
            $avatar = $data["images"][0];
            $path = $avatar->store("avatars", "public");

            $converter = new ImageConverter();
            $webUrl = $converter->convertToWebP($path, $avatar, "avatars/");

            if ($profile->avatar) {
                $profile->avatar->update([
                    "url" => $webUrl,
                ]);
            } else {
                $image = new Image(["url" => $webUrl]);
                $profile->avatar()->save($image);
            }
            return $profile->avatar;
        } catch (\Exception $e) {
            return $e;
        }
    }
}
