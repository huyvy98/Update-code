<?php

namespace Modules\Admin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'image' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Vui lòng không để trống trường :attribute',
            'price.required' => 'Vui lòng không để trống trường :attribute',
            'description.required' => 'Vui lòng không để trống trường :attribute',
            'image.required' => 'Vui lòng không để trống trường :attribute',

        ];
    }
}
