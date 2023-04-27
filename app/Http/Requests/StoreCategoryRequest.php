<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
{
    //autentifiacion de usuario, si es false. NO SE VERIFICARA LOS DATOS 
    public function authorize(): bool
    {
        return true;
    }

    //en rules o reglas se hace las reglas de verificacion de los datos obtenidos por el formulario
    public function rules(): array
    {
        return [
            'nombre'=>'required|alpha:ascii|unique:categories,nombre'
        ];
    }

    public function messages()
    {
        return[
            'nombre.required'=>'el campo de nombre es sumamente obligatorio',
            'nombre.alpha'=>'Este campo solo debe contenedor letras',
            'nombre.unique'=>'Este nombre ya existe'
        ];
    }
}
