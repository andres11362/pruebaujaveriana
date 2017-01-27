$(document).ready(function () {
        var route = "http://localhost:8000/paises"; //se indica la ruta en este caso de inicio
        $.get(route, function (res) { //se hace una peticion obteniendo la respuesta mediante la ruta
            for (i=0; i<res.length; i++) { //se hace un recorrido dependiendo de la respuesta
                $('#paises').append("<option value='"+res[i].id+"'>"+res[i].nombre+"</option>"); //se rellena el select dependiedo de los datos que obtenga en la respuesta
            }
            }
        );
});
