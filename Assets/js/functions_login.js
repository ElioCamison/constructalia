$(function (){
    // TODO validar este formulario
    $('#formLogin').submit(function (e){
        e.preventDefault();
        let dataString = $('#formLogin').serialize();
        $.post( "http://localhost/tfg/constructalia/login/signIn/",dataString, function( response ) {
            response=JSON.parse(response);
            if(response.success) {
                window.location.href = response.url;
            } else {
                toastr.error(response.message);
            }
        });
    });
});