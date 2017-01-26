$('#dpto').change(function (e) {
    $.get("http://localhost:8000/mcpios/"+e.target.value+"", function (res, state) {
        $("#mcpio").empty();
        for (i=0; i<res.length; i++){
            $('#mcpio').append("<option value='"+res[i].id+"'>"+res[i].nombre+"</option>");
        }
    })
});
