$('document').ready(function() {
    $('.edit').click(function () {
        var item = $(this).closest('tr').find('.user').text();
        console.log(item);
        var route = "http://localhost:8000/correo/"+item+"/edit";
        $.get(route, function(res){
            console.log(res);
            $('#asunto').val(res.asunto);
            $('#destin').val(res.destinatario);
            $('#message').val(res.mensaje);
            $('#id').val(res.id);
        });
    })
});
