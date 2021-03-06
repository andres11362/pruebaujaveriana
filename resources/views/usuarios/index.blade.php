@extends('layouts.admin')
@section('content')
    @include('alerts.mensajes')
    <br>
    <div class="users">
        <div id="msj-success" class="alert alert-success alert-dismissible" role="alert" style="display:none">
            <strong> Usuario Actualizado Correctamente.</strong>
        </div>
        <div id="msj-danger" class="alert alert-danger alert-dismissible" role="alert" style="display:none">
            <strong> Usuario Borrado Correctamente.</strong>
        </div>
        <table class="table" id="datos">
            {!! link_to_route('usuario.create', $title = 'Crear Usuario', $parameters = '', $attributes = ['class' => 'btn btn-primary pull-right']) !!}
            <thead>
                <th>Id</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Telefono</th>
                <th>Correo</th>
                <th>Municipio</th>
                <th>Departamento</th>
                <th>Pais</th>
                <th>Acciones</th>
            </thead>
            @foreach($usuarios as $user)
                <tbody>
                    <td class="user">{{$user->id}}</td>
                    <td>{{$user->nombres}}</td>
                    <td>{{$user->apellidos}}</td>
                    <td>{{$user->telefono}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->municipio}}</td>
                    <td>{{$user->departamento}}</td>
                    <td>{{$user->pais}}</td>
                    <td class="actions">
                        {!! link_to_route('usuario.edit',$title = 'Editar', $parameters = $user->id, $attributes = ['class' => 'btn btn-warning'] ) !!}
                        <button id="borrar"  class="btn btn-danger delete">Eliminar</button>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
                    </td>
                </tbody>
            @endforeach
            </thead>
        </table>
        {!!$usuarios->render()!!}
    </div>
@endsection

@section('scripts')
    {!! Html::script('js/usuarios/delete.js') !!}
@endsection