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
            'email' => 'required|unique:admins',
            'phone' => 'required',
            'password' => 'required|min:8'

        ];
    }

    /**
     * @return array
     */
    public function messages(): array
    {
        return [
            'required' => 'Vui lòng không để trống trường :attribute',
            'min' => ':attribute phải lớn hơn hoặc bằng :min ký tự',
            'unique' => ':attribute đã tồn tại'
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
