<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Resources\Profile\ProfileResource;
use App\Models\Profile;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function __invoke()
    {
        $users = Profile::all();
        return ProfileResource::collection($users);
    }
}
