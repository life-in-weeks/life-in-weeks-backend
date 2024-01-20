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
 *             ref="#/components/schemas/ProfileStoreRequest"
 *         )
 *     ),
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
 *     @OA\Response(
 *          response=422,
 *          description="Validation error",
 *     ),
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
