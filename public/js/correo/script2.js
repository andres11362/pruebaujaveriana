$('document').ready(function() {
    $('.edit').click(function () {  //indicamos un evento en caso de que se de click a un boton de clase edit
        var item = $(this).closest('tr').find('.user').text(); //obtenemos el valor del id por medio de la busqueda en una celda de la tabla
        console.log(item); //Mostramos por consola el resultado
        var route = "http://localhost:8000/correo/"+item+"/edit"; //definimos la ruta del controlador en este caso sera edit, se envia la variable item
        $.get(route, function(res){ //se define una funcion para obtener una respuesta del controlar
            console.log(res); //se muestra la respuesta en la consola
            $('#asunto').val(res.asunto);
            $('#destin').val(res.destinatario);  //se envia a los controles los datos para su posterior actualizacion
            $('#message').val(res.mensaje);
            $('#id').val(res.id);
        });
    })
});
