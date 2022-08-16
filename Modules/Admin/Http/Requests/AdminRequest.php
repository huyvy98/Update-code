<?php

namespace Modules\Admin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
{
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

    public function messages()
    {
        return [
            'firstname.required' => 'Vui lòng không để trống trường :attribute',
            'lastname.required' => 'Vui lòng không để trống trường :attribute',
            'email.required' => 'Vui lòng không để trống trường :attribute',
            'phone.required' => 'Vui lòng không để trống trường :attribute',
            'password.required' => 'Vui lòng không để trống trường :attribute',
        ];
    }
}
