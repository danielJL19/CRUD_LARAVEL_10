@extends('../template/layout')
@section('title','categoria')

@section('content')
    <div class="container d-flex justify-content-center align-items-center">
        <div class="row">
            <div class="col-sm-12 text-center bg-success rounded mt-3">
                <h1 class="text-light">Producto : {{$category['nombre']}}</h1>
                <h2 class="text-light">Id: {{$category['id']}}</h2>
            </div>
        </div>
    </div>
@endsection

