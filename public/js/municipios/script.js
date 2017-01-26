$('#registro').click(function (e){
    var $dato = $('#nombre').val();
    var $dpto = $('#dpto').val();
    var $route = 'http://localhost:8000/municipio';
    var $token = $('#token').val();
    e.preventDefault();
    $.ajax({
        url: $route,
        headers: {'X-CSRF-TOKEN': $token},
        type: 'POST',
        dataType: 'json',
        data: {nombre: $dato, departamento_id: $dpto},
        success: function () {
            $('#msj-success').fadeIn();
            $('#nombre').val("");
            $('#dpto').val('Selecciona departamento');
        },
        error: function (msj){
            $('#msj').html(msj.responseJSON.nombre);
            $('#msj-error').fadeIn();
        }
    });
});
