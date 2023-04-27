<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Spatie\FlareClient\View;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;


class ProductController extends Controller
{

    public function index()
    {
        $productos= Product::all();
        return view('producto.index',compact('productos'));
    }


    public function create()
    {
        $categorias= Category::all();
        //VISTA DE FORMULARIO
        return view('producto.formulario',compact('categorias'));
    }


    public function store(StoreProductRequest $request)
    {

        
            $imagen = time().'.'.$request->foto->extension();
            //$request->foto->store('uploads/images'.$imagen);    
            copy($_FILES['foto']['tmp_name'],'uploads/images/'.$imagen);
        //TRANSLADAR LA IMAGEN A UN DIRECTORIO 
        
        //REGISTRO DE BBDD
        $product = new Product();
        $product->nombre=$request->nombre;
        $product->descripcion=$request->descripcion;
        $product->stock=$request->stock;
        $product->precio=$request->precio;
        $product->imagen= $imagen;
        //$product->foto = $archivo;
        $product->categorias_id=$request->categoria_id;
        $product->save();
        //envio de mensaje
        session()->flash('css','success');//1- nombre de sesion // 2-nombre de clases 
        session()->flash('mensaje','Se ha creado el producto con exito');
        return redirect(route('index'));
    }


    public function show($id)
    {
        //VALIDAR SI SE ENCUENTRA O NO
        $producto= Product::findOrFail($id);
    
        //MOSTRAR PRODUCTO DETALLADO
        return view('producto.show',compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //mostrar el id
        $productos=Product::findOrFail($id);
        $categorias=Category::all();
        //edit se utiliza para retornar el formulario
        return view('producto.edit',compact('productos','categorias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request,Product $product)
    {
        //1-VERIFICAR SI EL ID SE ENCUENTRA O NO EN LA BBDD
        $product = Product::findOrFail($product->id);
        
        //2-INSTANCIA DE LA CLASE O MODELO 
        $product->nombre=$request->nombre;
        $product->descripcion=$request->descripcion;
        $product->stock=$request->stock;
        $product->precio=$request->precio;
        $product->save();

        //3-GUARDAR LA SESSION
        session()->flash('css','success');//1- nombre de sesion // 2-valor
        session()->flash('mensaje-update','Se ha actualizado con éxito');//1- nombre de sesion // 2-nombre de clases
        
        //redirigir al index
        return redirect()->route('index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //1-encontrar el id del producto
        $producto=Product::findOrFail($id);
        //2-enviar mensaje
            session()->flash('css','primary');//1- nombre de sesion // 2-nombre de clases 
            session()->flash('mensaje-delete','Se ha Eliminado con exito');
        //2-eliminacion del producto 
        $producto->delete();
        return redirect(route('index'));
    }
}
