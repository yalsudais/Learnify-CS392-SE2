<?php
include "../php/config.php";
// Retrieve the verification code entered by the user
$verificationCode = $_POST['verificationCode'];

// Query the database to check if the verification code matches
$sql = "SELECT * FROM users WHERE verification_code = '$verificationCode'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Code matches, activate the user
    $row = $result->fetch_assoc();
    $email = $row['email'];

    // Update the user's status to activated
    $updateSql = "UPDATE users SET status = 'activated' WHERE email = '$email'";
    $conn->query($updateSql);

    // Display success message or redirect to a success page
    echo 1;
} else {
    // Code does not match, display error message or redirect to an error page
    echo 2;
}

// Close the database connection
$conn->close();
?>