<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';
include "../php/config.php";

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    // Check if passwords match
    if ($password !== $cpassword) {
        echo "Password and confirm password do not match.";
        exit();
    }

    // Check if the email is already registered
    $sql = $conn->prepare("SELECT * FROM users WHERE email=?");
    $sql->bind_param("s", $email);
    $sql->execute();
    $result = $sql->get_result();
    $sql->close();

    if ($result->num_rows > 0) {
        echo "Email is already registered.";
        exit();
    }

    // Generate a random verification code
    $verificationCode = mt_rand(100000, 999999);

    // Insert the new user into the database
    $sql = $conn->prepare("INSERT INTO users (username, email, password, verification_code) VALUES (?, ?, ?, ?)");
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $sql->bind_param("sssi", $name, $email, $hashedPassword, $verificationCode);
    $sql->execute();
    $sql->close();

    // Send verification code to the user's email
    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'universitysaudi690@gmail.com';
    $mail->Password = 'zplpvatchrzhpkpd';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
    $mail->CharSet = 'UTF-8';
    $mail->setFrom('universitysaudi690@gmail.com', 'University');
    $mail->addAddress($email);
    $mail->Subject = 'Registration Confirmation';
    $mail->isHTML(true);
    $mail->Body = 'Dear ' . $name . ',<br><br>Thank you for registering on our website. Your account has been successfully created.<br><br>Your verification code is: ' . $verificationCode . '<br><br>Best regards,<br>Your Website Team';

    if ($mail->send()) {
     
    die("user-otp.php?email=".$email);
    } else {
        echo "Registration successful. Failed to send confirmation email. Error: " . $mail->ErrorInfo;
    }

?>