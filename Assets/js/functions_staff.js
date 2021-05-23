let tableStaff;
function openModal() {
    $('#modalFormStaff').modal('show');
    $('#formStaff').trigger("reset");
}

$(function (){
    tableStaff = $('#table-staff').DataTable({
        aProcessing:true,
        aServerSide: true,
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
                                '<i class="fa fa-eye" aria-hidden="true"></i>' +
                            '</button>' +
                            '&nbsp'+
                            '<button type="button" onclick="editStaff('+row.id+')" ' +
                                'class="btn btn-warning" title="Editar personal">' +
                                '<i class="fa fa-pencil" aria-hidden="true"></i>' +
                            '</button>' +
                            '&nbsp'+
                            '<button type="button" onclick="deleteStaff('+row.id+')" ' +
                                'class="btn btn-danger" title="Eliminar personal">' +
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

    $('#formStaff').validate({
        rules: {
            name : {
                required: true,
                minlength: 1
            },
            dni : {
                required: true,
                minlength: 9
            },
            phone : {
                required: true,
                minlength: 1
            }

        },
        messages:{
            name : {
                required: "Este campo es obligatorio rellenarlo",
            },
            dni : {
                required: "Este campo es obligatorio rellenarlo",
                minlength: "El DNI debe de contener mínimo 9 letras"
            },
            phone : {
                required: "Este campo es obligatorio rellenarlo",
            }
        },
        errorClass: "help-inline text-danger",
        submitHandler: function (formRol,e) {
            e.preventDefault();

            // TODO la url debería de ser base_url
            $.ajax({
                type: "POST",
                url: 'http://localhost/tfg/constructalia/staff/setStaff/',
                dataType: "json",
                data: $('#formStaff').serialize(),
                success: function(response) {

                    if(response.success) {
                        $('#modalFormStaff').modal('hide');
                        tableStaff.ajax.reload();
                        toastr.success(response.message);
                    } else {
                        toastr.error(response.message);
                    }
                },
                error : function(xhr, status, errorThrown) {

                    console.log('----------ERROR-------------');
                    console.log('Respues ajax');
                    console.log('----------------------------');
                    console.log('xhr:'+xhr);
                    console.log('----------------------------');
                    console.log('status:'+status);
                    console.log('----------------------------');
                    console.log('errorThrown:'+errorThrown);
                    console.log('----------------------------');
                    console.log('-----------FIN--------------');

                    debugger
                }
            });
        }
    });

    getSelectBuildingSite();
    getSelectCategories();
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

function viewStaff(staff_id) {
    $.get( "http://localhost/tfg/constructalia/staff/getStaffById/"+ staff_id, function( response ) {
        response = JSON.parse(response);
        if(response.success) {
            let staffInfo = response.staffInfo;
            $('#formStaff').trigger("reset");
            $('#modalFormStaff').modal('show');
            $('#staffId').val(staffInfo.id);

            //Convertimos todos los campos en readonly
            readOnly();

            // // Añadiendo la información del usuario al modal
            $('#staff_name').val(staffInfo.name);
            $('#staff_surname').val(staffInfo.surname);
            $('#staff_dni').val(staffInfo.dni);
            $('#staff_phone').val(staffInfo.phone);

            $('#staff_state').val(staffInfo.state);
            // TODO Mirar porqué no carga las obras
            $('#staff_buildingSite').val(staffInfo.building_site);
            $('#staff_category').val(staffInfo.category);
            $('#staff_description').val(staffInfo.description);

            // $('#staff_medicaExamination').val("2021-05-23")
            $('#staff_medicaExamination').val(staffInfo.medical_examination);

            if(staffInfo.is_preventive_resource==="1") {
                $('#staff_isPreventiveResource').trigger('click');
            }
            if(staffInfo.has_driving_license==="1") {
                $('#staff_hasDrivingLicense').trigger('click');
            }
            if(staffInfo.has_epi==="1") {
                $('#staff_hasEpi').trigger('click');
            }
            if(staffInfo.has_appointment ==="1"){
                $('#staff_hasAppointment').trigger('click');
            }
        }
    });
}

function editStaff(staff_id){
    $.get( "http://localhost/tfg/constructalia/staff/getStaffById/"+ staff_id, function( response ) {
        response = JSON.parse(response);
        if(response.success) {
            let staffInfo = response.staffInfo;
            $('#formStaff').trigger("reset");
            $('#modalFormStaff').modal('show');

            removeReadOnly();
            $('#staffId').val(staffInfo.id);
            // // Añadiendo la información del usuario al modal
            $('#staff_name').val(staffInfo.name);
            $('#user_surname').val(staffInfo.surname);
            $('#staff_dni').val(staffInfo.dni);
            $('#staff_phone').val(staffInfo.phone);

            $('#staff_state').val(staffInfo.state);
            // TODO Mirar porqué no carga las obras
            $('#staff_buildingSite').val(staffInfo.building_site);
            $('#staff_category').val(staffInfo.category);
            $('#staff_description').val(staffInfo.description);

            // $('#staff_medicaExamination').val("2021-05-23")
            $('#staff_medicaExamination').val(staffInfo.medical_examination);

            if(staffInfo.is_preventive_resource==="1") {
                $('#staff_isPreventiveResource').trigger('click');
            }
            if(staffInfo.has_driving_license==="1") {
                $('#staff_hasDrivingLicense').trigger('click');
            }
            if(staffInfo.has_epi==="1") {
                $('#staff_hasEpi').trigger('click');
            }
            if(staffInfo.has_appointment ==="1"){
                $('#staff_hasAppointment').trigger('click');
            }
        }
    });
}

function deleteStaff(staff_id){
    bootbox.confirm({
        message: "¿Seguro que quiere eliminar un operario propio?",
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
                $.get( "http://localhost/tfg/constructalia/staff/deleteStaff/"+ staff_id, function( response ) {
                    response=JSON.parse(response);
                    if(response.success) {
                        tableStaff.ajax.reload();
                        toastr.error(response.message);
                    }
                });
            }

        }
    });
}

function readOnly(){
    $('#staff_name').prop('readonly', true);
    $('#staff_surname').prop('readonly', true);
    $('#staff_dni').prop('readonly', true);
    $('#staff_phone').prop('readonly', true);
    $('#staff_state').attr("disabled", true);
    $('#staff_buildingSite').attr("disabled", true);
    $('#staff_category').attr("disabled", true);
    $('#staff_description').prop('readonly', true);
    $('#staff_medicaExamination').prop('readonly', true);
    $('#staff_isPreventiveResource').prop('readonly', true);
    $('#staff_hasDrivingLicense').prop('readonly', true);
    $('#staff_hasEpi').prop('readonly', true);
}

function removeReadOnly(){
    $('#staff_name').prop('readonly', false);
    $('#staff_surname').prop('readonly', false);
    $('#staff_dni').prop('readonly', false);
    $('#staff_phone').prop('readonly', false);
    $('#staff_state').attr("disabled", false);
    $('#staff_buildingSite').attr("disabled", false);
    $('#staff_category').attr("disabled", false);
    $('#staff_description').prop('readonly', false);
    $('#staff_medicaExamination').prop('readonly', false);
    $('#staff_isPreventiveResource').prop('readonly', false);
    $('#staff_hasDrivingLicense').prop('readonly', false);
    $('#staff_hasEpi').prop('readonly', false);
}