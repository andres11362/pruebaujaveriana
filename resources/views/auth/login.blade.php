@extends('layouts.admin')

@section('content')
    @if(count($errors) > 0)
        <div class="alert alert-danger">
            <p>
                El formulario no se ha validado correctamente:
            </p>
            <ul>
                @foreach($errors->all() as $error) <!--indicamos que si hay un error en el login muestre un mensaje que contenga esos errores-->
                    <li>{!! $error !!}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <br>
    <div class="page-header">
        <h2>Bienvenido</h2>
    </div>
    {!!Form::open(['route' => 'auth.login', 'method' => 'POST']) !!} <!--inicio del formulario mediante el uso de laravel collective-->
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