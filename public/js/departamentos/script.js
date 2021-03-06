$('#registro').click(function (e){ //indicamos el evento del boton con el id registro
    var $dato = $('#nombre').val();
    var $pais = $('#paises').val(); //definimos los valores en los controles
    var $route = 'http://localhost:8000/departamento'; //indicamos la ruta del controlador en este caso de creacion
    var $token = $('#token').val(); //enviamos el valor del token de la aplicacion
    e.preventDefault(); //evitamos que la pagina se recargue
    $.ajax({ //iniciamos la peticion ajax
        url: $route, //definimos la ruta que sera la variable route
        headers: {'X-CSRF-TOKEN': $token}, //definimos el encabezado de la peticion, que sera el token
        type: 'POST', //tipo de peticion
        dataType: 'json',  //tipo de datos que retornara
        data: {nombre: $dato, pais_id: $pais }, //datos que se envian
        success: function () {
            $('#msj-success').fadeIn(); //en caso que se haga la peticion se mostrara un mensaje indicando que fue correcto
            $('#nombre').val("");          //se limpian los valores
            $('#paises').val('Selecciona departamento');
        },
        error: function (msj){                           //en caso de no ejecutarse la peticion  creara una lista con los errores
            $('#msj').html(msj.responseJSON.nombre);     //que envia en el json y los mostrara en un mensaje
            $('#msj-error').fadeIn();
        }
    });
});
