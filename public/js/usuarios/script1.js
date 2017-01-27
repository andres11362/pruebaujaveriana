$('#pais').change(function (e) {
    $.get("http://localhost:8000/dptos/"+e.target.value+"", function (res, state) { //obtenemos una respuesta dependiendo dela ruta
        $("#dpto").empty(); //vaciamos el select de departamente
        $("#mcpio").empty(); //vaciamos el selecto de municipio
        for (i=0; i<res.length; i++){
            $('#dpto').append("<option value='"+res[i].id+"'>"+res[i].nombre+"</option>"); //rellenamos el select de departamento dependiendo de la respuesta
        }
    })
});
