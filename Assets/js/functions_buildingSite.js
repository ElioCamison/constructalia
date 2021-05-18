let tableBuildingSite;
function openModal() {
    $('#modalFormBuildingSite').modal('show');
    $('#formBuildingSite').trigger("reset");
}

$(function (){

    tableBuildingSite = $('#table-buildingSite').DataTable({
        processing:true,
        serverSide: true,
        ajax:{
            url: "http://localhost/tfg/constructalia/buildingSite/getBuildingSites",
            dataSrc:''
        },
        columns:[
            {title:"ID",data:"id", visible:false},
            {title:"Código",data:"code"},
            {title:"Nombre",data:"name"},
            {title:"Responsable",data:"responsible"},
            {title:"Estado",data:"is_active",
                render:function (data, type, row){
                    let span = '';
                    if(row.is_active == 0){
                        span = '<span class="badge bg-danger" title="Finalizada">Finalizada</span>'
                    } else {
                        span = '<span class="badge bg-info text-dark" title="Activa">Activa</span>'
                    }
                    return span;
                }
            },
            {title:"Acciones",data:null,
                render: function(data, type, row){
                    return '<button type="button" onclick="viewBuildingSite('+row.id+')" ' +
                        'class="btn btn-outline-dark" title="Consultar obra">' +
                        '<i class="fas fa-eye"></i>' +
                        '</button>' +
                        '&nbsp'+
                        '<button type="button" onclick="editBuildingSite('+row.id+')" ' +
                        'class="btn btn-warning" title="Editar obra">' +
                        '<i class="far fa-edit"></i>' +
                        '</button>' +
                        '&nbsp'+
                        '<button type="button" onclick="deleteBuildingSite('+row.id+')" ' +
                        'class="btn btn-danger" title="Eliminar obra">' +
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


    // TODO validar este formulario
    $('#formBuildingSite').submit(function (e){
        e.preventDefault();
        let dataString = $('#formBuildingSite').serialize();
        $.post( "http://localhost/tfg/constructalia/building_site/setBuildingSite/",dataString, function( response ) {
            response=JSON.parse(response);
            if(response.success) {
                $('#modalFormBuildingSite').modal('hide');
                tableBuildingSite.ajax.reload();
                toastr.success(response.message);
            } else {
                toastr.error(response.message);
            }

        });
    });

    getSelectResponsible();
});

function getSelectResponsible(){
    $.get( "http://localhost/tfg/constructalia/buildingSite/getSelectResponsible/", function( response ) {
        $('#buildingSite_responsible').html(response);
    });
}

function viewBuildingSite(){

}

function editBuildingSite(buildingSite_id){
    $.get( "http://localhost/tfg/constructalia/buildingSite/getBuildingSiteById/"+ buildingSite_id, function( response ) {
        response = JSON.parse(response);
        if(response.success){
            let buildingSiteInfo = response.buildingSiteInfo;
            $('#modalFormBuildingSite').modal('show');
            $('#buildingSiteId').val(buildingSiteInfo.id);


            // Resto de campos
            $('#buildingSite_code').val(buildingSiteInfo.code);
            $('#buildingSite_name').val(buildingSiteInfo.name);
            $('#buildingSite_is_active').val(buildingSiteInfo.is_active);
            $('#buildingSite_description').val(buildingSiteInfo.description);
            $('#buildingSite_responsible').val(buildingSiteInfo.responsible);
        }else{
            toastr.error(response.message);
        }
    });
}

function deleteBuildingSite(buildingSite_id) {
    bootbox.confirm({
        message: "¿Seguro que quiere eliminar esta obra?",
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
                $.get( "http://localhost/tfg/constructalia/buildingSite/deleteBuildingSite/"+ buildingSite_id, function( response ) {
                    response=JSON.parse(response);
                    if(response.success) {
                        tableBuildingSite.ajax.reload();
                        toastr.error(response.message);
                    }
                });
            }
        }
    });
}