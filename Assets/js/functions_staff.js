let tableStaff;
function openModal() {
    $('#modalFormStaff').modal('show');
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
            {title:"DNI",data:"dni"},
            {title:"Nombre",data:"full_name"},
            {title:"Teléfono",data:"phone"},
            {title:"Revisión medica",data:"medical_examination"},
            {title:"Obra",data:"building_site_name"},
            {title:"Categoria",data:"category_name"},
            {title:"Estado",data:"state",
                render:function (data, type, row){
                    let span = '';
                    if(row.state == 0){
                        span = '<span class="badge bg-danger" title="Estado inactivo">Inactivo</span>'
                    } else {
                        span = '<span class="badge bg-info text-dark" title="Estado activo">Activo</span>'
                    }
                    return span;
                }
            },
            {title:"Acciones",data:null,
                render: function(data, type, row){
                    return '<button type="button" onclick="viewStaff('+row.id+')" ' +
                        'class="btn btn-outline-dark" title="Consultar">' +
                        '<i class="fas fa-eye"></i>' +
                        '</button>' +
                        '&nbsp'+
                        '<button type="button" onclick="editStaff('+row.id+')" ' +
                        'class="btn btn-warning" title="Editar personal">' +
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
        paging: false,
        scrollX: false,
        ordering:false
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