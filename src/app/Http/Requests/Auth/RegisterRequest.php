<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @OA\Schema(
 *     schema="AuthRegisterRequest",
 *     type="object",
 *     required={"username", "password"},
 *     @OA\Property(property="username", type="string", example="SlarkDota"),
 *     @OA\Property(property="email", type="string", nullable=true, example="slark@gmail.com"),
 *     @OA\Property(property="password", type="string", example="fasda15151"),
 * )
 */

class RegisterRequest extends FormRequest
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
            "username" => "required|string|max:30|min:2",
            "email" => "string|email|max:255",
            "password" => "required|string|min:8",
        ];
    }
}
