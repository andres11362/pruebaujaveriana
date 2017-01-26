$(document).ready(function () {
   Carga();
});

function Carga() {
    var tablaDatos = $('#datos');
    var route = 'http://localhost:8000/pais';

    $('#datos').empty();
    $.get(route, function (res){
        $(res).each(function(key,value){
            tablaDatos.append("<tr><td>"+value.nombre+"</td><td><button value="+value.id+" OnClick='Mostrar(this);' class='btn btn-warning' data-toggle='modal' data-target='#myModal'>Editar</button><button class='btn btn-danger' value="+value.id+" OnClick='Eliminar(this);'>Eliminar</button></td></tr>");
        });
    });
}

function Eliminar(btn) {
    var value = $('#id').val();
    var dato = $('#nombre').val();
    var route = 'http://localhost:8000/pais/'+btn.value;
    var token = $('#token').val();

    $.ajax({
        url: route,
        headers: {'X-CSRF-TOKEN': token},
        type: 'DELETE',
        dataType: 'json',
        success: function () {
            Carga();
            $('#msj-danger').fadeIn();
        }
    });
}


function Mostrar(btn) {
    var route = "http://localhost:8000/pais/"+btn.value+"/edit";
    $.get(route, function(res){
        console.log(res.id);
       $('#nombre').val(res.nombre);
       $('#id').val(res.id);
    });
}

$('#actualizar').click(function () {
    var value = $('#id').val();
    var dato = $('#nombre').val();
    var route = 'http://localhost:8000/pais/'+value;
    var token = $('#token').val();

    $.ajax({
        url: route,
        headers: {'X-CSRF-TOKEN': token},
        type: 'PUT',
        dataType: 'json',
        data: {nombre:dato},
        success: function () {
            Carga();
            $('#myModal').modal('toggle');
            $('#msj-success').fadeIn();
        }
    });
});