<?php session_start();
 include "config.php";
if(isset($_POST["function_name"]))
{
    $fun = $_POST["function_name"];
    unset($_POST["function_name"]);

 $param = $_POST;
    try {
        $result = call_user_func_array($fun, $param);
        echo $result;
    }
    catch (Exception $e)
    {
        echo "Error: " . $e->getMessage();
    }
}

// function select_data()
// {
//     global  $conn;
//     $query = $conn->query("SELECT quizzes.`quiz_id`, quizzes.`user_id`, quizzes.`title`, quizzes.`description` FROM `quizzes` ");
    
//     $data = $query->fetch_all(MYSQLI_ASSOC);
    
//     echo json_encode($data);
    
  

// }


// Assuming you have a database conn established

function select_data() {
    global $conn;
    $quizzes = array();

    // Retrieve quiz details
    $quizQuery = "SELECT quiz_id, user_id, title, description FROM quizzes";
    $quizResult = mysqli_query($conn, $quizQuery);

    while ($quizRow = mysqli_fetch_assoc($quizResult)) {
        $quiz = array(
            'quiz_id' => $quizRow['quiz_id'],
            'user_id' => $quizRow['user_id'],
            'title' => $quizRow['title'],
            'description' => $quizRow['description'],
            'questions' => array()
        );

        // Retrieve questions for the current quiz
        $questionQuery = "SELECT * FROM quizquestions WHERE quiz_id = " . $quizRow['quiz_id'];
        $questionResult = mysqli_query($conn, $questionQuery);

        while ($questionRow = mysqli_fetch_assoc($questionResult)) {
            $question = array(
                'question_text' => $questionRow['question_text'],
                'choices' => array()
            );

            // Retrieve choices for the current question
            $choiceQuery = "SELECT * FROM quizchoices WHERE question_id = " . $questionRow['question_id'];
            $choiceResult = mysqli_query($conn, $choiceQuery);

            while ($choiceRow = mysqli_fetch_assoc($choiceResult)) {
                $choice = array(
                    'choice_text' => $choiceRow['choice_text']
                );

                $question['choices'][] = $choice;
            }

            $quiz['questions'][] = $question;
        }

        $quizzes[] = $quiz;
    }

echo json_encode($quizzes);
}



function delete_quizzes($quiz_id)
{
    global  $conn;
    $query = "delete FROM quizzes where quizzes.`quiz_id`=$quiz_id";
  if($conn->query($query))
  {
                    return "1";
                }
  else
  {
    throw new Exception("Error: ". $conn->error);
  }

}
function update_quizzes($quiz_id, $title, $description)
{
  global $conn;
  $user_id=$_SESSION["user_id"];
  $query = "UPDATE `quizzes` SET quizzes.`quiz_id`='$quiz_id', quizzes.`user_id`='$user_id', quizzes.`title`='$title', quizzes.`description`='$description' WHERE `quiz_id`='$quiz_id'";
  echo $query;
  if($conn->query($query))
  {
                    return "1";
                }
  else
  {
    throw new Exception("Error: ". $conn->error);
  }
}