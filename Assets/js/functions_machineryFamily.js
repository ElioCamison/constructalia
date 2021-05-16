let tableMachineryFamily;
function openModal() {
    $('#modalFormMachineryFamily').modal('show');
}

$(function (){

    tableMachineryFamily = $('#table-machinery').DataTable({
        processing:true,
        serverSide: true,
        ajax:{
            url: "http://localhost/tfg/constructalia/machineryFamily/getMachineryFamilies",
            dataSrc:''
        },
        columns:[
            {title:"ID",data:"id", visible:false},
            {title:"Nombre",data:"name"},
            {title:"Estado",data:"is_active",
                render:function (data, type, row){
                    let span = '';
                    if(row.is_active == 0){
                        span = '<span class="badge bg-danger" title="Estado inactivo">Inactivo</span>'
                    } else {
                        span = '<span class="badge bg-light text-dark" title="Estado activo">Activo</span>'
                    }
                    return span;
                }
            },
            {title:"Acciones",data:null,
                render: function(data, type, row){
                    return '<button type="button" onclick="editMachineryFamily('+row.id+')" ' +
                        'class="btn btn-primary" title="Editar familia">' +
                        '<i class="far fa-edit"></i>' +
                        '</button>' +
                        '&nbsp'+
                        '<button type="button" onclick="deleteMachineryFamily('+row.id+')" ' +
                        'class="btn btn-danger" title="Eliminar familia">' +
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
    $('#formMachineryFamily').submit(function (e){
        e.preventDefault();
        let dataString = $('#formMachineryFamily').serialize();
        $.post( "http://localhost/tfg/constructalia/machineryFamily/setMachineryFamily/",dataString, function( response ) {
            response=JSON.parse(response);
            if(response.success) {
                $('#modalFormMachineryFamily').modal('hide');
                tableMachineryFamily.ajax.reload();
                toastr.success(response.message);
            } else {
                toastr.error(response.message);
            }

        });
    });

});


function editMachineryFamily(){

}

function deleteMachineryFamily(){

}