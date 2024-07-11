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

    public function attributes(){
        return [
            'product_name' => '商品名',
            'price' => '価格',
            'stock' => '在庫',
            'img_path' => '商品画像',
        ];
    }
    
    public function messages(){
        return[
            'product_name.required' => ':attributeは必須項目です。',
            'price.required' => ':attributeは必須項目です。',
            'stock.required' => ':attributeは必須項目です。',
            'price.regex:/^[a-zA-Z0-9]+$/' => ':attributeは半角英数字で入力してください。',
            'stock.regex:/^[a-zA-Z0-9]+$/' => ':attributeは半角英数字で入力してください。',
    ];

    }

    
}
