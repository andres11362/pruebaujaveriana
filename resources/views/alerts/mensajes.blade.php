@if(Session::has('creado'))
    <div class="alert alert-success">
        <p>
            El usuario ha sido creado.
        </p>
    </div>
    {{--Session::get('message')(para usar un solo mensaje por sesion)--}}
@endif
@if(Session::has('editado'))
    <div class="alert alert-warning">
        <p>
            El usuario ha sido actualizado.
        </p>
    </div>
@endif
@if(Session::has('eliminado'))
    <div class="alert alert-danger">
        <p>
            El usuario ha sido eliminado.
        </p>
    </div>
@endif
