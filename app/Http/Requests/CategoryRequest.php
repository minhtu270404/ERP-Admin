<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
    public function rules()
    {
        return [
            'category_name' => 'required|max:255|string|unique:categories',
            'status' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'category_name.unique' => 'Vui lòng không nhập trùng tên danh mục ! ',
            'category_name.required' => 'Vui lòng nhập tên danh mục ! ',
            'category_name.string' => 'Tên danh mục phải là chuỗi ! ',
            'status.required' => 'Vui lòng chọn status'
        ];
    }
}
