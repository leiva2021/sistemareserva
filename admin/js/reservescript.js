
$(document).ready(function () {
    listar();
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

        var datos = new FormData($("#formreserve")[0]);
        console.log(datos);

        //var file_data = $('#image')[0].files;
        /*var frm = $(this).serialize()+"&image="+file_data[0].name;*/

        $.ajax({

            type: "POST",
            url: "./../../business/reserveaction.php",
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

    $("#delete-reserve").on("click", function () {
        var reserve_number = $("#formDelete #reservenumber").val(),
            opc = $("#formDelete #opc").val();
        $.ajax({
            method: "POST",
            url: "./../../business/reserveaction.php",
            data: {
                "reserve_number": reserve_number,
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


var limpiar_form = function () {
    $("#opc").val("insert");
    $("#ReserveDateStart").val("");
    $("#ReserveDateEnd").val("");
    $("#Identification").val("");
    $("#NameClient").val("");
    $("#ReserveQuantity").val("");
    $("#LastnameClient").val("");

}

var table = $('#mytable').DataTable();
var listar = function () {

    $("#mytable").empty();
    table = $("#mytable").DataTable({
        "destroy": true,
        "ajax": {
            url: "./../../business/reservelistaction.php",
            type: "GET",
            dataType: "json"
        },
        "columns": [
        {
            "data": "ROOMNUMBER", "render": function (data) {
                return '<center>' + data + '</center>';
            }
        },
        {
            "data": "RESERVEDATESTART","render": function(data){
                return '<center>'+data+'</center>';
            }
        },
        {
            "data": "RESERVEDATEEND","render": function(data){
                return '<center>'+data+'</center>';
            }
        },
        {
            "data": "IDENTIFICATION","render": function(data){
                return '<center>'+data+'</center>';
            }
        },
        {
            "data": "NAMECLIENT", "render": function(data){
                return '<center>'+data+'</center>';
            }
        },
        {
            "data": "LASTNAMECLIENT","render": function(data){
                return '<center>'+data+'</center>';
            }
        },
        {
            "data": "RESERVEQUANTITY","render": function(data){
                return '<center>'+data+'</center>';
            }
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
        var reservenumber = $("#reservenumber").val(data.RESERVENUMBER);
        var roomnumber = $("#roomnumber").val(data.ROOMNUMBER);
        var reserveDateStart = $("#reserveDateStart").val(data.RESERVEDATESTART);
        var reserveDateEnd = $("#reserveDateEnd").val(data.RESERVEDATEEND);
        var nameClient = $("#nameClient").val(data.NAMECLIENT);
        var lastnameClient = $("#lastnameClient").val(data.LASTNAMECLIENT);
        var reserveQuantity = $("#reserveQuantity").val(data.RESERVEQUANTITY);
        var opc = $("#opc").val("edit");

        console.log(data)

        $("#FormModal").modal("show");
    });
}

var obtener_id_eliminar = function (tbody, table) {
    $(tbody).on("click", "button.boton-eliminar", function () {

        var data = table.row($(this).parents("tr")).data();
        var reserve_number = $("#formDelete #reservenumber").val(data.ROOMNUMBER);
        console.log(data.ROOMNUMBER);

    });
}