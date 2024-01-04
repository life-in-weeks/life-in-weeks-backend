<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\User\UserDataResource;
use App\Models\Profile;

class IndexController extends Controller
{
    public function __invoke()
    {
        $users = Profile::all();
        return UserDataResource::collection($users);
    }
}
