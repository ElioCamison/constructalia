let tableBuildingSite;
function openModal() {
    $('#modalFormBuildingSite').modal('show');
}

$(function (){

    tableBuildingSite = $('#table-buildingSite').DataTable({
        processing:true,
        serverSide: true,
        ajax:{
            url: "http://localhost/tfg/constructalia/staff/getStaff",
            dataSrc:''
        },
        columns:[
            {title:"ID",data:"id", visible:false},
            {title:"Código",data:"code"},
            {title:"Nombre",data:"name"},
            {title:"Estado",data:"is_active"},
            {title:"Responsable",data:"responsible"},
            {title:"Acciones",data:null,
                render: function(data, type, row){
                    return '<button type="button" onclick="viewBuildingSite('+row.id+')" ' +
                        'class="btn btn-outline-dark" title="Consultar">' +
                        '<i class="fas fa-eye"></i>' +
                        '</button>' +
                        '&nbsp'+
                        '<button type="button" onclick="editBuildingSite('+row.id+')" ' +
                        'class="btn btn-outline-dark" title="Editar usuario">' +
                        '<i class="far fa-edit"></i>' +
                        '</button>' +
                        '&nbsp'+
                        '<button type="button" onclick="deleteBuildingSite('+row.id+')" ' +
                        'class="btn btn-dark" title="Eliminar usuario">' +
                        '<i class="fas fa-trash-alt"></i>' +
                        '</button>'
                }
            },
        ],
        language:{
            url: "https://cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json"
        },
        responsive: true,
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

    getSelectResponsible();
});

function getSelectResponsible(){

}

function viewBuildingSite(){

}

function editBuildingSite(){

}

function deleteBuildingSite(){

}