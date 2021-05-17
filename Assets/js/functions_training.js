let tableTraining;
let $modalFormTraining = $('#modalFormTraining');
function openModal() {
    $modalFormTraining.modal('show');
}

$(function (){
    tableTraining = $('#table-training').DataTable({
        processing:true,
        serverSide: true,
        ajax:{
            url: "http://localhost/tfg/constructalia/training/getTraining",
            dataSrc:''
        },
        columns:[
            {title:"ID",data:"id", visible:false},
            {title:"Nombre",data:"name"},
            {title:"Hora",data:"hour"},
            {title:"Acciones",data:null,
                render: function(data, type, row){
                    return '<button type="button" onclick="editTraining('+row.id+')" ' +
                        'class="btn btn-warning" title="Editar formación">' +
                        '<i class="far fa-edit"></i>' +
                        '</button>' +
                        '&nbsp'+
                        '<button type="button" onclick="deleteTraining('+row.id+')" ' +
                        'class="btn btn-danger" title="Eliminar formación">' +
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

    // TODO validar este formulario
    $('#formTraining').submit(function (e){
        e.preventDefault();
        let dataString = $('#formTraining').serialize();
        $.post( "http://localhost/tfg/constructalia/training/setTraining/",dataString, function( response ) {
            response=JSON.parse(response);
            if(response.success) {
                $modalFormTraining.modal('hide');
                tableTraining.ajax.reload();
                toastr.success(response.message);
            } else {
                toastr.error(response.message);
            }
        });
    });

});


function editTraining(training_id) {
    $.get( "http://localhost/tfg/constructalia/training/getTrainingById/"+ training_id, function( response ) {
        response = JSON.parse(response);
        if(response.success){
            let trainingInfo = response.trainingInfo;
            $modalFormTraining.modal('show');
            $('#trainingId').val(trainingInfo.id);
            $('#training_name').val(trainingInfo.name);
            $('#training_hour').val(trainingInfo.hour);
        }else{
            toastr.error(response.message);
        }
    });
}

function deleteTraining(training_id){
    bootbox.confirm({
        message: "¿Seguro que quiere eliminar la formación?",
        buttons: {
            confirm: {
                label: 'Confirmar',
                className: 'btn-primary'
            },
            cancel: {
                label: 'Cancelar',
                className: 'btn-danger'
            }
        },
        callback: function (result) {

            if(result) {
                $.get( "http://localhost/tfg/constructalia/training/deleteTraining/"+ training_id, function( response ) {
                    response=JSON.parse(response);
                    if(response.success) {
                        tableTraining.ajax.reload();
                        toastr.error(response.message);
                    }
                });
            }

        }
    });
}