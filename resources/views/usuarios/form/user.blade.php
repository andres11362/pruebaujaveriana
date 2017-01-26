<div class="form-group">
    {!!Form::label('Id:')!!}
    {!!Form::number('id',null,['id' => 'iden','class' => 'form-control', 'placeholder' => 'Ingresa el id del usuario' ]) !!}
</div>
<div class="form-group">
    {!!Form::label('Nombres:')!!}
    {!!Form::text('nombres',null,['id' => 'nombres','class' => 'form-control', 'placeholder' => 'Ingresa el nombre del usuario' ]) !!}
</div>
<div class="form-group">
    {!!Form::label('Apellidos:')!!}
    {!!Form::text('apellidos',null,['id' => 'apellidos','class' => 'form-control', 'placeholder' => 'Ingresa el apellido del usuario' ]) !!}
</div>
<div class="form-group">
    {!!Form::label('Telefono:')!!}
    {!!Form::number('telefono',null,['id' => 'telefono', 'class' => 'form-control', 'placeholder' => 'Ingresa el telefono del usuario' ]) !!}
</div>
<div class="form-group">
    {!!Form::label('Correo:')!!}
    {!!Form::email('email',null,['id' => 'email', 'class' => 'form-control', 'placeholder' => 'Ingresa el correo del usuario' ]) !!}
</div>
<div class="form-group">
    {!!Form::label('Contraseña:')!!}
    {!!Form::password('password',['id' => 'password','class' => 'form-control', 'placeholder' => 'Ingresa la contraseña del usuario' ]) !!}
</div>
<div class="form-group">
    {!!Form::label('Pais:')!!}
    {!!Form::select('pais',$pais,null,['id' => 'pais', 'class' => 'form-control', 'placeholder' =>'selecciona pais']) !!}
</div>
<div class="form-group">
    {!!Form::label('Departamento:')!!}
    {!!Form::select('departamento',['placeholder' =>'selecciona departamento'], null, ['id' => 'dpto', 'class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!!Form::label('Municipio:')!!}
    {!!Form::select('municipio_id', ['placeholder' =>'selecciona municipio'], null, ['id' => 'mcpio','class' => 'form-control']) !!}
</div>