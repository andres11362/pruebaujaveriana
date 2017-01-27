$('#dpto').change(function (e) {
    $.get("http://localhost:8000/mcpios/"+e.target.value+"", function (res, state) { //obtenemos una respuesta dependiendo dela ruta
        $("#mcpio").empty();  //vaciamos el select de municipio
        for (i=0; i<res.length; i++){
            $('#mcpio').append("<option value='"+res[i].id+"'>"+res[i].nombre+"</option>"); //rellenamos el select de departamento dependiendo de la respuesta
        }
    })
});
