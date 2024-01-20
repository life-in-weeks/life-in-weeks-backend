<?php

namespace App\Http\Requests\Image;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @OA\Schema(
 *     schema="ImageUploadRequest",
 *     type="object",
 *     @OA\Property(property="images", type="array", @OA\Items(type="string", format="binary"), description="Image to upload"),
 * )
 */

class UploadRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "images" => "required|array",
            "images.*" => "required|mimes:jpg,png,jpeg,webp|max:10240",
        ];
    }
}
