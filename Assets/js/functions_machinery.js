let tableMachinery;
function openModal() {
    $('#modalFormMachinery').modal('show');
    $('#formMachinery').trigger("reset");
}

$(function (){

    tableMachinery = $('#table-machinery').DataTable({
        aProcessing:true,
        aServerSide: true,
        ajax:{
            url: "http://localhost/tfg/constructalia/machinery/getMachinery",
            dataSrc:''
        },
        columns:[
            {title:"ID",data:"id", visible:false},
            {title:"Código",data:"code"},
            {title:"Nombre",data:"name"},
            {title:"Ubication",data:"ubication"},
            {title:"Disponibilidad",data:"available",
                render:function (data, type, row){
                    let span = '';
                    if(row.available == 0){
                        span = '<span class="badge bg-danger" title="No hay disponibilidad">No</span>'
                    } else {
                        span = '<span class="badge bg-info text-dark" title="Disponible">Sí</span>'
                    }
                    return span;
                }
            },
            {title:"Acciones",data:null,
                render: function(data, type, row){
                    return '<button type="button" onclick="editMachinery('+row.id+')" ' +
                        'class="btn btn-warning" title="Editar maquinaria">' +
                        '<i class="fa fa-pencil" aria-hidden="true"></i>' +
                        '</button>' +
                        '&nbsp'+
                        '<button type="button" onclick="deleteMachinery('+row.id+')" ' +
                        'class="btn btn-danger" title="Eliminar maquinaria">' +
                        '<i class="fa fa-trash" aria-hidden="true"></i>' +
                        '</button>'
                }
            },
        ],
        language:{
            url: "https://cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json"
        },
        responsive: true,
        bDestroy:true,
        iDisplayLength:10,
        order:[[0,"desc"]]
    });

    $('#formMachinery').validate({
        rules: {
            code : {
                required: true
            },
            name : {
                required: true
            }
        },
        messages:{
            code : {
                required: "Este campo es obligatorio rellenarlo"
            },
            name : {
                required: "Este campo es obligatorio rellenarlo"
            }
        },
        errorClass: "help-inline text-danger",
        submitHandler: function (formRol,e) {
            e.preventDefault();
            let dataString = $('#formMachinery').serialize();
            $.post( "http://localhost/tfg/constructalia/machinery/setMachinery/",dataString, function( response ) {
                response=JSON.parse(response);
                if(response.success) {
                    $('#formMachinery').modal('hide');
                    tableMachinery.ajax.reload();
                    toastr.success(response.message);
                } else {
                    toastr.error(response.message);
                }
            });
        }
    });
    getSelectFamily();
    getSelectUbication();

});

function getSelectFamily(){
    $.get( "http://localhost/tfg/constructalia/machinery/getSelectFamily/", function( response ) {
        $('#machinery_family').html(response);
    });
}

function getSelectUbication(){
    $.get( "http://localhost/tfg/constructalia/machinery/getSelectUbication/", function( response ) {
        $('#machinery_ubication').html(response);
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