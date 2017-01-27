$('#actualizar').click(function (e){ //indicamos el evento del boton con el id actualizar
    var $id = $('#id').val();
    var $asunto = $('#asunto').val();
    var $destin = $('#destin').val();  //definimos los valores en los controles
    var $message = $('#message').val();
    var $user = $('#user').val();
    e.preventDefault();
    var $route = 'http://localhost:8000/correo/'+$id; //indicamos la ruta del controlaor en este caso de actualizacion
    var $token = $('#token').val(); //enviamos el valor del token de la aplicacion
    $.ajax({ //iniciamos la peticion ajax
        url: $route, //definimos la ruta que sera la variable route
        headers: {'X-CSRF-TOKEN': $token}, //definimos el encabezado de la peticion, que sera el token
        type: 'PUT', //tipo de peticion
        dataType: 'json', //tipo de datos que retornara
        data: {asunto: $asunto, destinatario: $destin, mensaje: $message, user_id: $user}, //datos que se envian
        success: function () {  //en caso que se haga la peticion se mostrara la ventana modal se cerrara y recargara la pagina con los nuevos valores
            $('#myModal').modal('toggle');
            window.location.reload();
            $('#msj-success').fadeIn();
            $('#asunto').val("");
            $('#destin').val("");
            $('#message').val("");
        },
        error: function (msj){
            $('#myModal').modal('toggle'); //en caso de no ejecutarse la peticion  creara una lista con los errores y cerrara la ventana modal
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
