
$(document).ready(function () {
    list();
    save();
    deleteExtra();
    cancelEdit();
});

function openModal() {
    $("#FormModalExtra").modal("show");
}

var save = function () {
    $("form").on("submit", function (e) {

        e.preventDefault();
        var frm = $(this).serialize();
        $.ajax({

            method: "POST",
            url: "./../../business/extraaction.php",
            data: frm,
            success: function (info) {
                var json_info = JSON.parse(info);

                if (json_info.message === "inserted") {
                    console.log("agregado")
                } else if (json_info.message === "updated") {
                    console.log("actualizado")
                }
                $("#FormModalExtra").modal("hide");
                clearForm();
                list();
            }
        });
    });
}

var deleteExtra = function () {

    $("#delete-extra").on("click", function () {

        var idextra = $("#frmDelete #idextra").val(),
            opc = $("#frmDelete #opc").val();

        $.ajax({
            method: "POST",
            url: "./../../business/extraaction.php",
            data: {
                "idextra": idextra,
                "opc": opc
            }

        }).done(function (info) {
            var json_info = JSON.parse(info);
            console.log(json_info);
            list();
        });

    });
}

var clearForm = function () {
    $("#opc").val("insert");
    $("#idextra").val("0");
    $("#description").val("");
}

var cancelEdit = function () {
    $("#cancel-register").on("click", function () {
        clearForm();
    });
}

var extra_table = $('#extraTable').DataTable();
var list = function () {

    $("#extraTable").empty();
    extra_table = $("#extraTable").DataTable({

        "destroy": true,
        "ajax": {
            url: "./../../business/extraslistaction.php",
            type: "GET",
            dataType: "json"
        },
        "columns": [{
            "data": "IDEXTRA","render": function(data){
                return '<center>'+data+'</center>';
            }
        },
        {
            "data": "DESCRIPTIONS","render": function(data){
                return '<center>'+data+'</center>';
            }
        },

        {
            "defaultContent": "<center><button class='btn btn-warning btn-sm btn-edit'><i class='fa fa fa-edit'></i></button>" +
                "&nbsp<button class='button-delete btn btn-danger btn-sm ms-2' data-toggle='modal' data-target='#myModal'><i class='fa fa fa-trash'></i></button></center>",
        }
        ],
        "language": {
            "url": "https://cdn.datatables.net/plug-ins/1.12.1/i18n/es-ES.json"
        }

    });
    get_data_edit("#extraTable tbody", extra_table);
    get_id_delete("#extraTable tbody", extra_table);
}

var get_data_edit = function (tbody, table) {
    $(tbody).on("click", "button.btn-edit", function (e) {

        var data = table.row($(this).parents("tr")).data();
        var idextra = $("#idextra").val(data.IDEXTRA);
        var description = $("#description").val(data.DESCRIPTIONS);
        var opc = $("#opc").val("edit");

        $("#FormModalExtra").modal("show");

    });
}

var get_id_delete = function (tbody, table) {
    $(tbody).on("click", "button.button-delete", function () {
        var data = table.row($(this).parents("tr")).data();
        var room_number = $("#frmDelete #idextra").val(data.IDEXTRA);
    });
}