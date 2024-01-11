<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\Profile\StoreRequest;
use App\Http\Resources\Profile\ProfileResource;
use App\Models\Profile;
use App\Services\Profile\StoreService;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request, StoreService $service)
    {
        $data = $request->validated();
        $profile = $service($data);

        return $profile instanceof Profile
            ? new ProfileResource($profile)
            : $profile;
    }
}
