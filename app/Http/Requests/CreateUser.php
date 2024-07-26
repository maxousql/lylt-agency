<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class CreateUser extends FormRequest
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
            'prenom' => 'required|string|max:50',
            'nom' => 'required|string|max:50',
            'telephone' => 'required|string|max:15|regex:/^[0-9]+$/',
            'email' => 'required|string|email|max:75|unique:Utilisateurs,email',
            'password' => 'required|string|min:6',
        ];
    }

    protected function prepareForValidation()
    {
        if ($this->has('password')) {
            $this->merge([
                'password' => Hash::make($this->input('password'))
            ]);
        }
    }
}
