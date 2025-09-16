<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'year' => 'required|integer',
            'gender_id' => 'required|exists:genders,id',
            'capa' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ];
    }

        public function messages(): array
{
    return [
        'titulo.required' => 'O título é obrigatório.',
        'capa.image' => 'A capa deve ser uma imagem válida.',
        'capa.max' => 'A imagem deve ter no máximo 2MB.',
    ];
}
}
