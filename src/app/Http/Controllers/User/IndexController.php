<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\User\UserDataResource;
use App\Models\UserData;

class IndexController extends Controller
{
    public function __invoke()
    {
        $users = UserData::all();
        return UserDataResource::collection($users);
    }
}
