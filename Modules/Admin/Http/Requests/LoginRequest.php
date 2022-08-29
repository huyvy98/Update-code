<?php

namespace Modules\Admin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'email' => 'required|email',
            'password' => 'required',
        ];
    }

    /**
     * display message
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'required' => ':attributes không để trống',
            'email' => ':attributes đúng định dạng',
        ];
    }

    /**
     * display message
     *
     * @return array
     */
    public function attributes(): array
    {
        return [
            'email' => 'Email',
            'password' => 'Password',
        ];
    }
}
