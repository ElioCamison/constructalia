let tableRoles;

// TODO CAMBIAR LA URL
// Autoinvoke, no confudir con jquery
(function (){
    tableRoles = $('#table-rol').DataTable({
        processing:true,
        serverSide: true,
        ajax:{
            url: "http://localhost/tfg/constructalia/rol/getRoles",
            dataSrc:''
        },
        columns:[
            {title:"ID",data:"id"},
            {title:"Nombre",data:"name"},
            {title:"Acciones", data:null,
                render: function(data, type, row){
                    return '<button type="button" onclick="editRol('+row.id+')" class="btn btn-success">Editar</button>' +
                           '&nbsp'+
                           '<button type="button" onclick="deleteRol('+row.id+')" class="btn btn-danger">Eliminar</button>'
                }
            }
        ],
        language:{
            url: "https://cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json"
        },
        responsive: true,
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
                url: 'http://localhost/tfg/constructalia/rol/createRol',
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
}

function editRol(rol_id) {
    $.get( "http://localhost/tfg/constructalia/rol/editRol/"+ rol_id, function( response ) {
        response=JSON.parse(response);
        if(response.success) {
            $('#modalFormRol').modal('show');
            $('#modalLabelFormRol').text('Editar rol');
            $('#nombreRol').val(response.rol.name);
        }
    });
}

function deleteRol(rol_id){
    alert(rol_id)
}

