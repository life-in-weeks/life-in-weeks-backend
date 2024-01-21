<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

/**
 * @OA\Post(
 *     path="/oauth/token",
 *     summary="Get tokens",
 *     tags={"Auth"},
 *
 *     @OA\RequestBody(
 *         @OA\JsonContent(
 *             oneOf={
 *                 @OA\Schema(
 *                     @OA\Property(property="grant_type", type="string", example="password"),
 *                     @OA\Property(property="client_id", type="string", example="ZGFfPErDzJONO2j9evX3_2mRdgqN"),
 *                     @OA\Property(property="client_secret", type="string", example="KMWZ_L8jgUKNrShC"),
 *                     @OA\Property(property="username", type="string", example="Pudge"),
 *                     @OA\Property(property="password", type="string", example="$53af(&$!)"),
 *                 ),
 *                 @OA\Schema(
 *                     @OA\Property(property="grant_type", type="string", example="refresh_token"),
 *                     @OA\Property(property="refresh_token", type="string", example="15f8017665b4094d15432da"),
 *                     @OA\Property(property="client_id", type="string", example="ZGFfPErDzJONO2j9evX3_2mRdgqN"),
 *                     @OA\Property(property="client_secret", type="string", example="KMWZ_L8jgUKNrShC"),
 *                 )
 *             }
 *         )
 *     ),
 *
 *     @OA\Response(
 *         response=200,
 *         description="Success",
 *         @OA\JsonContent(
 *             @OA\Property(property="token_type", type="string", example="Bearer"),
 *             @OA\Property(property="expires_in", type="integer", example="54000"),
 *             @OA\Property(property="access_token", type="string", example="OiJKV1QiLCJhbG"),
 *             @OA\Property(property="refresh_token", type="string", example="15f8017665b4094d15432da"),
 *         )
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Client authentication failed",
 *     ),
 *     @OA\Response(
 *         response=403,
 *         description="Invalid username or password",
 *     ),
 * ),
 */
class OAuthController extends Controller
{
}
