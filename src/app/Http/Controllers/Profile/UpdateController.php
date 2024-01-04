<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\Profile\UpdateRequest;
use App\Models\User;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request)
    {
        $user = auth()->user()->profile;
        $data = $request->validated();
        $user->update($data);
        dd($user);
    }
}
