@extends('layouts.admin')

@section('content')
    <div class="page-header">
        <br>
        <h3>Añadir departamento</h3>
    </div>
    {!!Form::open(['route' => 'pais.store', 'method' => 'POST']) !!}
    <div id="msj-success" class="alert alert-success alert-dismissible" role="alert" style="display:none">
        <strong> Departamento Agregado Correctamente.</strong>
    </div>
    <div id="msj-error" class="alert alert-danger alert-dismissible" role="alert" style="display:none">
        <strong id="msj"></strong>
    </div>
    <br>
    <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
    @include('departamentos.form.depcre')
    {!! link_to('#', $title='Registrar', $attributes = ['id' => 'registro', 'class' => 'btn btn-success'], $secure = null) !!}
    {!!Form::close() !!}

@endsection

@section('scripts')
    {!!Html::script('js/departamentos/script.js') !!}
@endsection