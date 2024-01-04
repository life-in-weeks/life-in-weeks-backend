<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Models\UserData;
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

Route::group(["namespace" => "\App\Http\Controllers\User"], function () {
    Route::get("/user", IndexController::class)->middleware("auth:api");
});

Route::get("/greeting", function () {
    $userData = UserData::first();
    return $userData->userAuth;
});
