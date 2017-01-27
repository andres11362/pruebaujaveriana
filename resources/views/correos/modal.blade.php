<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Actualizar correo</h4>
            </div>
            <div class="modal-body">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token"> <!--Token de la aplicacion-->
                <input type="hidden" id="id"><!--Id del usuario-->
                <input type="hidden" name="user" value="{{Auth::user()->id}}" id="user">
            @include('correos.form.mail') <!-- Incluir el formulario de departamentos -->
            </div>
            <div class="modal-footer">
                {!!link_to('#', $title='Actualizar', $attributes = ['id'=>'actualizar', 'class'=>'btn btn-primary'], $secure = null)!!}
            </div>
        </div>
    </div>
</div>