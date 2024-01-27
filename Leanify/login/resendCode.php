<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';
include "../php/config.php";


// Function to send email with verification code
function sendVerificationCode($email, $verificationCode)
{
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'universitysaudi690@gmail.com';                     //SMTP username
        $mail->Password   = 'zplpvatchrzhpkpd';                               //SMTP password
        $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
        $mail->Port       = 465;   
        // Recipients
        $mail->setFrom('universitysaudi690@gmail.com', 'learnify'); // Replace with your email and name
        $mail->addAddress($email); // Set the recipient email address

        // Email content
        $mail->isHTML(true);
        $mail->Subject = 'Verification Code';
        $mail->Body = 'Your verification code is: ' . $verificationCode;

        // Send the email
        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}

// Generate a new verification code
$newVerificationCode = mt_rand(100000, 999999);
$userEmail=$_POST["email"];
// Update the verification code in the database for the user
$updateSql = "UPDATE users SET verification_code = '$newVerificationCode' WHERE email = '$userEmail'";
$conn->query($updateSql);

// Send an email with the new verification code to the user's email address
sendVerificationCode($userEmail, $newVerificationCode);

// Display a success message or return a response to the AJAX request
echo "Verification code resent. Please check your email.";
?>