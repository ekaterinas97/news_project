<?php

namespace App\Http\Requests\Order;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'user_name' => ['required', 'string', 'min:4', 'max:20'],
            'user_phone' => ['required', 'min:11'],
            'user_email' => ['required', 'email:rfc,dns' ],
            'description' => ['required']
        ];
    }
    public function attributes(): array
    {
        return [
            'user_name' => 'Имя заказчика',
            'user_phone' => 'Телефон',
            'user_email' => 'Email',
            'description' => 'Какие данные вам нужны'
        ];
    }
    public function messages(): array
    {
        return [
            'required' => 'Нужно заполнить поле :attribute',
        ];
    }
}
