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
            'name' => 'required|unique:categories'
        ];
    }

    /**
     * @return array
     */
    public function messages(): array
    {
        return [
            'required' => 'Vui lòng không để trống trường :attribute',
            'unique' => ':attribute đã tồn tại'
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
