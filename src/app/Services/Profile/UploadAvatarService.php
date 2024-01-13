<?php

namespace App\Services\Profile;

use App\Components\ImageConverter\ImageConverter;
use App\Models\Image;

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
                $profile->refresh();
            }

            return $profile->avatar;
        } catch (\Exception $e) {
            return $e;
        }
    }
}
