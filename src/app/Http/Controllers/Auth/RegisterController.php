<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Resources\User\UserResource;
use App\Models\User;
use App\Services\Auth\RegisterService;

/**
 * @OA\Post(
 *     path="/api/auth/register",
 *     summary="Registration",
 *     tags={"Auth"},
 *
 *     @OA\RequestBody(
 *         @OA\JsonContent(
 *             allOf={
 *                 @OA\Schema(
 *                     @OA\Property(property="username", type="string", example="Pudge"),
 *                     @OA\Property(property="email", type="string", example="freshmeat@gmail.com"),
 *                     @OA\Property(property="password", type="string", example="$53af(&$!)"),
 *                 )
 *             }
 *         )
 *     ),
 *
 *     @OA\Response(
 *         response=201,
 *         description="The user has successfully registered",
 *         @OA\JsonContent(
 *             @OA\Property(property="data", type="object",
 *                 @OA\Property(property="id", type="integer", example="11"),
 *                 @OA\Property(property="username", type="string", example="Pudge"),
 *                 @OA\Property(property="email", type="string", nullable=true, example="freshmeat@gmail.com"),
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=409,
 *         description="A user with the provided username is already registered",
 *     ),
 *
 * ),
 */
class RegisterController extends Controller
{
    public function __invoke(RegisterRequest $request, RegisterService $service)
    {
        $data = $request->validated();
        $user = $service($data);

        return $user instanceof User ? new UserResource($user) : $user;
    }
}
