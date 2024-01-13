<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\Profile\UpdateRequest;
use App\Http\Resources\Profile\ProfileResource;
use App\Models\Profile;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request)
    {
        $profile = auth()->user()->profile;
        $data = $request->validated();
        $profile->update($data);

        return $profile instanceof Profile
            ? new ProfileResource($profile)
            : $profile;
    }
}
