
$(document).ready(function () {
    loadComment();
    saveComment();
    console.log("listo");
});


var loadComment = function () {
    $.ajax({
        url: "../admin/business/commentlistaction.php",
        type: "GET",
        dataType: "json",
    }).done(function (data) {

        var datas = ``;
        $.each(data, function (i, item) {

            var letterStartName = item.nameuser.charAt(0);
            console.log(letterStartName);
            datas += ``;
            datas += `<small><em>Fecha del comentario:${item.sentdate}</em></small><br>`;
            datas += `<img class="circular-square" src="https://xx.bstatic.com/static/img/review/avatars/ava-${letterStartName.toLowerCase()}.png" alt="" role="presentation"></img> `;
            datas += `<strong>${item.nameuser}</strong>`;
            datas += `<p>"${item.message}"</p><hr>`;
            datas += ``;

        });
        $("#content").html(datas);
    });
}

function openModalComment(idUser) {
    var idUser = $("#userid").val(idUser);

    $("#ModalComment").modal("show");
}

var saveComment = () => {
    $("#frmcomment").on("submit", function (e) {
        e.preventDefault();
        var datas = $(this).serialize();
        console.log(datas)

        $.ajax({

            method: "POST",
            url: "../admin/business/commentaction.php",
            data: datas,
            success: function (info) {
                var json_info = JSON.parse(info);

                if (json_info.message === "inserted") {
                    console.log("agregado")
                } else if (json_info.message === "error") {
                    console.log("error")
                }
                $("#ModalComment").modal("hide");

            }
        });
    });
}


