<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Code Verification</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form">
                <?php include "../php/message.php";?>
                <form method="POST" id="verificationCode" autocomplete="off">
                    <h2 class="text-center">Code Verification</h2>
                    <div class="form-group">
                        <input class="form-control" type="number" name="otp" placeholder="Enter verification code" id="inputverification">
                    </div>
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="check" value="Submit">
                    </div>
                    <div class="form-group">
                        <button class="form-control button" type="button" name="resend" onclick="resendCode()">Resend Code</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        $("#verificationCode").submit(function(e) {
            e.preventDefault();
        
            if (validateForm('verificationCode')) {
                var verificationCode = $("#inputverification").val();
                $.ajax({
                    type: "post",
                    url: "vierictionCode.php",
                    data: {
                        verificationCode: verificationCode
                    },
                   
                    success: function(response) {
if(response==1)
{
    alert_toast("Verification successful. Your account has been activated.","success");
}else{
    alert_toast("Invalid verification code. Please try again.","error");
}
}             
                });
                
            }

        });
      
  

    });
    function resendCode() {
        var email = "<?php echo isset($_GET['email']) ? $_GET['email'] : ''; ?>";

    $.ajax({
        type: "POST",
        url: "resendCode.php",
        data:{email:email},
   
        success: function(response) {
            alert(response);
            // Handle the response from the resendCode.php script
            // Display success message or show an error notification
       
        },
        error: function() {
            // Display error notification
            alert("An error occurred. Please try again later.");
        }
    });
}
</script>

<script src="../js/toast.js"></script>
<script src="../js/validateInput.js"></script>