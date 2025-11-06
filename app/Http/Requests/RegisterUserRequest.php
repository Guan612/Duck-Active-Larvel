<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class RegisterUserRequest extends FormRequest
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
            'loginId' => 'required|string|max:255|unique:user',
            'password' => ['required', Password::min(6)],
            "nickname" => "sometimes|string|max:255",
            "email" => "sometimes|email|max:255|unique:user",
            "headerimg" => "sometimes|string",
        ];
    }
}
