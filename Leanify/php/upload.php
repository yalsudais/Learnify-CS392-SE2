<?php
include "config.php";
// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Prepare and execute the SQL query
    $upload_id = uniqid();
    $user_id = $_SESSION['user_id']; // Replace with your user ID retrieval logic
    $title = $_POST['title'];
    $content = $_POST['content'];
    $subject_id = $_POST['subject_id'];
    $course_id = $_POST['course_id'];
    $content_type = $_POST['content_type'];
    $upload_time = date('Y-m-d H:i:s');
    $is_approved = 0; // Set the initial approval status

    $query = "INSERT INTO `contentuploads` (`upload_id`, `user_id`, `title`, `content`, `subject_id`, `course_id`, `content_type`, `upload_time`, `is_approved`) 
              VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($query);
    $stmt->execute([$upload_id, $user_id, $title, $content, $subject_id, $course_id, $content_type, $upload_time, $is_approved]);

    // Get the last inserted ID
    $lastInsertId = $stmt->insert_id;

    // Handle file upload
    $upload_dir = "path/to/upload_directory/";
    $target_file = $upload_dir . basename($_FILES["file"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if file is a valid image
    if ($imageFileType != "pdf" && $imageFileType != "doc" && $imageFileType != "docx") {
        echo "Error: Only PDF, DOC, and DOCX files are allowed.";
        $uploadOk = 0;
    }

    // Move the uploaded file to the desired directory
    if ($uploadOk) {
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
            // Update the path in the database
            $updateQuery = "UPDATE `contentuploads` SET `path` = ? WHERE `upload_id` = ?";
            $updateStmt = $conn->prepare($updateQuery);
            $updateStmt->execute([$target_file, $lastInsertId]);

            echo "Success";
        } else {
            echo "Error: An error occurred while uploading the file.";
        }
    }

    // Close the prepared statement
    $stmt->close();

    // Close the database connection
    $conn->close();
} else {
    echo "Error: Invalid request";
}