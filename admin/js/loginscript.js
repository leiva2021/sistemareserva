
$(document).ready(function () {
    sendeCredentials();
});

var sendeCredentials = () => {

    $("form").on("submit", function (e) {
        e.preventDefault();

        var datas = $(this).serialize();


        $.ajax({

            method: "POST",
            url: "./business/useraction.php",
            data: datas,
            success: function (info) {

                var json_info = JSON.parse(info);

                if (json_info.message === "error") {

                    showMessages("¡Los datos son incorrectos!");
                    clearFormRegister();

                } else if (json_info.message === "empty") {

                    showMessages("¡Campos vacios!");
                    clearFormRegister();
                }else if(json_info.message === "dataincorrect"){
                    showMessages("¡Los datos son incorrectos!");
                    clearFormRegister();
                }
                
            }
        });
    });
}

var showMessages = (message) => {

    Toastify({
        text: message,
        duration: 2000,
        className: "info",
        position: "center",
        style: {
            background: "linear-gradient(to right, #00b09b, #96c93d)",
        }
    }).showToast();
};

var clearFormRegister = () => {
    $("#username").val("");
    $("#password").val("");
};
