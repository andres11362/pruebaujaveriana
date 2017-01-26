@extends('layouts.admin')

@section('content')
    <br>
    <div id="msj-success" class="alert alert-success alert-dismissible" role="alert" style="display:none">
        <h3> Usuario Agregado Correctamente.</h3>
    </div>
    <div id="msj-errors" class="alert alert-danger fade in" style="display:none">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <span id="msj-errors-text"></span>
    </div>
    <div class="page-header">
        <h3>Crear usuario</h3>
    </div>
    {!!Form::open(['route' => 'usuario.store', 'method' => 'POST']) !!}
    <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
    @include('usuarios.form.user')
    {!! link_to('#', $title='Registrar', $attributes = ['id' => 'registro', 'class' => 'btn btn-success'], $secure = null) !!}
    {!!Form::close() !!}
@endsection

@section('scripts')
    {!!Html::script('js/usuarios/script1.js') !!}
    {!!Html::script('js/usuarios/script2.js') !!}
    {!!Html::script('js/usuarios/crear.js') !!}
@endsection