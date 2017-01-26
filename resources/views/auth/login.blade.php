@extends('layouts.admin')

@section('content')
    <br>
    <div class="page-header">
        <h2>Bienvenido</h2>
    </div>
    {!!Form::open(['route' => 'auth.login', 'method' => 'POST']) !!}
        <div class="form-group">
            {!!Form::label('email:', 'Correo Electronico')!!}
            {!!Form::email('email',null,['class' => 'form-control', 'placeholder' => 'Ingresa tu correo electronico' ]) !!}
        </div>
        <div class="form-group">
            {!!Form::label('password:', 'Contraseña')!!}
            {!!Form::password('password',['class' => 'form-control', 'placeholder' => 'Ingresa tu correo electronico' ]) !!}
        </div>
            {!! Form::submit('Acceder', ['class' => 'btn btn-default']) !!}
    {!!Form::close() !!}
@endsection