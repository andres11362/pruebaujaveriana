$(document).ready(function () {
    $('.borrar').click(function () {

        var valor = $('.borrar').text();
        alert(valor);

        var route = 'http://localhost:8000/usuario';
        var token = $('#token').val();

        /*$.ajax({
            url: route,
            headers: {'X-CSRF-TOKEN': token},
            type: 'DELETE',
            dataType: 'json',
            success: function () {
                window.location.reload(true);
                $('#msj-danger').fadeIn();
            }
        });*/
    });
});
