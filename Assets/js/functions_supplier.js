let tableSupplier;
function openModal() {
    $('#modalFormSupplier').modal('show');
}

$(function (){
    tableSupplier = $('#table-supplier').DataTable({
        aProcessing:true,
        aServerSide: true,
        ajax:{
            url: "http://localhost/tfg/constructalia/supplier/getSupplier",
            dataSrc:''
        },
        columns:[
            {title:"ID",data:"id", visible:false},
            {title:"Código",data:"code"},
            {title:"Nombre",data:"name"},
            {title:"Email",data:"email"},
            {title:"Teléfono",data:"phone"},
            {title:"Dirección",data:"address"},
            {title:"Acciones",data:null,
                render: function(data, type, row){
                    return '<button type="button" onclick="editSupplier('+row.id+')" ' +
                        'class="btn btn-warning" title="Editar formación">' +
                        '<i class="fa fa-pencil" aria-hidden="true"></i>' +
                        '</button>' +
                        '&nbsp'+
                        '<button type="button" onclick="deleteSupplier('+row.id+')" ' +
                        'class="btn btn-danger" title="Eliminar formación">' +
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


    // TODO validar este formulario
    $('#formSupplier').submit(function (e) {
        e.preventDefault();
        let dataString = $('#formSupplier').serialize();
        $.post( "http://localhost/tfg/constructalia/supplier/setSupplier/",dataString, function( response ) {
            response = JSON.parse(response);
            if(response.success) {
                $('#modalFormSupplier').modal('hide');
                tableSupplier.ajax.reload();
                toastr.success(response.message);
            } else {
                toastr.error(response.message);
            }
        });
    });

});


function editSupplier(supplier_id){
    $.get( "http://localhost/tfg/constructalia/supplier/getSupplierById/"+ supplier_id, function( response ) {
        response = JSON.parse(response);
        if(response.success){
            let supplierInfo = response.supplierInfo;
            $('#modalFormSupplier').modal('show');
            $('#modalLabelFormSupplier').text('Actualizar proveedor')
            $('#supplierId').val(supplierInfo.id);

            // Resto de campos
            $('#supplier_code').val(supplierInfo.code);
            $('#supplier_name').val(supplierInfo.name);
            $('#supplier_email').val(supplierInfo.email);
            $('#supplier_phone').val(supplierInfo.phone);
            $('#supplier_address').val(supplierInfo.address);
        }else{
            toastr.error(response.message);
        }
    });
}

function deleteSupplier(supplier_id){
    bootbox.confirm({
        message: "¿Seguro que quiere eliminar este proveedor?",
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
                $.get( "http://localhost/tfg/constructalia/supplier/deleteSupplier/"+ supplier_id, function( response ) {
                    response=JSON.parse(response);
                    if(response.success) {
                        tableSupplier.ajax.reload();
                        toastr.error(response.message);
                    }
                });
            }
        }
    });
}