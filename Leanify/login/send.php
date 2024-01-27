<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';

//Create an instance; passing `true` enables exceptions

    //Server settings
    function send_email($email,$typeMessage)
    {

   $password=
    $mail = new PHPMailer(true);
$message="";
    try {
      //Server settings
     // $mail->SMTPDebug = SMTP::DEBUG_CONNECTION;
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
      $mail->isSMTP();                                            //Send using SMTP
      $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
      $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
      $mail->Username   = 'universitysaudi690@gmail.com';                     //SMTP username
      $mail->Password   = 'zplpvatchrzhpkpd';                               //SMTP password
      $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
      $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
      $mail->CharSet='UTF-8';
      //Recipients
      $mail->setFrom('universitysaudi690@gmail.com', 'univiersity');
      $mail->addAddress($email);     //Add a recipient
                                    //Set email format to HTML
      // $mail->Body    = 'مرحبا بك طالبنا او طالبتنا نورة محمد سعيد يمكنك تسجيل دخولك على حسابك لدينا بالبيانات التاليه اسم المستخدم هو 401204999 وكلمة المرور هي  12345 ';
      // $mail->AltBody = 'مرحبا بك طالبنا او طالبتنا نورة محمد سعيد يمكنك تسجيل دخولك على حسابك لدينا بالبيانات التاليه اسم المستخدم هو 401204999 وكلمة المرور هي  12345 ';
     if($typeMessage==2)
     {

     
      $message = '
      <!DOCTYPE html>
      <html>
      <head>
          <meta charset="UTF-8">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <title>Password Reset Email</title>
      </head>
      <body>
          <table role="presentation" align="center" cellpadding="0" cellspacing="0" border="0" width="100%">
              <tr>
                  <td style="padding: 20px;">
                      <h1>Password Reset</h1>
                      <p>Click the button below to reset your password.</p>
                      <table role="presentation" align="center" cellpadding="0" cellspacing="0" border="0">
                          <tr>
                              <td>
                                  <a href="http://localhost:8080/ChatApp%20-%20CodingNepal/auth/new-password.php?email='.$email.'" style="background-color: #3498db; color: #ffffff; padding: 12px 24px; text-decoration: none; display: inline-block; border-radius: 5px;">Reset Password</a>
                              </td>
                          </tr>
                      </table>
                  </td>
              </tr>
          </table>
      </body>
      </html>
      ';
     }
 
     else{
        $subject = "Unauthorized Access Attempt";
                $message = "Dear user,<br><br>There have been multiple unauthorized access attempts to your account. Please review your account security settings and take necessary actions to protect your account.<br><br>Best regards,<br>Your Website Team";
     }
     $mail->Subject=$subject;
      $mail->Body=$message; 
        $mail->AltBody =$message;
      if(!$mail->Send()) {
         echo 'An error occurred sending the email address';
        //echo 'Mailer Error: ' . $mail->ErrorInfo;
      } else {
         echo 'Email address has been sent';
      }
  } catch (Exception $e) {
      echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  }

}

// if(isset($_POST["email"]))
// {
//   $email = $_POST['email'];
// $result = send_email($email);
// }
?>