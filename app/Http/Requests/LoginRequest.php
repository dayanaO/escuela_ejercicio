<?php

namespace App\Http\Requests;

use Anik\Form\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    protected function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    protected function rules(): array
    {
        return [
            'email' => [
                'required', 'string', 'email',
            ],
            'password' => [
                'required', 'string',
            ],
        ];
    }

    /**
     * Return messages to the request
     * 
     * @return array
     */
    public function messages():array{
        return [
            'email.required' => 'El correo electronico es requerido',
            'email.email' => 'El correo electronico es invalido',
            'password.required' => 'Ingrese su contraseña',
        ];
    }
}
