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
 *         @OA\JsonContent(ref="#/components/schemas/AuthRegisterRequest")
 *     ),
 *
 *     @OA\Response(
 *         response=201,
 *         description="The user has successfully registered",
 *         @OA\JsonContent(
 *             @OA\Property(property="data", type="object",
 *                 ref="#/components/schemas/AuthRegisterRequest"
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=409,
 *         description="A user with the provided username is already registered",
 *     ),
 *     @OA\Response(
 *          response=422,
 *          description="Validation error",
 *     ),
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
