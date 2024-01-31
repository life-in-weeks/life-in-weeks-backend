<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Models\Profile;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::group(
    ["namespace" => "App\Http\Controllers\Auth", "prefix" => "auth"],
    function () {
        Route::post("/register", RegisterController::class);
    }
);

Route::group(
    [
        "namespace" => "\App\Http\Controllers\Profile",
        "middleware" => "auth:api",
    ],
    function () {
        Route::get("/profile", IndexController::class);
        Route::post("/profile/avatar", UploadAvatarController::class);
        Route::post("/profile", StoreController::class);
        Route::get("/profile/{profile}", ShowController::class);
        Route::patch("/profile", UpdateController::class);
        Route::delete("/profile/avatar", DeleteAvatarController::class);
    }
);
