<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth('seller')->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'new'           => ['nullable', 'numeric'],
            'title'         => ['required', 'string', 'max:255'],
            'condition'     => ['required', 'string', 'max:4'],
            'price_type'    => ['required', 'string', 'max:20'],
            'price'         => ['nullable', 'numeric'],
            'description'   => ['required', 'string', 'max:2000'],
            'city'          => ['required', 'integer', 'exists:cities,id'],
            'image'         => ['required_if_accepted:new', 'array', 'min:1', 'max:5'],
            'image.*'       => ['required_if_accepted:new', 'image', 'mimes:jpg,png,jpeg', 'max:512'],
            'category2'     => ['nullable', 'required_without:category3', 'numeric'],
            'category3'     => ['nullable', 'required_without:category2', 'numeric'],
        ];
    }
}
