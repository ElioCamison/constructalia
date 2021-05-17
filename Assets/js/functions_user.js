let tableUser;
function openModal() {
    $('#modalFormUser').removeAttr('hidden');
    $('#modalFormUser').modal('show');
}

$(function (){

    tableUser = $('#table-user').DataTable({
        processing:true,
        serverSide: true,
        ajax:{
            url: "http://localhost/tfg/constructalia/user/getUsers",
            dataSrc:''
        },
        columns:[
            {title:"ID",data:"id", visible:false},
            {title:"Nombre de usuario",data:"username"},
            {title:"Nombre completo",data:"full_name"},
            {title:"Email",data:"email"},
            {title:"Teléfono",data:"phone"},
            {title:"Estado",data:"is_Active",
                render:function (data, type, row){
                    let span = '';
                    if(row.is_Active == 0){
                        span = '<span class="badge bg-danger" title="Estado inactivo">Inactivo</span>'
                    } else {
                        span = '<span class="badge bg-light text-dark" title="Estado activo">Activo</span>'
                    }
                    return span;
                }
            },
            {title:"Rol",data:"rol_name"},
            {title:"Acciones", data:null,
                render: function(data, type, row){
                    return '<button type="button" onclick="viewUser('+row.id+')" ' +
                                'class="btn btn-outline-dark" title="Consultar">' +
                                '<i class="fas fa-eye"></i>' +
                            '</button>' +
                            '&nbsp'+
                            '<button type="button" onclick="editUser('+row.id+')" ' +
                                    'class="btn btn-warning" title="Editar usuario">' +
                                    '<i class="far fa-edit"></i>' +
                            '</button>' +
                            '&nbsp'+
                            '<button type="button" onclick="deleteUser('+row.id+')" ' +
                                    'class="btn btn-danger" title="Eliminar usuario">' +
                                    '<i class="fas fa-trash-alt"></i>' +
                            '</button>'
                }
            }
        ],
        language:{
            url: "https://cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json"
        },
        responsive: true,
        searching: false,
        info:false,
        paging: false
    });


    // TODO validar este formulario
    $('#formUser').submit(function (e){
        e.preventDefault();
        let dataString = $('#formUser').serialize();
        $.post( "http://localhost/tfg/constructalia/user/setUser/",dataString, function( response ) {
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

    getSelectRols();
});

function viewUser(user_id){
    $.get( "http://localhost/tfg/constructalia/user/getUser/"+ user_id, function( response ) {
        response = JSON.parse(response);
        if(response.success){
            let userInfo = response.userInfo;
            $('#modalViewUser').modal('show');
            $('#userInfoId').val(userInfo.id);
            // Añadiendo la información del usuario al modal
            $('#userInfo_fullName').val(userInfo.full_name);
            $('#userInfo_nick').val(userInfo.username);
            $('#userInfo_rol').val(userInfo.rol_name);
            $('#userInfo_email').val(userInfo.email);
            $('#userInfo_phone').val(userInfo.phone);
            $('#userInfo_state').val(userInfo.is_active);
        }
    });
}

function getRolNameByRolId(rolId) {
    $.get( "http://localhost/tfg/constructalia/user/getRolNameByRolId/"+ rolId, function( response ) {
        response=JSON.parse(response);
        if(response.success) {
            return response.rol_name
        }
    });
}

function deleteUser(user_id){
    bootbox.confirm({
        message: "¿Seguro que quiere eliminar este usuario?",
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
                $.get( "http://localhost/tfg/constructalia/user/deleteUser/"+ user_id, function( response ) {
                    response=JSON.parse(response);
                    if(response.success) {
                        tableUser.ajax.reload();
                        toastr.error(response.message);
                    }
                });
            }
        }
    });
}

function getSelectRols(){
    $.get( "http://localhost/tfg/constructalia/user/getSelectRols/", function( response ) {
        $('#user_rol').html(response);
    });
}

function editUser(user_id){
    $.get( "http://localhost/tfg/constructalia/user/getUser/"+ user_id, function( response ) {
        response = JSON.parse(response);
        if(response.success){
            let userInfo = response.userInfo;
            $('#modalFormUser').modal('show');
            $('#user_id').val(userInfo.id);

            // TODO Editar credenciales en otro form
            $('.nick').hide();
            $('.pswd').hide();

            // Resto de campos
            $('#user_name').val(userInfo.name);
            $('#user_surname').val(userInfo.surname);
            $('#user_email').val(userInfo.email);
            $('#user_phone').val(userInfo.phone);
            $('#user_state').val(userInfo.is_active);
            //TODO Marcar selected
            $('#user_rol').val(userInfo.rol);
        }else{
            toastr.error(response.message);
        }
    });
}

