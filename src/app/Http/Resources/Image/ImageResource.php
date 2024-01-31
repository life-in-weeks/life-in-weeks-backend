<?php

namespace App\Http\Resources\Image;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

/**
 * @OA\Schema(
 *     schema="ImageResource",
 *     @OA\Property(property="url", type="string", example="http://localhost:8080/storage/img.webp"),
 *     @OA\Property(property="updated_at", type="string", example="2024-01-20T19:45:30.000000Z"),
 * )
 */

class ImageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "url" => url($this->url),
            "updated_at" => $this->updated_at,
        ];
    }
}
