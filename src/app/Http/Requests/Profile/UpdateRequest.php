<?php

namespace App\Http\Requests\Profile;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @OA\Schema(
 *     schema="ProfileUpdateRequest",
 *     type="object",
 *     @OA\Property(property="name", type="string", example="Slark"),
 *     @OA\Property(property="lastname", type="string", example="Puchina"),
 * )
 */

class UpdateRequest extends FormRequest
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
            "name" => "string",
            "lastname" => "string",
        ];
    }
}
