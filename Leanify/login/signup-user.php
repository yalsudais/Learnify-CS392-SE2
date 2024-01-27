<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Signup Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12  form w-100">
                <form  method="POST" id="formCreateAccount" autocomplete="off">
                    <h2 class="text-center">Signup Form</h2>
                    <p class="text-center">It's quick and easy.</p>
                    <div class="form-group">
                        <input class="form-control" type="text" name="name" placeholder="Full Name" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="email" name="email" id="email2" placeholder="Email Address" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" name="password" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" name="cpassword" placeholder="Confirm password" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="signup" value="Signup">
                    </div>
                    <div class="link login-link text-center">Already a member? <a href="index.php">Login here</a></div>
                </form>
                <div id="loading" style="display: none;">
                    <p class="text-center">Sending email, please wait...</p>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
     
            $("#formCreateAccount").submit(function (e) { 
                e.preventDefault();
                var email=$("#email2").val();
                // Check if the user has an active internet connection
                if (!navigator.onLine) {
                    alert("You are currently offline. Please check your internet connection and try again.");
                    return;
                }

                // Show the loading message
                $("#loading").show();

                $.ajax({
                    type: "POST",
                    url: "createAccount.php",
                    data: $("#formCreateAccount").serialize(),
              
                    success: function (response) {

                        // Handle the response from the server
                        window.location.href = "user-otp.php?email="+email;
                    },
                    complete: function () {
                        // Hide the loading message
                        $("#loading").hide();
                    }
                });
            });
        });
    </script>
</body>
</html>