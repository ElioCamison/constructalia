let tableMachinery;
function openModal() {
    $('#modalFormMachinery').modal('show');
}

$(function (){

    tableMachinery = $('#table-machinery').DataTable({
        processing:true,
        serverSide: true,
        ajax:{
            url: "http://localhost/tfg/constructalia/machinery/getMachinery",
            dataSrc:''
        },
        columns:[
            {title:"ID",data:"id", visible:false},
            {title:"Código",data:"code"},
            {title:"Nombre",data:"name"},
            {title:"Ubication",data:"ubication"},
            {title:"Disponibilidad",data:"available"},
            {title:"Acciones",data:null,
                render: function(data, type, row){
                    return '<button type="button" onclick="editMachinery('+row.id+')" ' +
                        'class="btn btn-primary" title="Editar maquinaria">' +
                        '<i class="far fa-edit"></i>' +
                        '</button>' +
                        '&nbsp'+
                        '<button type="button" onclick="deleteMachinery('+row.id+')" ' +
                        'class="btn btn-danger" title="Eliminar maquinaria">' +
                        '<i class="fas fa-trash-alt"></i>' +
                        '</button>'
                }
            },
        ],
        language:{
            url: "https://cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json"
        },
        responsive: true,
        searching: false,
        info:false,
        paging: false
    });


    // // TODO validar este formulario
    // $('#formUser').submit(function (e){
    //     e.preventDefault();
    //     let dataString = $('#formUser').serialize();
    //     $.post( "http://localhost/tfg/constructalia/user/setUser/",dataString, function( response ) {
    //         response=JSON.parse(response);
    //         if(response.success) {
    //             $('#modalFormUser').modal('hide');
    //             tableUser.ajax.reload();
    //             toastr.success(response.message);
    //         } else {
    //             toastr.error(response.message);
    //         }
    //
    //     });
    // });
    getSelectFamily();

});

function getSelectFamily(){
    $.get( "http://localhost/tfg/constructalia/machinery/getSelectFamily/", function( response ) {
        $('#machinery_family').html(response);
    });
}


function editMachinery(){

}

function deleteMachinery(){

}