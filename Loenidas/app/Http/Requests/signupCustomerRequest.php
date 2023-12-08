<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class signupCustomerRequest extends FormRequest
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
            "firstname"=> "required|string",
            "lastname"=> "required|string",
            "role"=> "required|string|in:Customer",
            "email"=> "required|string",
            "password"=> "required|string|min:8",
        ];
    }
}