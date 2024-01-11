<?php

namespace App\Services\Profile;

use App\Models\Profile;

class StoreService
{
    public function __invoke($data)
    {
        $data["user_id"] = auth()->id();
        if (!auth()->user()->profile) {
            $profile = Profile::create($data);
            return $profile;
        } else {
            return response()->json(
                [
                    "message" => "Profile already exists for this user.",
                ],
                409
            );
        }
    }
}
