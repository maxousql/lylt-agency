<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateBien extends FormRequest
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
            'typeBien_id' => 'required',
            'titre_annonce' => 'required|string|max:255',
            'contenu_annonce' => 'required|string',
            'prix' => 'required|numeric',
            'adresse' => 'required|string|max:255',
            'ville' => 'required|string|max:255',
            'code_postal' => 'required|numeric',
            'surface' => 'required|numeric',
            'nb_pieces' => 'required|numeric',
            'nb_chambres' => 'required|numeric',
            'nb_sdb' => 'required|numeric',
            'achat' => 'required',
            'neuf' => 'sometimes|boolean',
            'garage' => 'sometimes|boolean',
            'terrain' => 'sometimes|boolean',
            'photos.*' => 'required|image|mimes:jpeg,png,jpg,gif|min:1'
        ];
    }
    protected function prepareForValidation()
    {
        $this->merge([
            'typeBien_id' => (int) $this->input('typeBien_id'),
            'disponible' => true,
            'achat' => $this->has('achat'),
            'neuf' => $this->has('neuf'),
            'garage' => $this->has('garage'),
            'terrain' => $this->has('terrain')
        ]);
    }
}
