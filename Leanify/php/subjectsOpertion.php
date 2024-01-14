<?php include "config.php";
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
function add_subjects($subject_id, $subject_name, $image_banner="")
{
    global $conn;
    
    $tmp_file=$_FILES['image_banner']['tmp_name'];
    $file_error=$_FILES['image_banner']['error'];
    if($file_error==UPLOAD_ERR_OK)
    {
        $file_dir="../upload_image/";
        $file_extension=pathinfo($_FILES['image_banner']['name'],PATHINFO_EXTENSION);
        $file_name = uniqid() . '.' . $file_extension;
        if(move_uploaded_file($tmp_file,$file_dir.$file_name))
        {
            $sql = "INSERT INTO `subjects` (`subject_id`, `subject_name`, `image_banner`) VALUES (null, '$subject_name', '$file_name')";
            if ($conn->query($sql) === TRUE)
            {
                return "1";
            }
            else
            {
                throw new Exception("Error: " . $conn->error);
            }
        }
    }
    else{
        $sql = "INSERT INTO `subjects` (`subject_id`, `subject_name`) VALUES ('$subject_id', '$subject_name')";
        if ($conn->query($sql) === TRUE)
        {
            return "1";
        }
        else
        {
            throw new Exception("Error: " . $conn->error);
        }
    }
    // Prepare the SQL statement
 
    // Execute the SQL statement
  
    
    // Close the database connection
    $conn->close();
}
function select_data()
{
    global  $conn;
    $query = $conn->query("SELECT subjects.`subject_id`, subjects.`subject_name`, subjects.`image_banner` FROM `subjects` ");
    
    $data = $query->fetch_all(MYSQLI_ASSOC);
    
    echo json_encode($data);
    
  

}
function delete_subjects($subject_id)
{
    global  $conn;
    $query = "delete FROM subjects where subjects.`subject_id`=$subject_id";
  if($conn->query($query))
  {
                    return "1";
                }
  else
  {
    throw new Exception("Error: ". $conn->error);
  }

}
function update_subjects($subject_id, $subject_name, $image_banner = "")
{
    global $conn;

    if (!empty($_FILES['image_banner']['name'])) {
        $tmp_file = $_FILES['image_banner']['tmp_name'];
        $file_error = $_FILES['image_banner']['error'];

        if ($file_error === UPLOAD_ERR_OK) {
            $file_dir = "../upload_image/";
            $file_extension = pathinfo($_FILES['image_banner']['name'], PATHINFO_EXTENSION);
            $file_name = uniqid() . '.' . $file_extension;

            if (move_uploaded_file($tmp_file, $file_dir . $file_name)) {
                $query = "UPDATE `subjects` SET `subject_id`='$subject_id', `subject_name`='$subject_name', `image_banner`='$file_name' WHERE `subject_id`='$subject_id'";

                if ($conn->query($query)) {
                    return "1";
                } else {
                    throw new Exception("Error: " . $conn->error);
                }
            }
        } else {
            throw new Exception("Error uploading image: " . $file_error);
        }
    } else {
        $query = "UPDATE `subjects` SET `subject_id`='$subject_id', `subject_name`='$subject_name' WHERE `subject_id`='$subject_id'";

        if ($conn->query($query)) {
            return "1";
        } else {
            throw new Exception("Error: " . $conn->error);
        }
    }
}