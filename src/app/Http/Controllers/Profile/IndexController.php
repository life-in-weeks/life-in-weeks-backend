<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Resources\Profile\ProfileResource;
use App\Models\Profile;
use Illuminate\Support\Facades\Auth;

/**
 * @OA\Get(
 *     path="/api/profile",
 *     operationId="getProfiles",
 *     tags={"Profile"},
 *     summary="Get all profiles",
 *     description="Returns a collection of profiles",
 *     security={{ "bearerAuth": {} }},
 *     @OA\Response(
 *         response=200,
 *         description="Successful operation",
 *         @OA\JsonContent(
 *             @OA\Property(property="data", type="array",
 *             type="array",
 *                 @OA\Items(
 *                     ref="#/components/schemas/Profile"
 *                 )
 *             )
 *         )
 *     ),
 * )
 */

class IndexController extends Controller
{
    public function __invoke()
    {
        $users = Profile::all();
        return ProfileResource::collection($users);
    }
}
