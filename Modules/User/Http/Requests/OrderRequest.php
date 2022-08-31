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
            'cart.*.product_id' => 'required|distinct',
            'cart.*.quantity' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'required' => ':attribute trống',
            'distinct' => ':attribute đã có trong giỏ hàng'
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
