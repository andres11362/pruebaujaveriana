$('#pais').change(function (e) {
    $.get("http://localhost:8000/dptos/"+e.target.value+"", function (res, state) {
        $("#dpto").empty();
        $("#mcpio").empty();
        for (i=0; i<res.length; i++){
            $('#dpto').append("<option value='"+res[i].id+"'>"+res[i].nombre+"</option>");
        }
    })
});
