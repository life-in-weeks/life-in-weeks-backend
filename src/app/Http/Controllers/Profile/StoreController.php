<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\Profile\StoreRequest;
use App\Http\Resources\Profile\ProfileResource;
use App\Models\Profile;
use App\Services\Profile\StoreService;

/**
 * @OA\Post(
 *     path="/api/profile",
 *     summary="Create profile of user",
 *     tags={"Profile"},
 *
 *     @OA\RequestBody(
 *         @OA\JsonContent(
 *             allOf={
 *                 @OA\Schema(
 *                     @OA\Property(property="date_of_birth", type="string", example="2001-11-11"),
 *                     @OA\Property(property="name", type="string", example="Slark"),
 *                     @OA\Property(property="lastname", type="string", example="YaPolzu"),
 *                 )
 *             }
 *         )
 *     ),
 *
 *     @OA\Response(
 *         response=201,
 *         description="The user has successfully created profile",
 *         @OA\JsonContent(
 *             @OA\Property(property="data", type="object",
 *                 @OA\Property(property="id", type="integer", example="11"),
 *                 @OA\Property(property="date_of_birth", type="string", example="2001-11-11"),
 *                 @OA\Property(property="name", type="string", example="Slark"),
 *                 @OA\Property(property="lastname", type="string", example="YaPolzu"),
 *                 @OA\Property(property="user", type="object",
 *                     @OA\Property(property="id", type="integer", example="11"),
 *                     @OA\Property(property="username", type="string", example="SlarkDotka"),
 *                     @OA\Property(property="email", type="string", nullable=true, example="freshmeat@gmail.com")
 *                 ),
 *                 @OA\Property(property="avatar", type="string", nullable=true, example="11"),
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=409,
 *         description="Profile already exists for this user",
 *     ),
 *
 * ),
 */

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request, StoreService $service)
    {
        $data = $request->validated();
        $profile = $service($data);

        return $profile instanceof Profile
            ? new ProfileResource($profile)
            : $profile;
    }
}
