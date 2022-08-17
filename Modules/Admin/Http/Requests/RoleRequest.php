<?php
namespace Modules\Admin\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|unique:roles,name',
            'permission' => 'required',
        ];
    }
    public function messages()
    {
        return [

        ];
    }
}
