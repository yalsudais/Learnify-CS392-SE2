$(document).ready(function () {
    $("#login_form").submit(function (e) {
        e.preventDefault();
        if (validateForm('login_form')) {
            var email = $("#email").val();
            var password = $("#password").val();
            $.ajax({
                type: "POST",
                url: "validate.php",
                data: { password: password, email: email },
                dataType:"json",
                success: function (response) {
                 
                    if (response.url == "error") {
                        alert_toast("The password or username is incorrect", "warning");
                    } else {
                        document.location.href = response.url;
                    }
                }
            });
        }
    });
});