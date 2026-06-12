<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

final class ContactFormRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'    => ['nullable', 'string', 'max:100'],
            'email'   => ['required', 'string', 'email:rfc', 'max:255'],
            'message' => ['nullable', 'string', 'max:5000'],
            'company' => ['nullable', 'string'],
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => "Поле «Електронна пошта» є обов'язковим.",
            'email.email'    => 'Введіть коректну адресу електронної пошти.',
            'email.max'      => 'Електронна пошта не може перевищувати :max символів.',
            'name.string'    => "Ім'я має бути рядком.",
            'name.max'       => "Ім'я не може перевищувати :max символів.",
            'message.string' => 'Повідомлення має бути рядком.',
            'message.max'    => 'Повідомлення не може перевищувати :max символів.',
        ];
    }
}
