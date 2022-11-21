
$(document).ready(function () {
    createAccount();
});

var createAccount = () => {

    $("form").on("submit", function (e) {
        e.preventDefault();

        var datas = $(this).serialize();
        console.log(datas);

        $.ajax({

            method: "POST",
            url: "./../../business/useraction.php",
            data: datas,
            success: function (info) {

                var json_info = JSON.parse(info);

                if (json_info.message === "inserted") {

                    showMessages("¡Cuenta creada exitosamente!");
                    clearFormRegister();

                } else if (json_info.message === "error") {

                    showMessages("¡Error al crear la cuenta!");
                    clearFormRegister();

                } else if (json_info.message === "pwerror") {

                    showMessages("¡Las contraseñas no son iguales!");
                    clearFormRegister();
                }
            }
        });

    });
};

var showMessages = (message) => {

    Toastify({
        text: message,
        duration: 1950,
        className: "info",
        position: "center",
        style: {
            background: "linear-gradient(to right, #00b09b, #96c93d)",
        }
    }).showToast();
};

var clearFormRegister = () => {

    $("#identification").val("");
    $("#nameuser").val("");
    $("#lastname").val("");
    $("#username").val("");
    $("#password").val("");
    $("#cpassword").val("");
};