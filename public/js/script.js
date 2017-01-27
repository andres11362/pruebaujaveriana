$('#registro').click(function (e){ //indicamos el evento del boton con el id registro
    var $dato = $('#nombre').val(); //definimos los valores en los controles
    var $route = 'http://localhost:8000/pais';  //indicamos la ruta del controlador en este caso de creacion
    var $token = $('#token').val(); //enviamos el valor del token de la aplicacion
    e.preventDefault(); //evitamos que la pagina se recargue
    $.ajax({ //iniciamos la peticion ajax
        url: $route, //definimos la ruta que sera la variable route
        headers: {'X-CSRF-TOKEN': $token}, //definimos el encabezado de la peticion, que sera el token
        type: 'POST',  //tipo de peticion
        dataType: 'json', //tipo de datos que retornara
        data: {nombre: $dato}, //datos que se envian
        success: function () { //en caso que se haga la peticion se mostrara un mensaje indicando que fue correcto
            $('#msj-success').fadeIn();
        },
        error: function (msj){
            $('#msj').html(msj.responseJSON.nombre); //en caso de no ejecutarse la peticion  creara una lista con los errores
            $('#msj-error').fadeIn();                //que envia en el json y los mostrara en un mensaje
        }
    });
});
