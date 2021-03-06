let tableRoles;
let tablePermissionRol;

// TODO CAMBIAR LA URL
// Autoinvoke, no confudir con jquery
(function (){
    tableRoles = $('#table-rol').DataTable({
        aProcessing:true,
        aServerSide: true,
        ajax:{
            url: "http://localhost/tfg/constructalia/rol/getRoles",
            dataSrc:''
        },
        columns:[
            {title:"ID",data:"id",visible:false,},
            {title:"Nombre",data:"name"},
            {title:"Descripción",data:"description"},
            {title:"Estado",data:"is_active",
                render:function (data, type, row){
                    let button = '';
                    if(row.is_active == 0){
                        button = '<span class="badge bg-danger" title="Estado inactivo">Inactivo</span>'
                    } else {
                        button = '<span class="badge bg-info text-dark" title="Estado activo">Activo</span>'
                    }
                    return button;
                }
            },
            {title:"Acciones", data:null,
                render: function(data, type, row){
                    return '<button type="button" onclick="editPermission('+row.id+')" ' +
                                    'class="btn btn-outline-dark" title="Editar permisos">' +
                                    '<i class="fa fa-id-card-o" aria-hidden="true"></i>' +
                           '</button>' +
                           '&nbsp'+
                           '<button type="button" onclick="editRol('+row.id+')" ' +
                                    'class="btn btn-warning" title="Editar rol">' +
                                    '<i class="fa fa-pencil" aria-hidden="true"></i>' +
                           '</button>' +
                           '&nbsp'+
                           '<button type="button" onclick="deleteRol('+row.id+')" ' +
                                    'class="btn btn-danger" title="Eliminar rol">' +
                                    '<i class="fa fa-trash" aria-hidden="true"></i>' +
                           '</button>'
                }
            }
        ],
        language:{
            url: "https://cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json"
        },
        responsive: true,
        bDestroy:true,
        iDisplayLength:10,
        order:[[0,"desc"]]
    });
})()


$(function (){
   let formRol = $('#formRol');
    // Inicializamos
    $('.toast').toast()

    // Validación del formulario para añadir nuevos roles
    formRol.validate({
        rules: {
            name : {
                required: true,
                minlength: 5
            }
        },
        messages:{
            name : {
                required: "Este campo es obligatorio rellenarlo",
                minlength: "El nombre debe de contener mínimo 5 letras"
            }
        },
        errorClass: "help-inline text-danger",
        submitHandler: function (formRol,e) {
            e.preventDefault();

            // TODO la url debería de ser base_url
            $.ajax({
                type: "POST",
                url: 'http://localhost/tfg/constructalia/rol/setRol',
                dataType: "json",
                data: $('#formRol').serialize(),
                success: function(response) {

                    if(response.success) {
                        $('#modalFormRol').modal('hide');
                        tableRoles.ajax.reload();
                        toastr.success(response.message);
                    } else {
                        // TODO PODRÍA TENER ERRORES EL FORM, HABRÍA QUE VALIDAR EN EL BACK QUE TODO ESTÁ OK
                        // $('#modalFormRol').modal('hide');
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


});

$('#table-rol').dataTable();


function openModal() {
    $('#modalLabelFormRol').text('Nuevo rol');
    $('#modalFormRol').modal('show');
    $('#formRol').trigger("reset");
}

function editRol(rol_id) {
    $.get( "http://localhost/tfg/constructalia/rol/editRol/"+ rol_id, function( response ) {
        response=JSON.parse(response);
        if(response.success) {
            $('#modalFormRol').modal('show');
            $('#rol_id').val(response.rol.id)
            $('#modalLabelFormRol').text('Editar rol');
            $('#nombreRol').val(response.rol.name);
        }
    });
}

function deleteRol(rol_id){
    bootbox.confirm({
        message: "¿Seguro que quiere eliminar el rol?",
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
                $.get( "http://localhost/tfg/constructalia/rol/deleteRol/"+ rol_id, function( response ) {
                    response=JSON.parse(response);
                    if(response.success) {
                        tableRoles.ajax.reload();
                        toastr.error(response.message);
                    }
                });
            }

        }
    });
}

function editPermission(rol_id){
    $.get( "http://localhost/tfg/constructalia/permission/getPermissionRol/"+rol_id, function( response ) {
        $('#contentAjax').html(response)
        $('#modalFormPermission').modal('show');
    });
}

function savePermissionRol() {

    $('#formPermissionRol').submit(function (e){
        e.preventDefault();

        let dataString = $('#formPermissionRol').serialize();
        $.post( "http://localhost/tfg/constructalia/permission/setPermissions/",dataString, function( response ) {
            response=JSON.parse(response);
            if(response.success) {
                $('#modalFormPermission').modal('hide');
                toastr.success(response.message);
            }
        });
    })
}

function removeAllPermissions(){
    bootbox.confirm({
        message: "¿Seguro que quiere retirar todos los permisos al rol?",
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
                let rolId = $('#rolId').val()
                $.get( "http://localhost/tfg/constructalia/permission/removeAllPermissons/"+ rolId, function( response ) {
                    response=JSON.parse(response);
                    if(response.success) {
                        $('#modalFormPermission').modal('hide');
                        toastr.error(response.message);
                    }
                });
            }
        }
    });
}

