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
                        'class="btn btn-warning" title="Editar maquinaria">' +
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
        paging: false,
        scrollX: false,
        ordering:false
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

function editMachinery(machinery_id){
    $.get( "http://localhost/tfg/constructalia/machinery/getMachineryById/"+ machinery_id, function( response ) {
        response = JSON.parse(response);
        if(response.success){
            let machineryInfo = response.machineryInfo;
            $('#modalFormMachinery').modal('show');
            $('#machineryId').val(machineryInfo.id);


            // Resto de campos
            $('#machinery_code').val(machineryInfo.code);
            $('#machinery_name').val(machineryInfo.name);
            $('#machinery_price_day').val(machineryInfo.price_day);
            $('#machinery_ubication').val(machineryInfo.ubication);
            $('#machinery_machinery_type').val(machineryInfo.machinery_type);
            $('#machinery_total_amount').val(machineryInfo.total_amount);
            $('#machinery_last_revision').val(machineryInfo.last_revision);
            $('#machinery_family').val(machineryInfo.family);
            $('#machinery_available').val(machineryInfo.available);
        }else{
            toastr.error(response.message);
        }
    });
}

function deleteMachinery(machinery_id){
    bootbox.confirm({
        message: "¿Seguro que quiere eliminar esta maquinaria?",
        buttons: {
            confirm: {
                label: 'Confirmar',
                className: 'btn-default'
            },
            cancel: {
                label: 'Cancelar',
                className: 'btn-dark'
            }
        },
        callback: function (result) {
            if(result) {
                $.get( "http://localhost/tfg/constructalia/machinery/deleteMachinery/"+ machinery_id, function( response ) {
                    response=JSON.parse(response);
                    if(response.success) {
                        tableMachinery.ajax.reload();
                        toastr.error(response.message);
                    }
                });
            }
        }
    });
}