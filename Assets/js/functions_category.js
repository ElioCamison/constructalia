let tableCategory;
function openModal() {
    $('#modalFormCategory').modal('show');
    $('#formCategory').trigger("reset");
}

$(function (){

    tableCategory = $('#table-category').DataTable({
        aProcessing:true,
        aServerSide: true,
        ajax:{
            url: "http://localhost/tfg/constructalia/category/getCategories",
            dataSrc:''
        },
        columns:[
            {title:"ID",data:"id", visible:false},
            {title:"Nombre",data:"name"},
            {title:"Precio hora",data:"price_hour"},
            {title:"Acciones",data:null,
                render: function(data, type, row){
                    return '<button type="button" onclick="editCategory('+row.id+')" ' +
                                'class="btn btn-warning" title="Editar categoria">' +
                                '<i class="fa fa-pencil" aria-hidden="true"></i>' +
                           '</button>' +
                           '&nbsp'+
                           '<button type="button" onclick="deleteCategory('+row.id+')" ' +
                                'class="btn btn-danger" title="Eliminar categoria">' +
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


    $('#formCategory').validate({
        rules: {
            name : {
                required: true,
                minlength: 1
            }

        },
        messages:{
            name : {
                required: "Este campo es obligatorio rellenarlo",
            }
        },
        errorClass: "help-inline text-danger",
        submitHandler: function (formRol,e) {
            e.preventDefault();
            let dataString = $('#formCategory').serialize();
            $.post( "http://localhost/tfg/constructalia/category/setCategory/",dataString, function( response ) {
                response=JSON.parse(response);
                if(response.success) {
                    $('#modalFormCategory').modal('hide');
                    tableCategory.ajax.reload();
                    toastr.success(response.message);
                } else {
                    toastr.error(response.message);
                }
            });
        }
    });

});


function editCategory(category_id){
    $.get( "http://localhost/tfg/constructalia/category/getCategoryById/"+ category_id, function( response ) {
        response = JSON.parse(response);
        if(response.success){
            let categoryInfo = response.categoryInfo;
            $('#modalFormCategory').modal('show');
            $('#categoryId').val(categoryInfo.id);


            // Resto de campos
            $('#category_name').val(categoryInfo.name);
            $('#category_priceHour').val(categoryInfo.price_hour);
        }else{
            toastr.error(response.message);
        }
    });
}

function deleteCategory(category_id){
    bootbox.confirm({
        message: "¿Seguro que quiere eliminar esta categoria?",
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
                $.get( "http://localhost/tfg/constructalia/category/deleteCategory/"+ category_id, function( response ) {
                    response=JSON.parse(response);
                    if(response.success) {
                        tableCategory.ajax.reload();
                        toastr.error(response.message);
                    }
                });
            }
        }
    });
}