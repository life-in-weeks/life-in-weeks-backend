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

        if (!auth()->user()->profile) {
            auth()->user()->profile;
            $profile = Profile::create($data);
        } else {
            return response()->json(
                [
                    "message" => "Profile already exists for this user.",
                ],
                409
            );
        }

        return $profile instanceof Profile
            ? new ProfileResource($profile)
            : $profile;
    }
}
