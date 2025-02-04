<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends ApiRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            "surname" => "required|string|max:64",
            "name" => "required|string|max:64",
            "patronymic" => "nullable|string|max:64",
            "sex" => "required|boolean",
            "birthday" => "required|date:Y-m-d",
            "email" => "required|string|email|max:255|unique:users",
            "password" => "required|string|min:6|max:255",
        ];
    }

    //Кастомные ошибки
    public function messages(): array{
        return [
            'surname.required' => 'Фамилия обязательна для заполнения',
            'name.required' => 'Имя обязательна для заполнения',
            'sex.required' => 'Пол обязателен для заполнения',
            'birthday.required' => 'Дата рождения обязателеньна для заполнения',
            'email.required' => 'Почта обязательна для заполнения',
            'password.required' => 'Пароль обязателен для заполнения',
            'surname.max' => 'Фамилия может содержать максимум 64 символа',
            'name' => 'Имя может содержать максимум 64 символа',
            'birthday.date' => 'Дата рождения должна быть в формате YYYY-MM-DD',
        ];
    }
}
