<?php

namespace App\Services\Profile;

use App\Models\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;

class UploadAvatarService
{
    public function __invoke($data)
    {
        try {
            $profile = auth()->user()->profile;
            $avatar = $data["images"][0];
            $path = $avatar->store("avatars", "public");
            if ($profile->image) {
                $profile->image->update([
                    "url" => Storage::url($path),
                ]);
            } else {
                $image = new Image(["url" => Storage::url($path)]);
                $profile->image()->save($image);
            }
            return $profile->image;
        } catch (\Exception $e) {
            return $e;
        }
    }
}
