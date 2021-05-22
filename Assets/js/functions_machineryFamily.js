let tableMachineryFamily;
function openModal() {
    $('#modalFormMachineryFamily').modal('show');
}

$(function (){

    tableMachineryFamily = $('#table-machineryFamily').DataTable({
        aProcessing:true,
        aServerSide: true,
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
                                'class="btn btn-warning" title="Editar familia">' +
                                '<i class="fa fa-pencil" aria-hidden="true"></i>' +
                           '</button>' +
                           '&nbsp'+
                           '<button type="button" onclick="deleteMachineryFamily('+row.id+')" ' +
                                'class="btn btn-danger" title="Eliminar familia">' +
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


function editMachineryFamily(machineryFamily_id) {
    $.get( "http://localhost/tfg/constructalia/machineryFamily/getMachineryFamilyById/"+ machineryFamily_id, function( response ) {
        response = JSON.parse(response);
        if(response.success){
            let machineryFamilyInfo = response.machineryFamilyInfo;
            $('#modalFormMachineryFamily').modal('show');
            $('#modalLabelFormMachineryFamily').text('Actualizar familia')
            $('#machineryFamilyId').val(machineryFamilyInfo.id);

            // Resto de campos
            $('#machineryFamily_name').val(machineryFamilyInfo.name);
            $('#machineryFamily_is_active').val(machineryFamilyInfo.is_active);
        }else{
            toastr.error(response.message);
        }
    });
}

function deleteMachineryFamily(){

}