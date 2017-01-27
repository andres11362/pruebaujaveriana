$('#registro').click(function (e){ //indicamos el evento del boton con el id registro
    var $id = $('#iden').val();
    var $nombres = $('#nombres').val();
    var $apellidos = $('#apellidos').val();
    var $telefono = $('#telefono').val();
    var $email = $('#email').val();  //definimos los valores en los controles
    var $password = $('#password').val();
    var $mcpio = $('#mcpio').val();
    var $route = 'http://localhost:8000/usuario'; //indicamos la ruta del controlaor en este caso de creacion
    var $token = $('#token').val(); //enviamos el valor del token de la aplicacion
    e.preventDefault();
    $.ajax({ //iniciamos la peticion ajax
        url: $route, //definimos la ruta que sera la variable route
        headers: {'X-CSRF-TOKEN': $token}, //definimos el encabezado de la peticion, que sera el token
        type: 'POST', //tipo de peticion
        dataType: 'json', //tipo de datos que retornara
        data: {id: $id, nombres: $nombres, apellidos: $apellidos, telefono: $telefono,
            email: $email, password: $password, municipio_id: $mcpio}, //datos que se envian
        success: function () { //en caso que se haga la peticion se mostrara un mensaje indicando que fue correcto
             $('#iden').val("");
             $('#nombres').val("");
             $('#apellidos').val("");
             $('#telefono').val(""); //se limpian los valores
             $('#email').val("");
             $('#password').val("");
             $('#mcpio').val(0);
            $('#msj-success').fadeIn();
        },
        error: function (msj){
            var errormessages = "";
            $.each(msj.responseJSON, function (i, field) { //en caso de no ejecutarse la peticion  creara una lista con los errores
                errormessages+="<li>"+field+"</li>";      //que envia en el json y los mostrara en un mensaje
            })
            $('#msj-errors-text').html("<ul>"+
                errormessages+
                "</ul>");
            $('#msj-errors').fadeIn();
        }
    });
});
