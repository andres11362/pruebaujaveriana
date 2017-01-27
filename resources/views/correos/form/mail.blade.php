<div class="form-group">
    {!!Form::label('asunto', 'Asunto')!!}
    {!!Form::text('asunto',null,['id' => 'asunto', 'class' => 'form-control', 'placeholder' => 'Ingresa el asunto' ]) !!}
</div>
<div class="form-group">
    {!!Form::label('destinatario', 'Destinatario')!!}
    {!!Form::email('destinatario',null,['id' => 'destin', 'class' => 'form-control', 'placeholder' => 'Ingresa el destinatario' ]) !!}
</div>
<div class="form-group">
    {!!Form::label('mensaje', 'Mensaje')!!}
    {!!Form::textarea('mensaje',null,['id' => 'message', 'class' => 'form-control', 'placeholder' => 'Ingresa el destinatario' ]) !!}
</div>