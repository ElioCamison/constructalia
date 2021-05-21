let tableOutsource;
function openModal() {
    $('#modalFormOutsource').modal('show');
}

$(function (){
    tableOutsource = $('#table-outsource').DataTable({
        processing:true,
        serverSide: true,
        ajax:{
            url: "http://localhost/tfg/constructalia/outsource/getOutsource",
            dataSrc:''
        },
        columns:[
            {title:"ID",data:"id", visible:false},
            {title:"CIF",data:"cif"},
            {title:"Name",data:"name"},
            {title:"Teléfono",data:"phone"},
            {title:"Contacto",data:"contact"},
            {title:"Obra",data:"building_site_name"},
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
            {title:"Estado",data:"state",
                render:function (data, type, row){
                    let span = '';
                    if(row.state == 0){
                        span = '<span class="badge bg-danger">Inactivo</span>'
                    } else {
                        span = '<span class="badge bg-info text-dark">Activo</span>'
                    }
                    return span;
                }
            },
            {title:"Acciones",data:null,
                render: function(data, type, row){
                    return '<button type="button" onclick="editOutsource('+row.id+')" ' +
                                'class="btn btn-warning" title="Editar personal">' +
                                '<i class="far fa-edit"></i>' +
                           '</button>' +
                           '&nbsp'+
                           '<button type="button" onclick="deleteOutsource('+row.id+')" ' +
                                'class="btn btn-danger" title="Eliminar personal">' +
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
    $('#formOutsource').submit(function (e){
        e.preventDefault();
        let dataString = $('#formOutsource').serialize();
        $.post( "http://localhost/tfg/constructalia/outsource/setOutsource/",dataString, function( response ) {
            response=JSON.parse(response);
            if(response.success) {
                $('#modalFormUser').modal('hide');
                tableUser.ajax.reload();
                toastr.success(response.message);
            } else {
                toastr.error(response.message);
            }

        });
    });

    getSelectBuildingSite();
});


function getSelectBuildingSite(){
    $.get( "http://localhost/tfg/constructalia/outsource/getSelectBuildingSite/", function( response ) {
        $('#outsource_building_site').html(response);
    });
}


function editOutsource(outsource_id){
    $.get( "http://localhost/tfg/constructalia/outsource/getOutsourceById/"+ outsource_id, function( response ) {
        response = JSON.parse(response);
        if(response.success) {
            let outsourceInfo = response.outsourceInfo;
            $('#modalFormOutsource').modal('show');
            $('#outsourceId').val(outsourceInfo.id);

            console.log(outsourceInfo.is_informed)


                // Resto de campos
            $('#outsource_name').val(outsourceInfo.name);
            $('#outsource_phone').val(outsourceInfo.phone);
            $('#outsource_state').val(outsourceInfo.state);
            $('#outsource_contact').val(outsourceInfo.contact);
            $('#outsource_cif').val(outsourceInfo.cif);
            $('#outsource_building_site').val(outsourceInfo.building_site_id);
            $('#outsource_is_informed').val();
            $('#outsource_description').val(outsourceInfo.description);
        } else {
            toastr.error(response.message);
        }
    });
}

function deleteOutsource() {
    bootbox.confirm({
        message: "¿Seguro que quiere eliminar esta subcontrata?",
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
                $.get( "http://localhost/tfg/constructalia/outsource/deleteOutsource/"+ outsource_id, function( response ) {
                    response = JSON.parse(response);
                    if(response.success) {
                        tableOutsource.ajax.reload();
                        toastr.error(response.message);
                    }
                });
            }
        }
    });
}