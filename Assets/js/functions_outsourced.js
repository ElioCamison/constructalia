let tableOutsourced;
function openModal() {
    $('#modalFormOutsourced').modal('show');
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


    // // // TODO validar este formulario
    // $('#formStaff').submit(function (e){
    //     e.preventDefault();
    //     let dataString = $('#formStaff').serialize();
    //     $.post( "http://localhost/tfg/constructalia/staff/setStaff/",dataString, function( response ) {
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

    // getSelectBuildingSite();
    // getSelectCategories();
    // getSelectTraining();
});
//
// function getSelectBuildingSite(){
//     $.get( "http://localhost/tfg/constructalia/staff/getSelectBuildingSite/", function( response ) {
//         $('#staff_buildingSite').html(response);
//     });
// }
//
// function getSelectCategories(){
//     $.get( "http://localhost/tfg/constructalia/staff/getSelectCategories/", function( response ) {
//         $('#staff_category').html(response);
//     });
// }
//
// function getSelectTraining(){
//     $.get( "http://localhost/tfg/constructalia/staff/getSelectTraining/", function( response ) {
//         $('#staff_training').html(response);
//     });
// }
//
function viewOutsourced(){

}

function editOutsourced(){

}

function deleteOutsourced(){

}
