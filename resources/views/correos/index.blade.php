@extends('layouts.admin')

@section('content')
    @include('correos.modal')
    <br>
<div class="users">
    <div id="msj-danger" class="alert alert-danger alert-dismissible" role="alert" style="display:none">
        <strong> Correo Borrado Correctamente.</strong>
    </div>
    <div id="msj-success" class="alert alert-success alert-dismissible" role="alert" style="display:none">
        <strong> Correo Agregado Correctamente.</strong>
    </div>
    <div id="msj-errors" class="alert alert-danger fade in" style="display:none">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <span id="msj-errors-text"></span>
    </div>
    <br>
    <table class="table" id="datos">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token"> <!--token de la aplicacion-->
        {!! link_to_route('correo.create', $title = 'Nuevo Correo', $parameters = '', $attributes = ['class' => 'btn btn-primary pull-right']) !!} <!--enlace a la ruta de creacion-->
        {!!Form::open(['route' => 'correos.send', 'method' => 'POST']) !!} <!--inicio del formulario mediante el uso de laravel collective-->
            {!! Form::submit('Enviar correos', ['class' => 'btn btn-info pull-right']) !!}
        {!!Form::close() !!}
        <thead>
            <th>Id</th>
            <th>Asunto</th>
            <th>Destinatario</th>
            <th>Estado</th>
            <th>Acciones</th>
        </thead>
        @if(sizeof($correos) > 0) <!--determina si el tamaño de los correos es mayor a 0 mostrara los datos de la tabla en caso contrario enviara un mensaje-->
            <tbody>
            @foreach($correos as $index => $correo) <!--recorrido de por cada registro de correos-->
                <tr>
                    <td class="user">{{$correo->id}}</td>
                    <td>{{$correo->asunto}}</td>
                    <td>{{$correo->destinatario}}</td> <!--atributos de correos-->
                    @if($correo->estado == null)
                        <td>sin estado</td>
                    @else
                        <td>{{$correo->estado}}</td>
                    @endif
                    <td id="actions">
                        <button id="editar"  class="btn btn-warning edit" data-toggle = 'modal' data-target = '#myModal'>Editar</button>
                        <button id="borrar"  class="btn btn-danger delete">Eliminar</button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        @else
            <div id="msj-danger" class="alert alert-danger alert-dismissible" role="alert">
                <h5>No hay nada para mostrar</h5>
            </div>
        @endif
    </table>
</div>
@endsection

@section('scripts')
    {!!Html::script('js/correo/script2.js') !!}
    {!!Html::script('js/correo/actualizar.js') !!}
    {!!Html::script('js/correo/script3.js') !!}
@endsection