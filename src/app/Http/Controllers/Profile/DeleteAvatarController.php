<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class DeleteAvatarController extends Controller
{
    public function __invoke()
    {
        $avatar = auth()->user()->profile->avatar;
        $avatar->delete();
        Storage::disk("public")->delete(
            str_replace("storage/", "", $avatar->url)
        );

        return response()->noContent();
    }
}
