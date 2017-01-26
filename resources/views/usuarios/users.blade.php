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
    @foreach($usuarios as $user)
        <tbody>
        <td id="iden">{{$user->id}}</td>
        <td>{{$user->nombres}}</td>
        <td>{{$user->apellidos}}</td>
        <td>{{$user->telefono}}</td>
        <td>{{$user->email}}</td>
        <td>{{$user->municipio}}</td>
        <td>{{$user->departamento}}</td>
        <td>{{$user->pais}}</td>
        <td class="actions">
            {!! link_to_route('usuario.edit',$title = 'Editar', $parameters = $user->id, $attributes = ['class' => 'btn btn-warning'] ) !!}
            {!!Form::open(['route'=> ['usuario.destroy',$user->id], 'method' => 'DELETE'])!!}
                {!! Form::submit('Eliminar', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
        </td>
        </tbody>
        @endforeach
        </thead>
</table>
{!!$usuarios->render()!!}
