<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Resources\Profile\UserDataResource;
use App\Models\Profile;

class IndexController extends Controller
{
    public function __invoke()
    {
        $users = Profile::all();
        return UserDataResource::collection($users);
    }
}
