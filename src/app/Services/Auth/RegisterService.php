<?php

namespace App\Services\Auth;
use App\Models\User;

class RegisterService
{
    public function __invoke($data)
    {
        try {
            $user = User::create($data);
            return $user;
        } catch (\Exception $e) {
            return response()->json(["message" => $e->getMessage()], 409);
        }
    }
}
