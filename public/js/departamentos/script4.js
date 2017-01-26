$(document).ready(function () {
        var route = "http://localhost:8000/paises";
        $.get(route, function (res) {
            for (i=0; i<res.length; i++) {
                $('#paises').append("<option value='"+res[i].id+"'>"+res[i].nombre+"</option>");
            }
            }
        );
});
