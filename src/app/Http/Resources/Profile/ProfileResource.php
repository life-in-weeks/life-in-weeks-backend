<?php
namespace App\Http\Resources\Profile;
use App\Http\Resources\Image\ImageResource;
use App\Http\Resources\User\UserResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Transform the resource into an array.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return array
 * @OA\Schema(
 *     schema="Profile",
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="date_of_birth", type="string", example="2001-14-01"),
 *     @OA\Property(property="name", type="string", example="Slark"),
 *     @OA\Property(property="lastname", type="string", example="Puchina"),
 *     @OA\Property(property="user", ref="#/components/schemas/UserResource"),
 *     @OA\Property(property="avatar", ref="#/components/schemas/ImageResource", nullable=true),
 * )
 */

class ProfileResource extends JsonResource
{
    /** * Transform the resource into an array. * * @return array<string, mixed> */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "date_of_birth" => $this->date_of_birth,
            "name" => $this->name,
            "lastname" => $this->lastname,
            "user" => new UserResource($this->user),
            "avatar" => new ImageResource($this->avatar),
        ];
    }
}
