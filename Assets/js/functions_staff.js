let tableStaff;
function openModal() {
    $('#modalFormOutsource').modal('show');
}

$(function (){

    tableStaff = $('#table-staff').DataTable({
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
            {title:"EPI",data:"has_epi",
                render:function (data, type, row){
                    let span = '';
                    if(row.has_epi == 0){
                        span = '<span class="badge bg-danger">No</span>'
                    } else {
                        span = '<span class="badge bg-light text-dark">Sí</span>'
                    }
                    return span;
                }
            },
            {title:"Cita médica",data:"has_appointment",
                render:function (data, type, row){
                    let span = '';
                    if(row.has_appointment == 0){
                        span = '<span class="badge bg-danger">No</span>'
                    } else {
                        span = '<span class="badge bg-light text-dark">Sí</span>'
                    }
                    return span;
                }
            },
            {title:"Recurso preventivo",data:"is_preventive_resource",
                render:function (data, type, row){
                    let span = '';
                    if(row.is_preventive_resource == 0){
                        span = '<span class="badge bg-danger">No</span>'
                    } else {
                        span = '<span class="badge bg-light text-dark">Sí</span>'
                    }
                    return span;
                }
            },
            {title:"Carnet de conducir",data:"has_driving_license",
                render:function (data, type, row){
                    let span = '';
                    if(row.has_driving_license == 0){
                        span = '<span class="badge bg-danger">No</span>'
                    } else {
                        span = '<span class="badge bg-light text-dark">Sí</span>'
                    }
                    return span;
                }
            },
            {title:"Estado",data:"state"},
            {title:"Revisión medica",data:"medical_examination"},
            {title:"Obra",data:"building_site_name"},
            {title:"Categoria",data:"category_name"},
            {title:"Acciones",data:null,
                render: function(data, type, row){
                    return '<button type="button" onclick="viewStaff('+row.id+')" ' +
                        'class="btn btn-outline-primary" title="Consultar">' +
                        '<i class="fas fa-eye"></i>' +
                        '</button>' +
                        '&nbsp'+
                        '<button type="button" onclick="editStaff('+row.id+')" ' +
                        'class="btn btn-primary" title="Editar personal">' +
                        '<i class="far fa-edit"></i>' +
                        '</button>' +
                        '&nbsp'+
                        '<button type="button" onclick="deleteStaff('+row.id+')" ' +
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
        paging: false
    });


    // // TODO validar este formulario
    $('#formStaff').submit(function (e){
        e.preventDefault();
        let dataString = $('#formStaff').serialize();
        $.post( "http://localhost/tfg/constructalia/staff/setStaff/",dataString, function( response ) {
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