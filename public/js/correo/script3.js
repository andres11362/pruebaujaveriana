$(document).ready(function() {
    $('.delete').click(function () {
        var item = $(this).closest('tr').find('.user').text();
        console.log(item);
        var token = $("#token").val();
        var route = 'http://localhost:8000/correo/'+item;
        $.ajax({
            url: route,
            headers: {'X-CSRF-TOKEN': token},
            type: 'DELETE',
            dataType: 'json',
            success: function () {
                window.location.reload();
                $('#msj-danger').fadeIn();
            }
        })
    })
});
