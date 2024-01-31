<?php

namespace App\Http\Requests\Profile;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @OA\Schema(
 *     schema="ProfileStoreRequest",
 *     type="object",
 *     required={"date_of_birth", "name", "lastname"},
 *     @OA\Property(property="date_of_birth", type="string", example="2014-11-03"),
 *     @OA\Property(property="name", type="string", example="Slark"),
 *     @OA\Property(property="lastname", type="string", example="Puchina"),
 * )
 */

class StoreRequest extends FormRequest
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
            "date_of_birth" => "date_format:Y-m-d|required",
            "name" => "string|required",
            "lastname" => "string|required",
        ];
    }
}
