<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProjectRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'product_name' => 'required',
            'product_header' => 'required',
            'product_img' => 'required|url',
            'product_url' => 'required|url',
            'product_desc' => 'required|max:200'
        ];
    }
    public function messages(): array
    {
        return [
            'product_name.required' => 'Полето е задолжително!',
            'product_header.required' => 'Полето е задолжително!',
            'product_img.required' => 'Полето е задолжително!',
            'product_img.url' => 'Ве молам внесете валидна адреса!',
            'product_url.required' => 'Полето е задолжително!',
            'product_url.url' => 'Ве молам внесете валидна адреса!',
            'product_desc.required' => 'Полето е задолжително!',
            'product_desc.max' => 'Максимален број на карактери е 200!'
        ];
    }
}
