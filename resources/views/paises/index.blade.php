@extends('layouts.admin')

@section('content')
    @include('paises.modal')
    <br>
    <div id="msj-success" class="alert alert-success alert-dismissible" role="alert" style="display:none">
        <strong> País Actualizado Correctamente.</strong>
    </div>
    <div id="msj-danger" class="alert alert-danger alert-dismissible" role="alert" style="display:none">
        <strong> País Borrado Correctamente.</strong>
    </div>
    <table class="table">
        {!! link_to_route('pais.create', $title = 'Agregar pais', $parameters = '', $attributes = ['class' => 'btn btn-primary pull-right']) !!}
        <thead>
        <th>Nombre</th>
        <th>Acciones</th>
        </thead>
        <tbody id="datos">
        </tbody>
    </table>
    </div>
@endsection

@section('scripts')
    {!!Html::script('js/script2.js') !!}
@endsection