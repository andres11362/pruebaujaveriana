$(document).ready(function () {
    $('.delete').click(function () {
        var item = $(this).closest('tr').find('.user').text(); //definimos los valores en la celda que contiene el id
        console.log(item);
        var token = $("#token").val(); //enviamos el valor del token de la aplicacion
        var route = 'http://localhost:8000/usuario/'+item; //indicamos la ruta del controlaor en este caso de eliminacion
        $.ajax({ //iniciamos la peticion ajax
            url: route, //definimos la ruta que sera la variable route
            headers: {'X-CSRF-TOKEN': token}, //definimos el encabezado de la peticion, que sera el token
            type: 'DELETE', //tipo de peticion
            dataType: 'json', //tipo de datos que retornara
            success: function () {  //en caso que se haga la peticion se mostrara un mensaje indicando que fue correcto
                window.location.reload(); //se recarga la pagina
                $('#msj-danger').fadeIn();
            }
        })
    });
});
