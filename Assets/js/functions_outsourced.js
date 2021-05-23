let tableOutsourced;
function openModal() {
    $('#modalFormOutsourced').modal('show');
    $('#formOutsourced').trigger("reset");
}

$(function (){
    tableOutsourced = $('#table-outsourced').DataTable({
        aProcessing:true,
        aServerSide: true,
        ajax:{
            url: "http://localhost/tfg/constructalia/outsourced/getOutsourced",
            dataSrc:''
        },
        columns:[
            {title:"ID",data:"id", visible:false},
            {title:"DNI",data:"dni"},
            {title:"Nombre",data:"full_name"},
            {title:"Empresa",data:"outsource_name"},
            {title:"ITA",data:"ita"},
            {title:"High ita",data:"high_ita"},
            {title:"Informado",data:"is_informed",
                render:function (data, type, row){
                    let span = '';
                    if(row.is_informed == 0){
                        span = '<span class="badge bg-danger">No</span>'
                    } else {
                        span = '<span class="badge bg-light text-dark">Sí</span>'
                    }
                    return span;
                }
            },
            {title:"Acciones",data:null,
                render: function(data, type, row){
                    return '<button type="button" onclick="viewOutsourced('+row.id+')" ' +
                                'class="btn btn-outline-dark" title="Consultar">' +
                                '<i class="fa fa-eye" aria-hidden="true"></i>' +
                           '</button>' +
                           '&nbsp'+
                           '<button type="button" onclick="editOutsourced('+row.id+')" ' +
                                'class="btn btn-warning" title="Editar subcontratrado">' +
                                '<i class="fa fa-pencil" aria-hidden="true"></i>' +
                           '</button>' +
                           '&nbsp'+
                           '<button type="button" onclick="deleteOutsourced('+row.id+')" ' +
                                'class="btn btn-danger" title="Eliminar subcontratrado">' +
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

    $('#formOutsourced').validate({
        rules: {
            name : {
                required: true,
                minlength: 1
            },
            dni : {
                required: true,
                minlength: 9
            },

        },
        messages:{
            dni : {
                required: "Este campo es obligatorio rellenarlo",
            },
            name : {
                required: "Este campo es obligatorio rellenarlo",
            },
        },
        errorClass: "help-inline text-danger",
        submitHandler: function (formRol,e) {
            e.preventDefault();
            let dataString = $('#formOutsourced').serialize();
            $.post( "http://localhost/tfg/constructalia/outsourced/setOutsourced/",dataString, function( response ) {
                response=JSON.parse(response);
                if(response.success) {
                    $('#modalFormOutsourced').modal('hide');
                    tableOutsourced.ajax.reload();
                    toastr.success(response.message);
                } else {
                    toastr.error(response.message);
                }

            });
        }
    });

    getSelectOutsource();
    getSelectProfession();
    getSelectTraining();
});

function getSelectOutsource(){
    $.get( "http://localhost/tfg/constructalia/outsourced/getSelectOutsource/", function( response ) {
        $('#outsourced_outsource').html(response);
    });
}

function getSelectProfession(){
    $.get( "http://localhost/tfg/constructalia/outsourced/getSelectProfession/", function( response ) {
        $('#outsourced_profession').html(response);
    });
}

function getSelectTraining(){
    $.get( "http://localhost/tfg/constructalia/outsourced/getSelectTraining/", function( response ) {
        $('#outsourced_training').html(response);
    });
}

function viewOutsourced(outsourced_id){

}

function editOutsourced(outsourced_id){
    $.get( "http://localhost/tfg/constructalia/outsourced/getOutsourcedById/"+ outsourced_id, function( response ) {
        response = JSON.parse(response);
        if(response.success) {
            let outsourcedInfo = response.outsourcedInfo;
            $('#formOutsourced').trigger("reset");
            $('#modalFormOutsourced').modal('show');

            // removeReadOnly();
            $('#outsourcedId').val(outsourcedInfo.id);

            // // Añadiendo la información del usuario al modal
            $('#outsourced_dni').val(outsourcedInfo.dni);
            $('#outsourced_name').val(outsourcedInfo.name);
            $('#outsourced_surname').val(outsourcedInfo.surname);
            $('#outsourced_ita').val(outsourcedInfo.ita);
            $('#outsourced_high_ita').val(outsourcedInfo.high_ita);
            $('#outsourced_self_employment_discharge').val(outsourcedInfo.self_employment_discharge);
            $('#outsourced_outsource').val(outsourcedInfo.outsource);
            $('#outsourced_profession').val(outsourcedInfo.profession);
            $('#outsourced_training').val(outsourcedInfo.training);

            if(outsourcedInfo.is_informed==="1") {
                $('#outsourced_is_informed').trigger('click');
            }
        } else {
            toastr.error(response.message);
        }
    });
}

function deleteOutsourced(outsourced_id){
    bootbox.confirm({
        message: "¿Seguro que quiere eliminar este subcontratado?",
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
                $.get( "http://localhost/tfg/constructalia/outsourced/deleteOutsourced/"+ outsourced_id, function( response ) {
                    response=JSON.parse(response);
                    if(response.success) {
                        tableOutsourced.ajax.reload();
                        toastr.error(response.message);
                    }
                });
            }
        }
    });
}
