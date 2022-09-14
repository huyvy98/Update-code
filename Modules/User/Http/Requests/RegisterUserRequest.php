<?php

namespace Modules\User\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class   RegisterUserRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     *
     */
    public function rules(): array
    {
        return [
            'firstname' => 'required',
            'lastname' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required|email|max:100|unique:users',
            'password' => 'required|confirmed|min:8',
        ];
    }

    /**
     *
     */
    public function messages(): array
    {
        return [
            'required' => ':attribute không được để trống',
            'string' => ':attribute bắt buộc phải là kiểu chuỗi Aa -> Zz',
            'email' => ':attribute không đúng định dạng ',
            'regex' => ':attribute phải là  số từ 0 -> 9',
            'max' => ':attribute phải ít hơn hay bằng :max ký tự ',
            'min' => ':attribute phải lớn hơn hoặc bằng :min ký tự ',
            'confirmed' => ':attribute nhập lại không giống nhau',
            'unique' => ':attribute đã được sử dụng',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     *
     */
    public function attributes(): array
    {
        return [
            'firstname' => 'Ho',
            'lastname' => 'Ten',
            'address' => 'Dia chi',
            'phone' => 'So dien thoai',
            'email' => 'Email',
            'password' => 'Mat khau',
            'password_confirmation' => 'Xac nhan mat khau'
        ];
    }
}
