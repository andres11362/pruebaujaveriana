@extends('layouts.admin')

@section('content')
    <div class="page-header">
        <br>
        <h3>Nuevo Correo</h3>
    </div>
    {!!Form::open(['route' => 'correo.store', 'method' => 'POST']) !!}
    <div id="msj-success" class="alert alert-success alert-dismissible" role="alert" style="display:none">
        <strong> Correo Agregado Correctamente.</strong>
    </div>
    <div id="msj-errors" class="alert alert-danger fade in" style="display:none">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <span id="msj-errors-text"></span>
    </div>
    <br>
    <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
    <input type="hidden" name="user" value="{{Auth::user()->id}}" id="user">
        @include('correos.form.mail')
    {!! link_to('#', $title='Registrar', $attributes = ['id' => 'registro', 'class' => 'btn btn-success'], $secure = null) !!}
    {!!Form::close() !!}
@endsection

@section('scripts')
    {!!Html::script('js/correo/script1.js') !!}
@endsection