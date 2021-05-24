let tableOrdering;
function openModal() {
    $('#modalFormOrdering').modal('show');
    $('#formOrdering').trigger("reset");
}

$(function (){
    tableOrdering = $('#table-ordering').DataTable({
        aProcessing:true,
        aServerSide: true,
        ajax:{
            url: "http://localhost/tfg/constructalia/ordering/getOrders",
            dataSrc:''
        },
        columns:[
            {title:"ID",data:"id", visible:false},
            {title:"Creado por",data:"made_by"},
            {title:"Estado",data:"state",
                render:function (data, type, row){
                    let span = '';
                    if(row.state == 0){
                        span = '<span class="badge bg-info text-dark">Pendiente planificar</span>'
                    }else if(row.state == 2){
                        span = '<span class="badge bg-success text-dark">En curso</span>'
                    } else if(row.state == 1){
                        span = '<span class="badge bg-light text-dark">Entregado</span>'
                    }
                    return span;
                }
            },
            {title:"Obra",data:"building_site_name"},
            {title:"Fecha entrega",data:"carried_out"},
            {title:"Urgente",data:"is_urgent",
                render:function (data, type, row){
                    let span = '';
                    if(row.is_urgent == 0){
                        span = '<span class="badge bg-success text-dark">Sí</span>'
                    } else {
                        span = '<span class="badge bg-light text-dark">No</span>'
                    }
                    return span;
                }
            },
            {title:"Acciones",data:null,
                render: function(data, type, row){
                    return '<button type="button" onclick="viewOrder('+row.id+')" ' +
                                'class="btn btn-outline-dark" title="Consultar">' +
                                '<i class="fa fa-eye" aria-hidden="true"></i>' +
                           '</button>' +
                           '&nbsp'+
                           '<button type="button" onclick="editOrder('+row.id+')" ' +
                                'class="btn btn-warning" title="Editar pedido">' +
                                '<i class="fa fa-pencil" aria-hidden="true"></i>' +
                           '</button>' +
                           '&nbsp'+
                           '<button type="button" onclick="deleteOrder('+row.id+')" ' +
                                'class="btn btn-danger" title="Eliminar pedido">' +
                                '<i class="fa fa-trash" aria-hidden="true"></i>' +
                           '</button>'+
                           '&nbsp'+
                           '<button type="button" onclick="startOrder('+row.id+')" ' +
                                'class="btn btn-outline-success" title="Iniciar pedido">' +
                                '<i class="fa fa-truck" aria-hidden="true"></i>' +
                           '</button>'+
                           '&nbsp'+
                           '<button type="button" onclick="finishOrder('+row.id+')" ' +
                                'class="btn btn-outline-danger" title="Finalizar pedido">' +
                                '<i class="fa fa-bell-o" aria-hidden="true"></i>' +
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


    $('#formOrdering').validate({
        rules: {
            building_site : {
                required: true
            }

        },
        messages:{
            building_site : {
                required: "Este campo es obligatorio rellenarlo",
            }
        },
        errorClass: "help-inline text-danger",
        submitHandler: function (formRol,e) {
            e.preventDefault();
            let dataString = $('#formOrdering').serialize();
            $.post( "http://localhost/tfg/constructalia/ordering/setOrdering/",dataString, function( response ) {
                response=JSON.parse(response);
                if(response.success) {
                    $('#modalFormOrdering').modal('hide');
                    tableOrdering.ajax.reload();
                    toastr.success(response.message);
                } else {
                    toastr.error(response.message);
                }
            });
        }
    });


    getSelectBuildingSite();
    getSelectTruck();
    getSelectMachinery();
    getSelectMaterial();
});

function getSelectBuildingSite(){
    $.get( "http://localhost/tfg/constructalia/ordering/getSelectBuildingSite/", function( response ) {
        $('#ordering_building_site').html(response);
    });
}

function getSelectTruck(){
    $.get( "http://localhost/tfg/constructalia/ordering/getSelectTruck/", function( response ) {
        $('#ordering_truck').html(response);
    });
}

function getSelectMachinery(){
    $.get( "http://localhost/tfg/constructalia/ordering/getSelectMachinery/", function( response ) {
        $('#ordering_machinery').html(response);
    });
}

function getSelectMaterial(){
    $.get( "http://localhost/tfg/constructalia/ordering/getSelectMaterial/", function( response ) {
        $('#ordering_material').html(response);
    });
}

function viewOrder(ordering_id){

}

function editOrder(ordering_id){
    $.get( "http://localhost/tfg/constructalia/ordering/getOrderingById/"+ ordering_id, function( response ) {
        response = JSON.parse(response);
        if(response.success) {
            let orderingInfo = response.orderingInfo;
            $('#formOrdering').trigger("reset");
            $('#modalFormOrdering').modal('show');

            $('#orderingId').val(orderingInfo.id);

            // // Añadiendo la información del usuario al modal
            $('#ordering_building_site').val(orderingInfo.building_site);
            // $('#ordering_material').val(orderingInfo.name);
            // $('#ordering_machinery').val(orderingInfo.surname);
            $('#ordering_note').val(orderingInfo.note);

            if(orderingInfo.is_urgent === "1") {
                $('#ordering_is_urgent').trigger('click');
            }
        } else {
            toastr.error(response.message);
        }
    });
}

function deleteOrder(ordering_id){
    bootbox.confirm({
        message: "¿Seguro que quiere eliminar este pedido?",
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
                $.get( "http://localhost/tfg/constructalia/ordering/deleteOrdering/"+ ordering_id, function( response ) {
                    response=JSON.parse(response);
                    if(response.success) {
                        tableOrdering.ajax.reload();
                        toastr.error(response.message);
                    } else{
                        toastr.error(response.message);
                    }
                });
            }
        }
    });
}

function startOrder(ordering_id){
    $.post( "http://localhost/tfg/constructalia/ordering/startOrder/",{ ordering_id: ordering_id }, function( response ) {
        response=JSON.parse(response);
        if(response.success) {
            tableOrdering.ajax.reload();
            toastr.success(response.message);
        } else {
            toastr.error(response.message);
        }
    });
}

function finishOrder(ordering_id){
    $.post( "http://localhost/tfg/constructalia/ordering/finishOrder/",ordering_id, function( response ) {
        response=JSON.parse(response);
        if(response.success) {
            tableOrdering.ajax.reload();
            toastr.success(response.message);
        } else {
            toastr.error(response.message);
        }
    });
}