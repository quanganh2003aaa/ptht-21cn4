<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            // 'username' => 'required',
            'password' => 'required|min:8|max:16'
        ];
    }
    public function messages()
    {
        return [
            'password.min' => 'Mật khẩu tối thiểu 8 kí tự',
            'password.max' => 'Mật khẩu tối đa 16 kí tự'
        ];
    }
}
