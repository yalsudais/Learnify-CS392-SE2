<?php session_start();
 include "../php/config.php";
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
function add_discussionposts( $subject, $question)
{
    global $conn;
    $user_id= $_SESSION["user_id"];
    // Prepare the SQL statement
    $sql = "INSERT INTO `discussionposts` ( `user_id`, `post_title`, `post_text`) VALUES ('$user_id', '$subject', '$question')";
    
    // Execute the SQL statement
    if ($conn->query($sql) === TRUE)
    {
        return "1";
    }
    else
    {
        throw new Exception("Error: " . $conn->error);
    }
    
    // Close the database connection
    $conn->close();
}

function add_discussionposts2($question , $post_id_f)
{
   $user_id= $_SESSION["user_id"];
    global $conn;
    
    // Prepare the SQL statement
    $sql = "INSERT INTO `discussionposts` (`user_id`,  `post_text`, `post_id_f`) VALUES ( '$user_id', '$question ', '$post_id_f')";
    
    // Execute the SQL statement
    if ($conn->query($sql) === TRUE)
    {
        return "1";
    }
    else
    {
        throw new Exception("Error: " . $conn->error);
    }
    
    // Close the database connection
    $conn->close();
}

function select_data()
{
    global  $conn;
    $query = $conn->query("SELECT discussionposts.`post_id`, discussionposts.`user_id`, discussionposts.`post_title`, discussionposts.`post_text`, discussionposts.`post_id_f`, discussionposts.`like`,`dislike`, discussionposts.`post_time` FROM `discussionposts` WHERE post_id_f = 0");
    
    $data = $query->fetch_all(MYSQLI_ASSOC);
    
    echo json_encode($data);
    
  

}
function select_data2($post_id)
{
    $user_id = isset($_SESSION["user_id"]) ? $_SESSION["user_id"] : null;
    global  $conn;
    $query = $conn->query("SELECT 
    t.post_id,
    p.post_title,
    p.post_text,
    u.username,
    SUM(CASE WHEN t.`like` = 1 THEN 1 ELSE 0 END) AS total_likes,
    SUM(CASE WHEN t.`dislike` = 1 THEN 1 ELSE 0 END) AS total_dislikes,
    MAX(CASE WHEN t.user_id = '$user_id' THEN t.`like` ELSE 0 END) AS user_like,
    MAX(CASE WHEN t.user_id = '$user_id' THEN t.`dislike` ELSE 0 END) AS user_dislike
FROM 
    tablelikeanddislike t
RIGHT JOIN 
    discussionposts p ON t.post_id = p.post_id
JOIN 
    users u ON u.user_id = p.user_id
WHERE 
    p.post_id_f = '$post_id' 
GROUP BY 
    t.post_id, p.post_title, p.post_text
ORDER BY 
    p.post_time ASC;");
    
    $data = $query->fetch_all(MYSQLI_ASSOC);
    
    echo json_encode($data);
    
  

}
function delete_discussionposts($post_id)
{
    global  $conn;
    $query = "delete FROM discussionposts where discussionposts.`post_id`=$post_id";
  if($conn->query($query))
  {
                    return "1";
                }
  else
  {
    throw new Exception("Error: ". $conn->error);
  }

}
function update_discussionposts($post_id, $user_id, $post_title, $post_text, $post_id_f, $post_time)
{
  global $conn;
  $query = "UPDATE `discussionposts` SET discussionposts.`post_id`='$post_id', discussionposts.`user_id`='$user_id', discussionposts.`post_title`='$post_title', discussionposts.`post_text`='$post_text', discussionposts.`post_id_f`='$post_id_f', discussionposts.`post_time`='$post_time' WHERE `post_id`='$post_id'";
  
  if($conn->query($query))
  {
                    return "1";
                }
  else
  {
    throw new Exception("Error: ". $conn->error);
  }
}

function addOrUpdateLikeDislike($user_id, $post_id, $like, $dislike) {
    // Connect to the database
    global $conn;
    // Check if the record with the given user_id and post_id already exists
    $query = "SELECT COUNT(*) as count FROM tablelikeanddislike WHERE user_id = '$user_id' AND post_id = '$post_id'";
    $result = $conn->query($query);
    $row = $result->fetch_assoc();
    $recordCount = $row['count'];

    if ($recordCount > 0) {
        // Record already exists, perform an update
        $query = "UPDATE tablelikeanddislike SET `like` = '$like', `dislike` = '$dislike' WHERE user_id = '$user_id' AND post_id = '$post_id'";
        if ($conn->query($query) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $conn->error;
        }
    } else {
        // Record does not exist, perform an insert
        $query = "INSERT INTO tablelikeanddislike (user_id, post_id, `like`, `dislike`) VALUES ('$user_id', '$post_id', '$like', '$dislike')";
        if ($conn->query($query) === TRUE) {
            echo "Record added successfully";
        } else {
            echo "Error adding record: " . $conn->error;
        }
    }

    // Close the database connection
    $conn->close();
}

?>