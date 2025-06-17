<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
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
            'blog_title' => 'required|string|max:255',
            'blog_slug' => 'required|string|max:255|unique:blogs,blog_slug',
            'blog_content' => 'required|string',
            'status' => 'required|in:active,inactive',
            
        ];
    }
    
}
