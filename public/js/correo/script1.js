$('#registro').click(function (e){ //indicamos el evento del boton con el id registro
    var $asunto = $('#asunto').val();
    var $destin = $('#destin').val();           //definimos los valores en los controles
    var $message = $('#message').val();
    var $user = $('#user').val();
    e.preventDefault();
    var $route = 'http://localhost:8000/correo'; //indicamos la ruta del controlaor en este caso de creacion
    var $token = $('#token').val(); //enviamos el valor del token de la aplicacion
    $.ajax({  //iniciamos la peticion ajax
        url: $route,  //definimos la ruta que sera la variable route
        headers: {'X-CSRF-TOKEN': $token}, //definimos el encabezado de la peticion, que sera el token
        type: 'POST',  //tipo de peticion
        dataType: 'json', //tipo de datos que retornara
        data: {asunto: $asunto, destinatario: $destin, mensaje: $message, user_id: $user}, //datos que se envian
        success: function () {
            $('#msj-success').fadeIn(); //en caso que se haga la peticion se mostrara un mensaje indicando que fue correcto
            $('#asunto').val("");
            $('#destin').val("");           //se limpian los valores
            $('#message').val("");
            $('#asunto').attr("placeholder", "Ingresa el asunto");
            $('#destin').attr("placeholder", "Ingresa el destinatario"); //se colocan los placeholder por defecto
            $('#message').attr("placeholder", "Ingresa el mensaje");
        },
        error: function (msj){
            var errormessages = "";
            $.each(msj.responseJSON, function (i, field) {   //en caso de no ejecutarse la peticion  creara una lista con los errores
                errormessages+="<li>"+field+"</li>";         //que envia en el json y los mostrara en un mensaje
            })
            $('#msj-errors-text').html("<ul>"+
                errormessages+
                "</ul>");
            $('#msj-errors').fadeIn();
        }
    });
});
