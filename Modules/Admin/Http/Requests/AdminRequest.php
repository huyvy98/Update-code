<?php

namespace Modules\Admin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
{
    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'password' => 'required'

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
            'firstname' => 'Họ',
            'lastname' => 'Tên',
            'email' => 'Email',
            'phone' => 'Phone',
            'password' => 'Password'
        ];
    }
}
