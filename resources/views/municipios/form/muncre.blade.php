<div class="form-group">
    {!!Form::label('Nombres:')!!}
    {!!Form::text('nombre',null,['id' => 'nombre', 'class' => 'form-control', 'placeholder' => 'Ingresa el nombre del municipio' ]) !!}
</div>
<div class="form-group">
    {!!Form::label('departamento_id','Departamento:')!!}
    {!!Form::select('departamento_id', $dpto, null,['placeholder' =>'Selecciona departamento', 'id' => 'dpto','class' => 'form-control'])!!}
</div>