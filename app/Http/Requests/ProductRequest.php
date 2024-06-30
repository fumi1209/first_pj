<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'product_name' => 'required',
            'company_id' => 'required' ,
            'price' => ['required','regex:/^[a-zA-Z0-9]+$/'],
            'stock' => ['required','regex:/^[a-zA-Z0-9]+$/'],
            'comment' => 'nullable',
            'img_path' => 'nullable|image'
        ];
    }
}
