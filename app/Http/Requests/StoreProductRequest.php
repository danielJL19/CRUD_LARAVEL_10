<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\ValidaSelect;

class StoreProductRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'nombre'=>'required|alpha:ascii|unique:products,nombre',
            'descripcion'=>'required',
            'stock'=>'required|numeric',
            'precio'=>'required|numeric',
            'foto'=>'required|mimes:jpg,png',
            'categoria_id'=>[new ValidaSelect],
            
        ];
    }
    public function messages()
    {
        return[
            'nombre.required'=>'El campo de nombre es obligatorio llenar',
            'nombre.alpha'=>'El campo de nombre solo debe contener letras',
            'nombre.unique'=>'Este campo de nombre ya existe en la lista',
            'descripcion.required'=>'El campo de descripción es obligatorio llenar',
            'stock.required'=>'El campo de stock es obligatorio llenar',
            'precio.required'=>'El campo de precio es obligatorio llenar',
            'foto.required'=>'Debes adjuntar una imagen',
            'categoria_id'=>'Debes seleccionar una opción de categoria'
        ];
    }
}
