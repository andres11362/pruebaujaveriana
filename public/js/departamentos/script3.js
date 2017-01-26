$(document).on('click', '.pagination a', function (evt) {
   evt.preventDefault();
   var page = $(this).attr('href').split('page=')[1];
   var route = 'http://localhost/proyectolaravel2/public/usuario';

   $.ajax({
       url: route,
       data: {page: page},
       type: 'GET',
       dataType: 'json',
       success: function(data) {
           $('.users').html(data);
       }
   });
});
