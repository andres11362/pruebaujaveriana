$('#registro').click(function (e){
    var $dato = $('#nombre').val();
    var $pais = $('#paises').val();
    var $route = 'http://localhost:8000/departamento';
    var $token = $('#token').val();
    e.preventDefault();
    $.ajax({
        url: $route,
        headers: {'X-CSRF-TOKEN': $token},
        type: 'POST',
        dataType: 'json',
        data: {nombre: $dato, pais_id: $pais },
        success: function () {
            $('#msj-success').fadeIn();
            $('#nombre').val("");
            $('#paises').val('Selecciona departamento');
        },
        error: function (msj){
            $('#msj').html(msj.responseJSON.nombre);
            $('#msj-error').fadeIn();
        }
    });
});
