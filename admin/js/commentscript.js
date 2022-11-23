
$(document).ready(function () {
    list();
    //save();
    deleteExtra();
    // cancelEdit();
});

/*function openModal() {
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
}*/

var deleteExtra = function () {

    $("#delete-extra").on("click", function () {

        var idcomment = $("#frmDelete #idcomment").val(),
            opc = $("#frmDelete #opc").val();

        console.log(idcomment);

        $.ajax({
            method: "POST",
            url: "./../../business/commentaction.php",
            data: {
                "idcomment": idcomment,
                "opc": opc
            }

        }).done(function (info) {
            var json_info = JSON.parse(info);

            if (json_info.message === "deleted") {
                list();
                swal("¡Bien!", "¡Eliminado exitosamente!", "success");
            } else if (json_info.message === "error") {
                swal("¡Ups!", "¡Eliminado exitosamente!", "error");
            }
        });

    });
}

/*var clearForm = function () {
    $("#opc").val("insert");
    $("#idextra").val("0");
    $("#description").val("");
}

var cancelEdit = function () {
    $("#cancel-register").on("click", function () {
        clearForm();
    });
}*/

var comment_table = $('#commentTable').DataTable();
var list = function () {

    $("#commentTable").empty();
    comment_table = $("#commentTable").DataTable({

        "destroy": true,
        "ajax": {
            url: "./../../business/commentslistaction.php",
            type: "GET",
            dataType: "json"
        },
        "columns": [{
            "data": "IDCOMMENT"
        },
        {
            "data": "NAMEUSER"
        },

        {
            "data": "SENTDATE"
        },
        {
            "data": "MESSAGE"
        },

        {
            "defaultContent": "<center>" +
                "<button class='button-delete btn btn-danger btn-sm ms-2' data-toggle='modal' data-target='#myModal'><i class='fa fa fa-trash'></i></button></center>",
        }
        ],
        "language": {
            "url": "https://cdn.datatables.net/plug-ins/1.12.1/i18n/es-ES.json"
        }

    });
    // get_data_edit("#extraTable tbody", table);
    get_id_delete("#commentTable tbody", comment_table);
}


var get_id_delete = function (tbody, table) {
    $(tbody).on("click", "button.button-delete", function () {
        var data = table.row($(this).parents("tr")).data();

        var idcomment = $("#frmDelete #idcomment").val(data.IDCOMMENT);
        console.log(idcomment);
    });
}