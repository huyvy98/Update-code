<?php
namespace Modules\Admin\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class ProductRequestImage extends FormRequest
{
    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'category_ids' => 'required'
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
            'name' => 'Tên sản phẩm',
            'price' => 'Giá',
            'description' => 'Thông tin',
            'category_ids' => 'Danh mục'
        ];
    }
}
