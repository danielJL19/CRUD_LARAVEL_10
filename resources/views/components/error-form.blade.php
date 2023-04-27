<div>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
</div>

{{-- si esta bien todo--}}
@if (Session::has('mensaje'))
    <div class="alert alert-{{Session::get('css')}} alert-dismissible fade show my-3" role="alert">
        {{Session::get('mensaje')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
<!--SE HA ELIMINADO EL PRODUCTO-->
@if (Session::has('mensaje-delete'))
    <div class="alert alert-{{Session::get('css')}} alert-dismissible fade show my-3" role="alert">
        {{Session::get('mensaje-delete')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<!--SE HA ACTUALIZADO EL PRODUCTO-->
@if (Session::has('mensaje-update'))
    <div class="alert alert-{{Session::get('css')}} alert-dismissible fade show my-3" role="alert">
        {{Session::get('mensaje-update')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif