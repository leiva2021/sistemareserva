
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

        console.log("Res: "+data);

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

        $.ajax({

            method: "POST",
            url: "../admin/business/commentaction.php",
            data: datas,
            success: function (info) {
                var json_info = JSON.parse(info);

                if (json_info.message === "inserted") {
                    console.log("agregado")
                    
                    Toastify({
                        text: "Comentario enviado!!",
                        duration: 1950,
                        className: "info",
                        position: "center",
                        style: {
                            background: "linear-gradient(to right, #00b09b, #96c93d)",
                        }
                    }).showToast();

                    loadComment();

                } else if (json_info.message === "error") {
                    console.log("error")
                }
                $("#ModalComment").modal("hide");
            }
        });
    });
}


