
$(document).ready(function () {
    listar();
    cargarSelect();
    guardar();
    eliminar();
    cancelarEliminar();
});

function abrirModal(json) {
    $("#FormModal").modal("show");
}

var guardar = function () {
    $("form").on("submit", function (e) {

        e.preventDefault();

        var datos = new FormData($("#frmhabitacion")[0]);
        console.log(datos);

        //var file_data = $('#image')[0].files;
        /*var frm = $(this).serialize()+"&image="+file_data[0].name;*/

        $.ajax({

            type: "POST",
            url: "./../../business/roomaction.php",
            data: datos,
            contentType: false,
            processData: false,

            success: function (info) {
                var json_info = JSON.parse(info);

                console.log(json_info);

                if (json_info.message === "inserted") {
                    console.log("agregado")
                } else if (json_info.message === "updated") {
                    console.log("actualizado")
                }
                $("#FormModal").modal("hide");
                limpiar_form();
                listar();
            }

        });
    });
}

var eliminar = function () {

    $("#delete-room").on("click", function () {
        var room_number = $("#frmDelete #roomnumber").val(),
            opc = $("#frmDelete #opc").val();
        $.ajax({
            method: "POST",
            url: "./../../business/roomaction.php",
            data: {
                "room_number": room_number,
                "opc": opc
            }

        }).done(function (info) {
            var json_info = JSON.parse(info);
            console.log(json_info);
            limpiar_form();
            listar();
        });

    });
}

var cancelarEliminar = function () {
    $("#cancel-register").on("click", function () {
        limpiar_form();
    });
}

var cargarSelect = function () {
    $.ajax({
        url: "./../../business/extralistaction.php",
        type: "GET",
        dataType: "json",
    }).done(function (data) {

        //console.log(data);
        var select = $("#extras").select();
        $.each(data, function (i, item) {

            select.append($("<option></option>")
                .attr('value', item.extras)
                .text(item.descriptions));
        });

    });
}

var limpiar_form = function () {
    $("#opc").val("insert");
    $("#roomnumber").val("");
    $("#image").val("");
    $("#description").val("");
    $("#price").val("");
    $("#amountpeople").val("");
    $("#roomavailable").val("");
    $("#extras").val("1");
    $("#currentimg").val("");

}

var table = $('#mytable').DataTable();
var listar = function () {

    $("#mytable").empty();
    table = $("#mytable").DataTable({
        "destroy": true,
        "ajax": {
            url: "./../../business/roomlistaction.php",
            type: "GET",
            dataType: "json"
        },
        "columns": [{
            "data": "ROOMNUMBER", "render": function (data) {
                return '<center>' + data + '</center>';
            }
        },
        {
            "data": "IMAGE", "render": function (data, type, row) {
                return '<center><img src="../../images/' + data + '" width="120" height="80"/></center>'
            }
        },
        {
            "data": "DESCRIPTIONS"
        },
        {
            "data": "PRICE","render": function(data){
                return '<center>'+data+'</center>';
            }
        },
        {
            "data": "AMOUNTPEOPLE","render": function(data){
                return '<center>'+data+'</center>';
            }
        },
        {
            "data": "ROOMAVAILABLE", "render": function(data){
                return '<center>'+data+'</center>';
            }
        },
        {
            "data": "IDEXTRA"
        },
        {
            "defaultContent": "<center><button class='btn btn-warning btn-sm btn-editar'><i class='fa fa fa-edit'></i></button>" +
                "&nbsp<button class='boton-eliminar btn btn-danger btn-sm ms-2' data-toggle='modal' data-target='#myModal'><i class='fa fa fa-trash'></i></button></center>",
        }
        ],
        "language": {
            "url": "https://cdn.datatables.net/plug-ins/1.12.1/i18n/es-ES.json"
        }
    });
    obtener_data_editar("#mytable tbody", table);
    obtener_id_eliminar("#mytable tbody", table);
}

var obtener_data_editar = function (tbody, table) {

    $(tbody).on("click", "button.btn-editar", function (e) {

        e.preventDefault();
        var data = table.row($(this).parents("tr")).data();
        var roomnumber = $("#roomnumber").val(data.ROOMNUMBER);
        //var image = $("#img").val(data.IMAGE);
        //var image = $("#img").attr("src","../../images/"+data.IMAGE);
        var currentimg = $("#currentimg").val(data.IMAGE);
        var description = $("#description").val(data.DESCRIPTIONS);
        var price = $("#price").val(data.PRICE);
        var amountpeople = $("#amountpeople").val(data.AMOUNTPEOPLE);
        var roomavailable = $("#roomavailable").val(data.ROOMAVAILABLE);
        var extras = $("#extras").val(data.IDEXTRA);
        var opc = $("#opc").val("edit");

        console.log(data)

        $("#FormModal").modal("show");
    });
}

var obtener_id_eliminar = function (tbody, table) {
    $(tbody).on("click", "button.boton-eliminar", function () {

        var data = table.row($(this).parents("tr")).data();
        var room_number = $("#frmDelete #roomnumber").val(data.ROOMNUMBER);
        console.log(data.ROOMNUMBER);

    });
}