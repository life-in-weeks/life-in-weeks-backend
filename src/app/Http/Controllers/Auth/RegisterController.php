<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Resources\User\UserAuthResource;
use App\Models\UserAuth;

class RegisterController extends Controller
{
    public function __invoke(RegisterRequest $request)
    {
        $data = $request->validated();
        $userAuth = UserAuth::create($data);
        return $userAuth instanceof UserAuth
            ? new UserAuthResource($userAuth)
            : $userAuth;
    }
}
