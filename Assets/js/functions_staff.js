let tableStaff;
function openModal() {
    $('#modalFormStaff').modal('show');
}

$(function (){

    tableUser = $('#table-staff').DataTable({
        processing:true,
        serverSide: true,
        ajax:{
            url: "http://localhost/tfg/constructalia/staff/getStaff",
            dataSrc:''
        },
        columns:[
            {title:"ID",data:"id", visible:false},
            {title:"Nombre",data:"name"},
            {title:"Apellidos",data:"surname"},
            {title:"Teléfono",data:"phone"},
            {title:"DNI",data:"dni"},
            {title:"EPI",data:"has_epi"},
            {title:"Cita médica",data:"has_appointment"},
            {title:"Recurso preventivo",data:"is_preventive_resource"},
            {title:"Carnet de conducir",data:"has_driving_license"},
            {title:"Estado",data:"username"},
            {title:"Obra",data:"building_site_name"},
            {title:"Categoria",data:"category_name"},
            {title:"Acciones",data:null,
                render: function(data, type, row){
                    return '<button type="button" onclick="viewStaff('+row.id+')" ' +
                        'class="btn btn-outline-dark" title="Consultar">' +
                        '<i class="fas fa-eye"></i>' +
                        '</button>' +
                        '&nbsp'+
                        '<button type="button" onclick="editStaff('+row.id+')" ' +
                        'class="btn btn-outline-dark" title="Editar personal">' +
                        '<i class="far fa-edit"></i>' +
                        '</button>' +
                        '&nbsp'+
                        '<button type="button" onclick="deleteStaff('+row.id+')" ' +
                        'class="btn btn-dark" title="Eliminar personal">' +
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

    getSelectBuildingSite();
    getSelectCategories();
    getSelectTraining();
});

function getSelectBuildingSite(){
    $.get( "http://localhost/tfg/constructalia/staff/getSelectBuildingSite/", function( response ) {
        $('#staff_buildingSite').html(response);
    });
}

function getSelectCategories(){
    $.get( "http://localhost/tfg/constructalia/staff/getSelectCategories/", function( response ) {
        $('#staff_category').html(response);
    });
}

function getSelectTraining(){
    $.get( "http://localhost/tfg/constructalia/staff/getSelectTraining/", function( response ) {
        $('#staff_training').html(response);
    });
}

function viewStaff(){

}

function editStaff(){

}

function deleteStaff(){

}