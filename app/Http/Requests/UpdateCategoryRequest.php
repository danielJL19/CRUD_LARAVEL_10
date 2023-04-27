<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Unique;
use Illuminate\Validation\Rule;

class UpdateCategoryRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        $category= $this->route('category');
        return [
            'nombre'=>['required',
            'alpha:ascii',
            Rule::unique('categories','nombre')->ignore($category),//el valor debe ser unico
            ]
        
        ];
    }
    public function messages()
    {
        return [
            'nombre.required'=>'Este campo de nombre es obligatorio',
            'nombre.alpha'=>'Este campo de nombre solo admite letras',
            'nombre.unique'=>'Este campo no se puede repetir o duplicar, escriba otro'
        ];

    }
}
