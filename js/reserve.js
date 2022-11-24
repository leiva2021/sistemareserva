
$(document).ready(function () {
    saveReserve();
    clearModal();
});
//room_number,reserve_quantity,identification,nombre
function openModal(myinfo) {

    console.log(myinfo);
    var temp = myinfo.split("-");

    var roomnumber = $("#roomNumber").val(temp[0]); //! se carga el numero de habitacion a reservar
    var reserveQuantity = $("#reserveQuantity").prop('max', temp[1]); //! Se pasa la cantidad de habitaciones disponibles
    var ID = $("#identification").val(temp[2]);
    var name = $("#nameClient").val(temp[3]);
    var lastname = $("#lastnameClient").val(temp[4]);

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

                var json_info = JSON.parse(info);
                console.log(info);
                if (json_info.message === "inserted") {
                    console.log("agregado");
                    swal("¡Bien!", "¡Reservado exitosamente!", "success");
                } else if (json_info.message === "error") {

                    console.log("error");
                    swal("¡Bien!", "¡Error al reservar!", "success");

                    clearForm();
                }
                $("#ReserveForm").modal("hide");
            }
        });
    });
}

var clearForm = function () {

    $("#opc").val("insert");
    $("#reserveDateStart").val(""),
    $("#reserveDateEnd").val(""),
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
