<div class="form-group">
    {!!Form::label('Nombres:')!!}
    {!!Form::text('nombre',null,['id' => 'nombre', 'class' => 'form-control', 'placeholder' => 'Ingresa el nombre del departamento' ]) !!}
</div>
<div class="form-group">
    {!!Form::label('Pais','Pais:')!!}
    {!!Form::select('pais_id', $paises ,null,['placeholder' =>'selecciona pais', 'id' => 'paises','class' => 'form-control'])!!}
</div>