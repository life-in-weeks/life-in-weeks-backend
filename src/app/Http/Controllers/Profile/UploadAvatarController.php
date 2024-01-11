<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\Image\UploadRequest;
use App\Http\Resources\Image\ImageResource;
use App\Models\Image;
use App\Services\Profile\UploadAvatarService;

class UploadAvatarController extends Controller
{
    public function __invoke(
        UploadRequest $request,
        UploadAvatarService $service
    ) {
        $data = $request->validated();
        $avatar = $service($data);

        return $avatar instanceof Image ? new ImageResource($avatar) : $avatar;
    }
}
