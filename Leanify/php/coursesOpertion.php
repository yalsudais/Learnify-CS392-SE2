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
function add_courses($course_id, $course_code, $course_name, $course_description, $course_price, $subject_id)
{
    global $conn;

    // Retrieve the file information
    $file_tmp = $_FILES['course_banner_image']['tmp_name'];
    $file_error = $_FILES['course_banner_image']['error'];

    // Check if the file was uploaded successfully
    if ($file_error === UPLOAD_ERR_OK) {
        // Specify the directory to which the file will be moved
        $upload_dir = '../upload_image/';

        // Generate a unique file name
        $file_extension = pathinfo($_FILES['course_banner_image']['name'], PATHINFO_EXTENSION);
        $file_name = uniqid() . '.' . $file_extension;

        // Move the uploaded file to the desired directory
        if (move_uploaded_file($file_tmp, $upload_dir . $file_name)) {
            // Prepare the SQL statement
            $sql = "INSERT INTO `courses` (`course_id`, `course_code`, `course_name`, `course_description`, `course_price`,  `course_banner_image`, `subject_id`) VALUES ('$course_id', '$course_code', '$course_name', '$course_description', '$course_price', '$file_name',  '$subject_id')";
    
            // Execute the SQL statement
            if ($conn->query($sql) === TRUE) {
                return "1";
            } else {
                throw new Exception("Error: " . $conn->error);
            }
        } else {
            throw new Exception("Error: Failed to move uploaded file.");
        }
    } else {
        throw new Exception("Error: File upload failed with error code " . $file_error);
    }

    // Close the database connection
    $conn->close();
}
function select_data()
{
    global  $conn;
    $query = $conn->query("SELECT courses.`course_id`, courses.`course_code`, courses.`course_name`, courses.`course_description`, courses.`course_price`, courses.`create_date`, courses.`course_banner_image`, concat(subjects.`subject_id`,'-',subjects.`subject_name`) as'subject_id' FROM `courses`   inner join subjects on courses.subject_id =subjects.subject_id");
    
    $data = $query->fetch_all(MYSQLI_ASSOC);
    
    echo json_encode($data);
    
  

}
function delete_courses($course_id)
{
    global  $conn;
    $query = "delete FROM courses where courses.`course_id`=$course_id";
  if($conn->query($query))
  {
                    return "1";
                }
  else
  {
    throw new Exception("Error: ". $conn->error);
  }

}
// function update_courses($course_id, $course_code, $course_name, $course_description, $course_price, $create_date, $course_banner_image, $subject_id)
// {
//   global $conn;
//   $query = "UPDATE `courses` SET courses.`course_id`='$course_id', courses.`course_code`='$course_code', courses.`course_name`='$course_name', courses.`course_description`='$course_description', courses.`course_price`='$course_price', courses.`create_date`='$create_date', courses.`course_banner_image`='$course_banner_image', courses.`subject_id`='$subject_id' WHERE `course_id`='$course_id'";
  
//   if($conn->query($query))
//   {
//                     return "1";
//                 }
//   else
//   {
//     throw new Exception("Error: ". $conn->error);
//   }
// }

function update_courses($course_id, $course_code, $course_name, $course_description, $course_price, $subject_id, $course_banner_image = '')
{
    global $conn;
    $query = "";
    if (isset($_FILES['course_banner_image']) && $_FILES['course_banner_image']['error'] === UPLOAD_ERR_OK) {

        $file_tmp = $_FILES['course_banner_image']['tmp_name'];
        $file_error = $_FILES['course_banner_image']['error'];

        // Check if the file was uploaded successfully
        if ($file_error === UPLOAD_ERR_OK) {
            // Specify the directory to which the file will be moved
            $upload_dir = '../upload_image/';

            // Generate a unique file name
            $file_extension = pathinfo($_FILES['course_banner_image']['name'], PATHINFO_EXTENSION);
            $file_name = uniqid() . '.' . $file_extension;

            // Move the uploaded file to the desired directory
            if (move_uploaded_file($file_tmp, $upload_dir . $file_name)) {
                // Update the course_banner_image column in the database

                $course_banner_image = $file_name;
            } else {
                throw new Exception("Failed to move the uploaded file.");
            }
        } else {
            throw new Exception("Error uploading the file: " . $file_error);
        }
    }
    if (!empty($course_banner_image)) {
        $query = "UPDATE `courses` SET `course_id`='$course_id', `course_code`='$course_code', `course_name`='$course_name', `course_description`='$course_description', `course_price`='$course_price', `course_banner_image`='$course_banner_image',  `subject_id`='$subject_id' WHERE `course_id`='$course_id'";
    } else {
        $query = "UPDATE `courses` SET `course_id`='$course_id', `course_code`='$course_code', `course_name`='$course_name', `course_description`='$course_description', `course_price`='$course_price', `subject_id`='$subject_id' WHERE `course_id`='$course_id'";
    }

    if ($conn->query($query)) {
        return "1";
    } else {
        throw new Exception("Error: " . $conn->error);
    }
}
?>