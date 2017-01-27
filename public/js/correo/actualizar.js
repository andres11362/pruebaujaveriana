$('#actualizar').click(function (e){
    var $id = $('#id').val();
    var $asunto = $('#asunto').val();
    var $destin = $('#destin').val();
    var $message = $('#message').val();
    var $user = $('#user').val();
    e.preventDefault();
    var $route = 'http://localhost:8000/correo/'+$id;
    var $token = $('#token').val();
    $.ajax({
        url: $route,
        headers: {'X-CSRF-TOKEN': $token},
        type: 'PUT',
        dataType: 'json',
        data: {asunto: $asunto, destinatario: $destin, mensaje: $message, user_id: $user},
        success: function () {
            $('#myModal').modal('toggle');
            window.location.reload();
            $('#msj-success').fadeIn();
            $('#asunto').val("");
            $('#destin').val("");
            $('#message').val("");
        },
        error: function (msj){
            $('#myModal').modal('toggle');
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
