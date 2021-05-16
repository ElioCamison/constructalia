let tableBuildingSite;
function openModal() {
    $('#modalFormBuildingSite').modal('show');
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
            {title:"Estado",data:"is_active"},
            {title:"Responsable",data:"responsible"},
            {title:"Acciones",data:null,
                render: function(data, type, row){
                    return '<button type="button" onclick="viewBuildingSite('+row.id+')" ' +
                        'class="btn btn-outline-primary" title="Consultar obra">' +
                        '<i class="fas fa-eye"></i>' +
                        '</button>' +
                        '&nbsp'+
                        '<button type="button" onclick="editBuildingSite('+row.id+')" ' +
                        'class="btn btn-primary" title="Editar obra">' +
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

    getSelectResponsible();
});

function getSelectResponsible(){
    $.get( "http://localhost/tfg/constructalia/buildingSite/getSelectResponsible/", function( response ) {
        $('#buildingSite_responsible').html(response);
    });
}

function viewBuildingSite(){

}

function editBuildingSite(){

}

function deleteBuildingSite(){

}