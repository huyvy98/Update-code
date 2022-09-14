<?php

namespace Modules\Admin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => 'required|unique:products',
            'price' => 'required',
            'description' => 'required',
            'image' => 'required',
            'category_ids' =>'required'
        ];
    }

    /**
     * @return array
     */
    public function messages(): array
    {
        return [
            'unique' => ':attribute đã tồn tại',
            'required' => 'Vui lòng không để trống trường :attribute'
        ];
    }

    /**
     * @return array
     */
    public function attributes(): array
    {
        return [
            'name' => 'Tên sản phẩm',
            'price' => 'Giá',
            'description' => 'Thông tin',
            'image' => 'Ảnh',
            'category_ids' => 'Danh mục',
        ];
    }
}
