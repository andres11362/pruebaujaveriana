@extends('layouts.admin')

@section('content')
    @include('departamentos.modal')
 <br>
 <div id="msj-success" class="alert alert-success alert-dismissible" role="alert" style="display:none">
     <strong> Departamento Actualizado Correctamente.</strong>
 </div>
 <div id="msj-danger" class="alert alert-danger alert-dismissible" role="alert" style="display:none">
     <strong> Departamento Borrado Correctamente.</strong>
 </div>
    <div id="msj-error" class="alert alert-danger alert-dismissible" role="alert" style="display:none">
        <strong id="msj"></strong>
    </div>
 <table class="table">
     {!! link_to_route('departamento.create', $title = 'Agregar departamento', $parameters = '', $attributes = ['class' => 'btn btn-primary pull-right']) !!}
     <thead>
     <th>Nombre</th>
     <th>Pais</th>
     <th>Acciones</th>
     </thead>
     <tbody id="datos">
     </tbody>
 </table>
@endsection

@section('scripts')
    {!!Html::script('js/departamentos/script2.js') !!}
    {!!Html::script('js/departamentos/script4.js') !!}
@endsection

