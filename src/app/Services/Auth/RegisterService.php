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
            return $e->getCode() == 23505
                ? response()->json(["message" => $e->getMessage()], 409)
                : response()->json($e, 500);
        }
    }
}
