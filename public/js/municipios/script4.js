$(document).ready(function () {
        var route = "http://localhost:8000/departamentos";
        $.get(route, function (res) {
            for (i=0; i<res.length; i++) {
                $('#dpto').append("<option value='"+res[i].id+"'>"+res[i].nombre+"</option>");
            }
            }
        );
});
