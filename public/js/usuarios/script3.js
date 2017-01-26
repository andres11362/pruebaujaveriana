$(document).ready(function () {
    var mcpio = $('#iden').val();
    var route = "http://localhost:8000/datos/"+mcpio;
    $.get(route, function (res, state) {
        $("#pais").val(res[0].paisid);
        $("#dpto").empty();
        $("#mcpio").empty();
        $('#dpto').append("<option value='"+res[0].depid+"'>"+res[0].departamento+"</option>");
        $('#mcpio').append("<option value='"+res[0].munid+"'>"+res[0].municipio+"</option>");
        console.log(res);
    })
});

