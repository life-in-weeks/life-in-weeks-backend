<?php

namespace App\Services\Auth;
use App\Models\User;

class RegisterService
{
    public function __invoke($data)
    {
        try {
            return User::create($data);
        } catch (\Exception $e) {
            return response()->json(["message" => $e->getMessage()], 409);
        }
    }
}
