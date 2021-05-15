let tableUser;
function openModal() {
    $('#modalFormStaff').modal('show');
}

$(function (){

    tableUser = $('#table-staff').DataTable({
        processing:true,
        serverSide: true,
        ajax:{
            url: "http://localhost/tfg/constructalia/user/getUsers",
            dataSrc:''
        },
        columns:[
            {title:"ID",data:"id", visible:false},
            {title:"Nombre de usuario",data:"username"},
            {title:"Nombre",data:"name",
                // TODO Esto dará problemas con el buscador del dt
                render:function (data, type, row) {
                    return row.name + ' ' + row.surname;
                }
            },
            {title:"Email",data:"email"},
            {title:"Teléfono",data:"phone"},
            {title:"Rol",data:"rol",
                render:function (data, type, row) {
                    let name = "";
                    // $.get( "http://localhost/tfg/constructalia/user/getRolNameByRolId/"+ row.rol, function( response ) {
                    //     response=JSON.parse(response);
                    //     if(response.success) {
                    //         debugger
                    //         name = response.rol_name;
                    //     }
                    // });
                    // return name;
                    return row.rol;
                    // return getRolNameByRolId(row.rol)
                }
            },
            {title:"Acciones", data:null,
                render: function(data, type, row){
                    return '<button type="button" onclick="viewUser('+row.id+')" ' +
                        'class="btn btn-outline-dark" title="Consultar">' +
                        '<i class="fas fa-eye"></i>' +
                        '</button>' +
                        '&nbsp'+
                        '<button type="button" onclick="editUser('+row.id+')" ' +
                        'class="btn btn-outline-dark" title="Editar usuario">' +
                        '<i class="far fa-edit"></i>' +
                        '</button>' +
                        '&nbsp'+
                        '<button type="button" onclick="deleteUser('+row.id+')" ' +
                        'class="btn btn-dark" title="Eliminar usuario">' +
                        '<i class="fas fa-trash-alt"></i>' +
                        '</button>'
                }
            }
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
    //
    // getSelectRols();
});