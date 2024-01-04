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

Route::group(["namespace" => "\App\Http\Controllers\Profile"], function () {
    Route::get("/profile", IndexController::class)->middleware("auth:api");
    Route::post("/profile", StoreController::class)->middleware("auth:api");
    Route::get("/profile/{profile}", ShowController::class)->middleware(
        "auth:api"
    );
    Route::patch("/profile", UpdateController::class)->middleware("auth:api");
});

Route::post("/greeting", function () {
    $userData = Profile::first();
    return $userData->userAuth;
});
