@extends('layouts.admin')

@section('content')
    @include('municipios.modal')
    <br>
    <div id="msj-success" class="alert alert-success alert-dismissible" role="alert" style="display:none">
        <strong> Municipio Actualizado Correctamente.</strong>
    </div>
    <div id="msj-danger" class="alert alert-danger alert-dismissible" role="alert" style="display:none">
        <strong> Municipio Borrado Correctamente.</strong>
    </div>
    <div id="msj-error" class="alert alert-danger alert-dismissible" role="alert" style="display:none">
        <strong id="msj"></strong>
    </div>
    <table class="table">
        {!! link_to_route('municipio.create', $title = 'Agregar municipio', $parameters = '', $attributes = ['class' => 'btn btn-primary pull-right']) !!}
        <thead>
        <th>Nombre</th>
        <th>Departamento</th>
        <th>Pais</th>
        <th>Acciones</th>
        </thead>
        <tbody id="datos">
        </tbody>
    </table>
@endsection

@section('scripts')
    {!!Html::script('js/municipios/script2.js') !!}
    {!!Html::script('js/municipios/script4.js') !!}
@endsection
