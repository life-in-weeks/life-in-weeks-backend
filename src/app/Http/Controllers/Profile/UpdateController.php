<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\Profile\UpdateRequest;
use App\Http\Resources\Profile\ProfileResource;
use App\Models\Profile;

/**
 * @OA\Patch(
 *     path="/api/profile",
 *     operationId="updateProfile",
 *     tags={"Profile"},
 *     summary="Update user's profile",
 *     security={{ "bearerAuth": {} }},
 *     @OA\RequestBody(
 *         @OA\JsonContent(ref="#/components/schemas/ProfileUpdateRequest")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Profile updated successfully",
 *         @OA\JsonContent(
 *             @OA\Property(property="data", type="object",
 *                 ref="#/components/schemas/Profile"
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=422,
 *         description="Validation error",
 *     ),
 * )
 */

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request)
    {
        $profile = auth()->user()->profile;
        $data = $request->validated();
        $profile->update($data);

        return $profile instanceof Profile
            ? new ProfileResource($profile)
            : $profile;
    }
}
