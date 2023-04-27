
@extends('../template/layout') {{--incluir el layout (header,body,footer) --}}
@section('title','formulario') {{--TITULO DE LA PAGINA --}}

@section('content')
<x-error-form/>
<form action="{{route('categoria_store')}}" method="post">
    @csrf
    <div class="mb-3">
        <label for="nombre" class="form-label">nombre</label>
        <input type="text" class="form-control" name="nombre">
    </div>
    <button type="submit" class="btn btn-success">Crear categoria</button>
</form>
@endsection
