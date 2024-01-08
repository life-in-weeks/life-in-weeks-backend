<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Resources\User\UserResource;
use App\Models\User;
use mysql_xdevapi\Exception;

class RegisterController extends Controller
{
    public function __invoke(RegisterRequest $request)
    {
        try {
            $data = $request->validated();
            $userAuth = User::create($data);
            return $userAuth instanceof User
                ? new UserResource($userAuth)
                : $userAuth;
        } catch (\Exception $e) {
            return response()->json(["message" => $e->getMessage()], 409);
        }
    }
}
