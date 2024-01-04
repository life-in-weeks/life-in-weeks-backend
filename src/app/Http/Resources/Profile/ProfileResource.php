<?php
namespace App\Http\Resources\Profile;
use App\Http\Resources\User\UserResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
class ProfileResource extends JsonResource
{
    /** * Transform the resource into an array. * * @return array<string, mixed> */ public function toArray(
        Request $request
    ): array {
        return [
            "id" => $this->id,
            "date_of_birth" => $this->date_of_birth,
            "name" => $this->name,
            "user_auth_id" => $this->user_auth_id,
            "user_auth" => new UserResource($this->userAuth),
        ];
    }
}
