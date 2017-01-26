$('#edicion').click(function (e){
    var $id = $('#iden').val();
    var $nombres = $('#nombres').val();
    var $apellidos = $('#apellidos').val();
    var $telefono = $('#telefono').val();
    var $email = $('#email').val();
    var $password = $('#password').val();
    var $mcpio = $('#mcpio').val();
    var $route = 'http://localhost:8000/usuario/'+$id;
    var $token = $('#token').val();
    e.preventDefault();
    $.ajax({
        url: $route,
        headers: {'X-CSRF-TOKEN': $token},
        type: 'PUT',
        dataType: 'json',
        data: {id: $id, nombres: $nombres, apellidos: $apellidos, telefono: $telefono,
            email: $email, password: $password, municipio_id: $mcpio},
        success: function () {
            $('#iden').val("");
            $('#nombres').val("");
            $('#apellidos').val("");
            $('#telefono').val("");
            $('#email').val("");
            $('#password').val("");
            $('#mcpio').val(0);
            $('#msj-success').fadeIn();
        },
        error: function (msj){
            var errormessages = "";
            $.each(msj.responseJSON, function (i, field) {
                errormessages+="<li>"+field+"</li>";
            })
            $('#msj-errors-text').html("<ul>"+
                errormessages+
                "</ul>");
            $('#msj-errors').fadeIn();
        }
    });
});

