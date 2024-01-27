<?php
session_start();
include "config.php";
// Check if the request contains the quiz data
$quizData = json_decode(file_get_contents('php://input'), true);
// print_r($quizData);
if (!empty($quizData)) {
    // Retrieve the quiz data
    $title = $quizData['title'];
    $description ="";
    $questions = $quizData['questions'];
$user_id=$_SESSION["user_id"];
    // Assuming you have established the connection to the database
    if (isset($conn)) {
        // Add data to the quizzes table
        $sql = "INSERT INTO quizzes (user_id, title, description) VALUES ('$user_id', '$title', '$description')";
        $conn->query($sql);

        // Get the quiz_id of the inserted quiz 
        $quiz_id = $conn->insert_id;

        // Add data to the quizquestions table
        foreach ($questions as $question) {
            $question_text = $question['question_text'];

            $sql = "INSERT INTO quizquestions (quiz_id, question_text) VALUES ('$quiz_id', '$question_text')";
            $conn->query($sql);

            // Get the question_id of the inserted question
            $question_id = $conn->insert_id;

            // Add data to the quizchoices table
            foreach ($question['choices'] as $choice) {
                $choice_text = $choice['choice_text'];
                $is_correct = $choice['is_correct'];

                $sql = "INSERT INTO quizchoices (question_id, choice_text, is_correct) VALUES ('$question_id', '$choice_text', '$is_correct')";
                $conn->query($sql);
            }
        }

        // Respond with a success message or redirect to a success page
        echo "Quiz added successfully!";
    } else {
        echo "Database connection not available.";
    }
} else {
    echo "No quiz data received.";
}