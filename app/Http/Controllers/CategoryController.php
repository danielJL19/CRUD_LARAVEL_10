<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //OBTENER TODO LAS CATEGORIAS
        $categorias = Category::all();
        return view('categoria.index', compact('categorias'));
    }


    public function create()
    {
        return view('categoria.formulario');
    }

    public function store(StoreCategoryRequest $request)
    {
        //INSERTAR REGISTRO
        $category = new Category();
        $category->nombre = $request->nombre;
        $category->save();
        session()->flash('css', 'success'); //1- nombre de sesion // 2-nombre de clases 
        session()->flash('mensaje', 'Se ha creado la categoría con exito');
        return redirect('/category');
    }


    public function show($id)
    {
        //1-ENCONTRAR EL ID 
        $category=Category::findOrFail($id);
        //2-EXPORTAR EL OBJETO AL PAG SHOW
        return view('categoria.show',compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $category=Category::findOrFail($id);
        //mostrar formulario edit
        return view('categoria.edit',compact('category'));
    }


    public function update(UpdateCategoryRequest $request, string $id)
    {
        //1-encontrar id // 
        $category=Category::findOrFail($id);
        //2-validaciones y luego modificacion de objeto
        $category->nombre=$request->nombre;
        $category->save();
        //3-sessiones escritas 
        session()->flash('css','success');//1- nombre de sesion // 2-valor
        session()->flash('mensaje-update','Se ha actualizado con éxito');//1- nombre de sesion // 2-nombre de clases
        //4-redirigir al index de categoria
        return redirect()->route('categoria_index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
         //1-encontrar el id del producto
         $category=Category::findOrFail($id);
         //2-enviar mensaje
             session()->flash('css','primary');//1- nombre de sesion // 2-nombre de clases 
             session()->flash('mensaje-delete','Se ha Eliminado con exito');
         //2-eliminacion del producto 
         $category->delete();
         return redirect(route('categoria_index'));
    }
}
