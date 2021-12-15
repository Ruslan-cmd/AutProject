<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginPostRequest extends FormRequest
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
            'password' => 'required|numeric'
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => 'Необходимо указать email',
            'email.email' => 'Неверный формат',
            'email.unique' => 'Такой email уже есть в системе',
            'password.required' => 'Необходимо указать пароль',
            'password.numeric' => 'Пароль должен состоять только из цифр'
        ];
    }
}
