<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserDataResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "date_of_birth" => $this->date_of_birth,
            "name" => $this->name,
            "user_auth_id" => $this->user_auth_id,
            "user_auth" => new UserAuthResource($this->userAuth),
        ];
    }
}
