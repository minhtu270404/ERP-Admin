<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email|unique:customers,customer_email',
            'customer_phone' => 'required|string|max:20',
            'customer_address' => 'required|string',
            'customer_date' => 'required|date',
            'customer_image' => 'nullable|string', // hoặc 'image' nếu upload file
            'gender' => 'required|in:male,female',
            'status' => 'required|in:active,inactive',
        ];
    }
    public function messages(): array
    {
        return [
            'customer_name.required' => 'Vui lòng nhập tên khách hàng.',
            'customer_name.max' => 'Tên khách hàng không được vượt quá 255 ký tự.',

            'customer_email.required' => 'Vui lòng nhập email.',
            'customer_email.email' => 'Email không đúng định dạng.',
            'customer_email.unique' => 'Email đã tồn tại trong hệ thống.',

            'customer_phone.required' => 'Vui lòng nhập số điện thoại.',
            'customer_phone.max' => 'Số điện thoại không được vượt quá 20 ký tự.',

            'customer_address.required' => 'Vui lòng nhập địa chỉ.',

            'customer_date.required' => 'Vui lòng chọn ngày sinh.',
            'customer_date.date' => 'Ngày sinh không hợp lệ.',

            'gender.required' => 'Vui lòng chọn giới tính.',
            'gender.in' => 'Giới tính không hợp lệ.',

            'status.required' => 'Vui lòng chọn trạng thái.',
            'status.in' => 'Trạng thái không hợp lệ.',
        ];
    }
}
