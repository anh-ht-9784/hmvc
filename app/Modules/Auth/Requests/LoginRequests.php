<?php

namespace App\Modules\Auth\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequests extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|email',
            'password' => 'required|min:3'
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute không được để trống',
            'email.email' => 'Sai định dạng email',
            'password.min' => 'Mật khẩu phải phải dài hơn 3 ký tự'
        ];
    }
}
