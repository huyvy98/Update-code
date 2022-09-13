<?php

namespace Modules\User\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'cart'=>'required|array',
            'cart.*.product_id' => 'required|numeric|distinct',
            'cart.*.quantity' => 'required|numeric',
        ];
    }

    public function messages(): array
    {
        return [
            'required' => ':attribute trống',
            'distinct' => ':attribute đã có trong giỏ hàng',
            'numeric' => ':attribute phải là số'
        ];
    }

    /**
     * @return array
     */
    public function attributes(): array
    {
        return [
            'product_id' => 'Sản phẩm',
            'quantity' => 'Số lượng'
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
