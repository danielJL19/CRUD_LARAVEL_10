@extends('../template/layout') {{--incluir el layout (header,body,footer) --}}
@section('title','INDEX') {{--TITULO DE LA PAGINA --}}

@section('content')

<h1>Crear producto</h1>
<x-error-form/>
<form action="{{route('producto_store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="nombre" class="form-label">nombre</label>
        <input type="text" class="form-control" name="nombre">
    </div>
    <div class="mb-3">
        <label for="descripcion" class="form-label">descripción</label>
        <input type="text" class="form-control" name="descripcion">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">stock</label>
        <input type="number" class="form-control" name="stock">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">precio</label>
        <input type="number" class="form-control" name="precio">
    </div>
    <div class="mb-3">
        <label for="file" class="form-label">Subir Imagen</label>
        <input type="file" id="file" class="form-control" name="foto">
    </div>
    <div class="mb-3">
        <label for="categoria_id" class="form-label">Elige la categoría</label>
        <select name="categoria_id" id="" class="form-select">
            <option value="0" selected>-- SELECCIONA --</option>
            @foreach ($categorias as $categoria)
                <option value="{{$categoria['id']}}">{{$categoria['nombre']}}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-success">CREAR</button>
    </div>
</form>
@endsection
