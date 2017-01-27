$('#edicion').click(function (e){ //indicamos el evento del boton con el id edicion
    var $id = $('#iden').val();
    var $nombres = $('#nombres').val();
    var $apellidos = $('#apellidos').val();
    var $telefono = $('#telefono').val(); //definimos los valores en los controles
    var $email = $('#email').val();
    var $password = $('#password').val();
    var $mcpio = $('#mcpio').val();
    var $route = 'http://localhost:8000/usuario/'+$id; //indicamos la ruta del controlaor en este caso de eliminacion
    var $token = $('#token').val(); //enviamos el valor del token de la aplicacion
    e.preventDefault();
    $.ajax({ //iniciamos la peticion ajax
        url: $route,  //definimos la ruta que sera la variable route
        headers: {'X-CSRF-TOKEN': $token}, //definimos el encabezado de la peticion, que sera el token
        type: 'PUT', //tipo de peticion
        dataType: 'json', //tipo de datos que retornara
        data: {id: $id, nombres: $nombres, apellidos: $apellidos, telefono: $telefono,
            email: $email, password: $password, municipio_id: $mcpio}, //datos que se envian
        success: function () {  //si la peticion se ejecuta la ventana modal se cerrara y enviara un mensaje indicando el exito de la transaccion
            $('#msj-success').fadeIn();
        },
        error: function (msj){ //en caso de que la peticion no se realice se enviara un mensaje con el error, y la ventana modal se cerrara
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

