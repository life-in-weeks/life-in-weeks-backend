<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Resources\Profile\ProfileResource;
use App\Models\Profile;

class ShowController extends Controller
{
    public function __invoke(Profile $profile)
    {
        return new ProfileResource($profile);
    }
}
