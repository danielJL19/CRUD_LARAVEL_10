@extends('../template/layout') {{--incluir el layout (header,body,footer) --}}
@section('title','INDEX') {{--TITULO DE LA PAGINA --}}

@section('content')
<div class="mt-3">
  <a href="{{route('producto_create')}}" class="btn btn-success">Crear producto</a>
  <a href="{{route('categoria_index')}}" class="btn btn-primary">Ver lista de categoria</a>
  <x-error-form/>
  <table class="table">
      <thead>
        <tr>
  <th scope="col">#</th>
          <th scope="col">Nombre</th>
          <th scope="col">Descripción</th>
          <th scope="col">Stock</th>
          <th scope="col">Precio</th>
          <th scope="col">Categorias_id</th>
          <th scope="col"></th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
        @foreach ($productos as $producto)
          <tr>
            <th scope="row">{{$producto['id']}}</th>
            <td>{{$producto['nombre']}}</td>
            <td>{{$producto['descripcion']}}</td>
            <td>{{$producto['stock']}}</td>
            <td class="fw-bold">${{$producto['precio']}}</td>
            <td>{{$producto['categorias_id']}}</td>
            <td class="d-flex">
              <a href="{{route('producto_show',$producto)}}" class="btn btn-success mx-1">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-up-right" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M14 2.5a.5.5 0 0 0-.5-.5h-6a.5.5 0 0 0 0 1h4.793L2.146 13.146a.5.5 0 0 0 .708.708L13 3.707V8.5a.5.5 0 0 0 1 0v-6z"/>
                </svg>
              </a>
              <a href="{{route('producto_edit',$producto)}}" class="btn btn-primary mx-1">Modificar</a>
              <div>
                <form action="{{route('producto_destroy',$producto)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger mx-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                      <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                    </svg>
                  </button>
                </form>
              </div>
            </td>
          </tr>          
        @endforeach


      </tbody>
    </table>
</div>
@endsection


