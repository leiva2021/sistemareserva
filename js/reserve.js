
$(document).ready(function () {
    saveReserve();
    clearModal();
});

function openModal(room_number, reserve_quantity) {

    var roomnumber = $("#roomNumber").val(room_number); //! se carga el numero de habitacion a reservar
    var reserveQuantity = $("#reserveQuantity").prop('max', reserve_quantity); //! Se pasa la cantidad de habitaciones disponibles

    $("#ReserveForm").modal("show");
}

var saveReserve = function () {
    $("#frmreserve").on("submit", function (e) {
        e.preventDefault();
        var frmdata = $(this).serialize();
        console.log(frmdata)

        $.ajax({

            method: "POST",
            url: "../admin/business/reserveaction.php",
            data: frmdata,
            success: function (info) {

                console.log(info);
                /*var json_info = JSON.parse(info);
                console.log(info);
                if (json_info.message === "inserted") {
                    console.log("agregado")
                } else if (json_info.message === "error") {
                    console.log("error")
                }*/
                $("#ReserveForm").modal("hide");
            }
        });
    });
}

var clearForm = function () {

    $("#opc").val("insert");
    $("#roomNumber").val("");
    $("#didentification").val("");
    $("#nameClient").val("");
    $("#lastnameClient").val("");
    $("#reserveQuantity").val("");
}

clearModal = function () {

    $("#button-cancel").on("click", function () {
        console.log("Limpiando...")
        clearForm();
    });
}
