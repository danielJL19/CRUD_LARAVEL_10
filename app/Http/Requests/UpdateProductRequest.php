<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\ValidaSelect;
use Illuminate\Validation\Rules\Unique;
use Illuminate\Validation\Rule;
class UpdateProductRequest extends FormRequest
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
    //realizamos las validaciones
    public function rules(): array
    {
        $product=$this->route('product');
        
        return [
            'nombre'=>['required','alpha:ascii','unique:products,nombre',
            Rule::unique('products')->ignore($product)],
            'descripcion'=>'required',
            'stock'=>'required|numeric',
            'precio'=>'required|numeric',
            
            'categoria_id'=>[new ValidaSelect],
        ];
    }

    public function messages()
    {
        return[
            'nombre.required'=>'El campo de nombre es obligatorio llenar',
            'nombre.unique'=>'Este nombre ya no se encuentra disponible',
            'nombre.alpha'=>'Este campo de nombre solo debe contener letras',
            'descripcion.required'=>'El campo de descripción es obligatorio llenar',
            'stock.required'=>'El campo de stock es obligatorio llenar',
            'precio.required'=>'El campo de precio es obligatorio llenar',
            
            'categoria_id'=>'Debes seleccionar una opción de categoria'
        ];
    }
}
