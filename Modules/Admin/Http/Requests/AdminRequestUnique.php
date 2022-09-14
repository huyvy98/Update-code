<?php

namespace Modules\Admin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequestUnique extends FormRequest
{
    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email|unique:admins',
            'phone' => 'required|numeric',
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
            'email' => ':attribute không đúng định dạng ',
            'numeric' => ':attribute không đúng',
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
            'phone' => 'Số điện thoại',
            'password' => 'Password'
        ];
    }
}
