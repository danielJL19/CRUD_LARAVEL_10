@extends('../template/layout')
@section('title','hola')
    
@section('content')
    <div class="row my-3">
        <div class="col-md-6">
            <img class="img-fluid" src="{{asset('uploads/images/'.$producto['imagen'])}}" alt="imagen {{$producto['nombre']}}">
        </div>
        <div class="col-md-6">
            <div>    
                <h2 class="fs-1 text-center">{{$producto['nombre']}}</h2>
                <p class="fw-bolder display-2 text-start">${{$producto['precio']}}</p>
                <p class="text-center">{{$producto['descripcion']}}</p>
            </div>
        </div>
    </div>
@stop

