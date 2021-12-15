<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterPostRequest extends FormRequest
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

            'name' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|numeric',

        ];

    }

    public function messages(): array
    {
        return [
            'name.required' => 'Укажите логин',
            'name.string' => 'Логин не должен содержать цифры',
            'email.required' => 'Необходимо указать email',
            'email.email' => 'Неверный формат',

            'password.required' => 'Необходимо указать пароль',
            'password.numeric' => 'Пароль должен состоять только из цифр'
        ];
    }
}
