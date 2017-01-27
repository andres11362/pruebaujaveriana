$('#registro').click(function (e){
    var $asunto = $('#asunto').val();
    var $destin = $('#destin').val();
    var $message = $('#message').val();
    var $user = $('#user').val();
    e.preventDefault();
    var $route = 'http://localhost:8000/correo';
    var $token = $('#token').val();
    $.ajax({
        url: $route,
        headers: {'X-CSRF-TOKEN': $token},
        type: 'POST',
        dataType: 'json',
        data: {asunto: $asunto, destinatario: $destin, mensaje: $message, user_id: $user},
        success: function () {
            $('#msj-success').fadeIn();
            $('#asunto').val("");
            $('#destin').val("");
            $('#message').val("");
            $('#asunto').attr("placeholder", "Ingresa el asunto");
            $('#destin').attr("placeholder", "Ingresa el destinatario");
            $('#message').attr("placeholder", "Ingresa el mensaje");
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
