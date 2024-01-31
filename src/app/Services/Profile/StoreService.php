<?php

namespace App\Services\Profile;

use App\Models\Profile;

class StoreService
{
    public function __invoke($data)
    {
        if (auth()->user()->profile) {
            return response()->json(
                [
                    "message" => "Profile already exists for this user.",
                ],
                409
            );
        }

        $data["user_id"] = auth()->id();
        return Profile::create($data);
    }
}
