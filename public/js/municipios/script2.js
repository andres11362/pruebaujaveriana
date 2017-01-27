$(document).ready(function () {
   Carga();
});

function Carga() {
    var tablaDatos = $('#datos');
    var route = 'http://localhost:8000/municipio';

    $('#datos').empty();
    $.get(route, function (res){
        $(res).each(function(key,value){
            tablaDatos.append("<tr><td>"+value.nombre+"</td><td>"+value.dpto+"</td><td>"+value.pais+"</td><td><button id='editar' value="+value.id+" OnClick='Mostrar(this);' class='btn btn-warning' data-toggle='modal' data-target='#myModal'>Editar</button><button class='btn btn-danger' value="+value.id+" OnClick='Eliminar(this);'>Eliminar</button></td></tr>");
        });
    });
}

function Eliminar(btn) {
    var value = $('#id').val();
    var dato = $('#nombre').val();
    var route = 'http://localhost:8000/municipio/'+btn.value;

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
    var route = "http://localhost:8000/municipio/"+btn.value+"/edit";
    $.get(route, function(res){
        console.log(res);
       $('#nombre').val(res.nombre);
       $('#dpto').val(res.departamento_id);
       $('#id').val(res.id);
    });
}

$('#actualizar').click(function () {
    var value = $('#id').val();
    var dato = $('#nombre').val();
    var route = 'http://localhost:8000/municipio/'+value;
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
        },
        error: function (msj){
            console.log(msj);
            $('#msj').html(msj.responseJSON.nombre);
            $('#myModal').modal('toggle');
            $('#msj-error').fadeIn();
        }
    });
});