<?php

namespace App\Http\Requests\House;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\ValidationRule;

class GetHousesRequest extends FormRequest
{
    protected const string RULE_NULLABLE_INTEGER = 'nullable|integer';

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
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'keyword' => 'nullable|string',
            'bedrooms' => self::RULE_NULLABLE_INTEGER,
            'bathrooms' => self::RULE_NULLABLE_INTEGER,
            'garages' => self::RULE_NULLABLE_INTEGER,
            'storeys' => self::RULE_NULLABLE_INTEGER,
            'price_from' => 'nullable|numeric',
            'price_to' => 'nullable|numeric',
        ];
    }
}
