<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreInventoryRequest extends FormRequest
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
            "stockName"=> "required|string",
            "category"=> "required|in:Meat,Fish",
            "quantity"=> "required|integer",
            "unit"=> "required|in:Kilogram,Gram,Pieces",
            "unitCost"=> "required|integer",
            "reorderPoint"=> "required|integer"
        ];
    }
}
