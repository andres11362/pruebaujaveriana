$('#registro').click(function (e){
    var $dato = $('#nombre').val();
    var $route = 'http://localhost:8000/pais';
    var $token = $('#token').val();
    e.preventDefault();
    $.ajax({
        url: $route,
        headers: {'X-CSRF-TOKEN': $token},
        type: 'POST',
        dataType: 'json',
        data: {nombre: $dato},
        success: function () {
            $('#msj-success').fadeIn();
        },
        error: function (msj){
            $('#msj').html(msj.responseJSON.nombre);
            $('#msj-error').fadeIn();
        }
    });
});
