<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Resources\Profile\ProfileResource;
use App\Models\Profile;

/**
 * @OA\Get(
 *     path="/api/profile/{id}",
 *     operationId="getProfileById",
 *     tags={"Profile"},
 *     summary="Get profile by ID",
 *     description="Returns a single profile",
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         description="ID of the profile",
 *         required=true,
 *         @OA\Schema(
 *             type="integer",
 *             format="int64"
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Successful operation",
 *         @OA\JsonContent(
 *             @OA\Property(property="data", type="object",
 *                 ref="#/components/schemas/Profile"
 *             )
 *         )
 *
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Profile not found"
 *     ),
 * )
 */

class ShowController extends Controller
{
    public function __invoke(Profile $profile)
    {
        return new ProfileResource($profile);
    }
}
