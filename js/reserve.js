
$(document).ready(function () {
    saveReserve();
    console.log("listoReservas");
});

function openModal($room_number) {

    var roomnumber = $("#roomnumber").val($room_number);
    $("#ReserveForm").modal("show");
}

var saveReserve = () => {
    $("#formreserve").on("submit", function (e) {
        e.preventDefault();
        var datas = $(this).serialize();
        console.log(datas)
        console.log("llegoreservas")
        $.ajax({

            method: "POST",
            url: "../admin/business/reserveaction.php",
            data: datas,
            success: function (info) {
                var json_info = JSON.parse(info);

                if (json_info.message === "inserted") {
                    console.log("agregado")
                } else if (json_info.message === "error") {
                    console.log("error")
                }
                $("#ReserveForm").modal("hide");
            }
        });
    });
}