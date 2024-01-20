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
 *                 ref="#/components/schemas/Profile"
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
