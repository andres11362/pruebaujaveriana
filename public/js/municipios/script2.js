$(document).ready(function () {
   Carga();  //llamamos a la funcion Carga()
});

function Carga() { //funcion que cargara dinamicamente la pagina de inicio de departamento
    var tablaDatos = $('#datos'); //indicamos la tabla la cual se actualizara
    var route = 'http://localhost:8000/municipio'; //indicamos la ruta de la peticion

    $('#datos').empty(); //se vacia la tabla
    $.get(route, function (res){ //se obtiene una respuesta por medio de una peticion la cual seran los datos del modelo departamento
        $(res).each(function(key,value){ //se hace un recorrido por medio de la funcion each()
            tablaDatos.append("<tr><td>"+value.nombre+"</td><td>"+value.dpto+"</td><td>"+value.pais+"</td><td><button id='editar' value="+value.id+" OnClick='Mostrar(this);' class='btn btn-warning' data-toggle='modal' data-target='#myModal'>Editar</button><button class='btn btn-danger' value="+value.id+" OnClick='Eliminar(this);'>Eliminar</button></td></tr>");
            //se indica que la tabla datos se le añadiran los valores de la respuesta, ademas se incluiran unos botones para editar y eliminar
        });
    });
}

function Eliminar(btn) {
    var value = $('#id').val();
    var dato = $('#nombre').val(); //definimos los valores en los controles
    var route = 'http://localhost:8000/municipio/'+btn.value; //indicamos la ruta del controlaor en este caso de eliminacion

    $.ajax({ //iniciamos la peticion ajax
        url: route, //definimos la ruta que sera la variable route
        headers: {'X-CSRF-TOKEN': token}, //definimos el encabezado de la peticion, que sera el token
        type: 'DELETE', //tipo de peticion
        dataType: 'json',  //tipo de datos que retornara
        success: function () { //en caso que se haga la peticion se mostrara un mensaje indicando que fue correcto
            Carga(); // llamamos a la funcion carga()
            $('#msj-danger').fadeIn();
        }
    });
}


function Mostrar(btn) { //funcion que mostrar los datos en un modal, por medio del valor del boton
    var route = "http://localhost:8000/municipio/"+btn.value+"/edit";  //indicamos la ruta del controlaor en este caso de edicion
    $.get(route, function(res){ //se obtiene una respuesta por medio de una peticion la cual seran los datos del modelo departamento
        console.log(res); //mostramos los datos por consola
       $('#nombre').val(res.nombre);
       $('#dpto').val(res.departamento_id); //se envia a los controles los datos para su posterior actualizacion
       $('#id').val(res.id);
    });
}

$('#actualizar').click(function () {
    var value = $('#id').val();
    var dato = $('#nombre').val(); //definimos los valores en los controles
    var route = 'http://localhost:8000/municipio/'+value; //indicamos la ruta del controlaor en este caso de eliminacion
    var token = $('#token').val();  //enviamos el valor del token de la aplicacion

    $.ajax({ //iniciamos la peticion ajax
        url: route, //definimos la ruta que sera la variable route
        headers: {'X-CSRF-TOKEN': token}, //definimos el encabezado de la peticion, que sera el token
        type: 'PUT', //tipo de peticion
        dataType: 'json', //tipo de datos que retornara
        data: {nombre:dato}, //datos que se envian
        success: function () { //si la peticion se ejecuta la ventana modal se cerrara y enviara un mensaje indicando el exito de la transaccion
            Carga();  //llamamos a la funcion carga()
            $('#myModal').modal('toggle');
            $('#msj-success').fadeIn();
        },
        error: function (msj){ //en caso de que la peticion no se realice se enviara un mensaje con el error, y la ventana modal se cerrara
            console.log(msj);
            $('#msj').html(msj.responseJSON.nombre);
            $('#myModal').modal('toggle');
            $('#msj-error').fadeIn();
        }
    });
});