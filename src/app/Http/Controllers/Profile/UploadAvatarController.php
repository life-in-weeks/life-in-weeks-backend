<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\Image\UploadRequest;
use App\Http\Resources\Image\ImageResource;
use App\Models\Image;
use App\Services\Profile\UploadAvatarService;

/**
 * @OA\Post(
 *     path="/api/profile/avatar",
 *     operationId="uploadAvatar",
 *     tags={"Profile"},
 *     summary="Upload user's avatar",
 *     security={{ "bearerAuth": {} }},
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\MediaType(
 *             mediaType="multipart/form-data",
 *             @OA\Schema(
 *                 type="object",
 *                 required={"images"},
 *                 @OA\Property(
 *                     property="images",
 *                     type="array",
 *                     @OA\Items(type="string", format="binary", description="Image file to be uploaded")
 *                 ),
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=201,
 *         description="Avatar uploaded successfully",
 *         @OA\JsonContent(
 *             @OA\Property(property="data", type="object",
 *                 ref="#/components/schemas/ImageResource"
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=422,
 *         description="Validation error",
 *     )
 * )
 */

class UploadAvatarController extends Controller
{
    public function __invoke(
        UploadRequest $request,
        UploadAvatarService $service
    ) {
        $data = $request->validated();
        $avatar = $service($data);

        return $avatar instanceof Image ? new ImageResource($avatar) : $avatar;
    }
}
