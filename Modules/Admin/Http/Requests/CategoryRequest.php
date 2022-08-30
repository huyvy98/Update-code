<?php

namespace Modules\Admin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => 'required'
        ];
    }

    /**
     * @return array
     */
    public function messages(): array
    {
        return [
            'required' => 'Vui lòng không để trống trường :attribute'
        ];
    }

    /**
     * @return array
     */
    public function attributes(): array
    {
        return [
            'name' => 'Tên danh mục'
        ];
    }
}
