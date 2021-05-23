// let tableOrdering;
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
                        span = '<span class="badge bg-warning text-dark">Pendiente</span>'
                    } else {
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

function viewOrder(){

}

function editOrder(){

}

function deleteOrder(){

}