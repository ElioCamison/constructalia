let tableCategory;
function openModal() {
    $('#modalFormCategory').modal('show');
}

$(function (){

    tableCategory = $('#table-category').DataTable({
        processing:true,
        serverSide: true,
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
                                '<i class="far fa-edit"></i>' +
                           '</button>' +
                           '&nbsp'+
                           '<button type="button" onclick="deleteCategory('+row.id+')" ' +
                                'class="btn btn-danger" title="Eliminar categoria">' +
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


    // TODO validar este formulario
    $('#formCategory').submit(function (e){
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
    });

});


function editCategory(){

}

function deleteCategory(){

}