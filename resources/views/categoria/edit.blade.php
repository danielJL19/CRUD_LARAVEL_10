@extends('../template/layout') {{--incluir el layout (header,body,footer) --}}
@section('title','editCategoria') {{--TITULO DE LA PAGINA --}}

@section('content')

<h1 class="text-center">Modificar producto</h1>
<x-error-form/>
<form action="{{route('categoria_update',$category)}}" method="post">
    @csrf
    @method('put')

    <div class="mb-3">
        <label for="nombre" class="form-label">nombre</label>
        <input type="text" class="form-control" name="nombre" value="{{$category['nombre']}}">
    </div>

    <div class="mb-3">
        <button type="submit" class="btn btn-success">EDITAR</button>
        <a href="{{route('categoria_index')}}" class="btn btn-primary">Volver</a>
    </div>

</form>
@endsection
