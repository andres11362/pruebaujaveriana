<div class="form-group">
    {!!Form::label('Nombres:')!!}
    {!!Form::text('nombre',null,['id' => 'nombre', 'class' => 'form-control', 'placeholder' => 'Ingresa el nombre del municipio' ]) !!}
</div>
<div class="form-group">
    {!!Form::label('departamento_id','Departamento:')!!}
    {!!Form::select('departamento_id', ['placeholder' =>'selecciona municipio'], null,['id' => 'dpto','class' => 'form-control'])!!}
</div>