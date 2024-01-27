<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="../js/jquery-3.4.1.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="row m-1 p-1">
            <div class="clo-lg-12 col-md-12 form login-form w-100">
                <?php include "../php/message.php";?>
                <form id="login_form" method="POST" autocomplete="">
                    <h2 class="text-center">Login Form</h2>
                    <p class="text-center">Login with your email and password.</p>

                    <div class="form-group">
                        <input class="form-control" type="email" name="email" placeholder="Email Address" id="email" data-validation="required|email" value="">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" name="password" placeholder="Password" id="password" data-validation="required">
                    </div>
                    <div class="link forget-pass text-left"><a href="auth/forgot-password.php">Forgot password?</a></div>
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="login" value="Login">
                        </form>
                    </div>
                    <div class="link login-link text-center">Not yet a member? <a href="signup-user.php">Signup now</a></div>
                </form>
            </div>
        </div>
    </div>

    <script src="../js/login.js"></script>
    <script src="../js/toast.js"></script>
    <script src="../js/validateInput.js"></script>
</body>
</html>