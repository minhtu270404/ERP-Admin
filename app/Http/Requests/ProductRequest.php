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
            'product_name'        => 'required|string|max:255',
            'product_price'       => 'required|numeric|min:0',
            'product_description' => 'required|string',
            'status'              => 'required|in:active,inactive'
        ];
    }
    public function messages(): array
    {
        return [
            'product_name.required'        => 'Vui lòng nhập tên sản phẩm.',
            'product_name.max'             => 'Tên sản phẩm không được vượt quá 255 ký tự.',


            'product_price.required'       => 'Vui lòng nhập giá sản phẩm.',
            'product_price.numeric'        => 'Giá sản phẩm phải là số.',
            'product_price.min'            => 'Giá sản phẩm phải lớn hơn hoặc bằng 0.',

            'product_description.required' => 'Vui lòng nhập mô tả sản phẩm.',

            'status.required'              => 'Vui lòng chọn trạng thái.',
            'status.in'                    => 'Trạng thái phải là active hoặc inactive.',

        ];
    }

}
