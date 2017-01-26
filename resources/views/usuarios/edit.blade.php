@extends('layouts.admin')

@section('content')
    <div id="msj-success" class="alert alert-success alert-dismissible" role="alert" style="display:none">
        <h5> Usuario Actualizado Correctamente.</h5>
    </div>
    <div id="msj-errors" class="alert alert-danger fade in" style="display:none">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <span id="msj-errors-text"></span>
    </div>
    <div class="page-header">
        <h3>Editar usuario</h3>
    </div>
    {!!Form::model($user,['route' => ['usuario.update',$user], 'method' => 'PUT']) !!}
    <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
    @include('usuarios.form.user')
        {!! link_to('#', $title='Actualizar', $attributes = ['id' => 'edicion', 'class' => 'btn btn-success'], $secure = null) !!}
    {!!Form::close() !!}
@endsection

@section('scripts')
    {!!Html::script('js/usuarios/script3.js') !!}
    {!!Html::script('js/usuarios/script1.js') !!}
    {!!Html::script('js/usuarios/script2.js') !!}
    {!!Html::script('js/usuarios/actualizar.js') !!}
@endsection
