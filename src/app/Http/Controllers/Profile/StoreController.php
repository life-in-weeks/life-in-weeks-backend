<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\Profile\StoreRequest;
use App\Http\Resources\Profile\ProfileResource;
use App\Models\Profile;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $data["user_id"] = auth()->id();
        $profile = Profile::create($data);
        return $profile instanceof Profile
            ? new ProfileResource($profile)
            : $profile;
    }
}
