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
function add_courses($course_id=0, $course_code, $course_name, $course_description, $course_price, $subject_id)
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
            $sql = "INSERT INTO `courses` ( `course_code`, `course_name`, `course_description`, `course_price`,  `course_banner_image`, `subject_id`) VALUES ('$course_code', '$course_name', '$course_description', '$course_price', '$file_name',  '$subject_id')";
    
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

// function showVideoDetails($course_id,$content_type)
// {
//     global  $conn;
//     $query = $conn->query("SELECT contentuploads.`upload_id`, contentuploads.`user_id`, contentuploads.`title`, contentuploads.`content`, contentuploads.`path`, contentuploads.`image`, contentuploads.`subject_id`, concat(courses.`course_id`,'-',courses.`course_code`) as'course_id', contentuploads.`content_type`, contentuploads.`upload_time`, contentuploads.`is_approved` FROM `contentuploads`   inner join subjects on contentuploads.subject_id =subjects.subject_id  inner join courses on contentuploads.course_id =courses.course_id where content_type='$content_type' and contentuploads.course_id='$course_id'");
    
//     $data = $query->fetch_all(MYSQLI_ASSOC);
    
//     echo json_encode($data);
// }
function showVideoDetails($id)
{
    global $conn;
    $videos = array();
    $query = $conn->query("SELECT `upload_id`, `user_id`, `title`, `content`, `path`, `image`, `subject_id`, `course_id`, `content_type`, `upload_time`, `is_approved` FROM `contentuploads` WHERE course_id='$id'and content_type=3");
    while ($row = $query->fetch_assoc()) {
        $videos[] = $row;
    }
    $count = 0;
    $htmlCode = '';
    foreach ($videos as $video) {
        if ($count % 6 == 0) {
            $htmlCode .= '<div class="row">';
        }
        $htmlCode .= '<div class="card-details">
        <video id="video-' . $video['upload_id'] . '" src="' . $video['path'] . '" controls></video>
        <div class="button-container">
            <button class="edit-video-btn" data-id="' . $video['upload_id'] . '" data-course_id="' . $video['course_id'] . '" data-description_video="' . $video['content'] . '" data-file_name="' . $video['title'] . '"> Edite </button>
            <button class="delete-video-btn" data-id="' . $video['upload_id'] . '"> Delete </button>
        </div>
    </div>';
        $count++;
        if ($count % 6 == 0) {
            $htmlCode .= '</div>';
        }
    }
    if ($count % 6 != 0) {
        $htmlCode .= '</div>';
    }
    return $htmlCode;
}
function generateCoursesHTMLDetails($subject_id)
{
    global $conn;
    $coursesHTML = '<div class="owl-carousel related-carousel position-relative" style="padding: 0 30px;">';

    $query = "SELECT courses.course_id, courses.course_code, courses.course_name, courses.course_description, courses.course_price, courses.create_date, courses.course_banner_image, CONCAT(subjects.subject_id, '-', subjects.subject_name) AS subject_id FROM courses INNER JOIN subjects ON courses.subject_id = subjects.subject_id WHERE courses.subject_id='$subject_id'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $courseHTML = '<div class="courses-list-item">';
            $courseHTML .= '<a class="position-relative d-block overflow-hidden mb-2" href="vidoeDetiles.php?course_id=' . $row['course_id'] . '">';
            $courseHTML .= '<img class="img-fluid" src="upload_image/' . $row['course_banner_image'] . '" style="width:100px; height:200px;" alt="">';
            $courseHTML .= '<div class="courses-text">';
            $courseHTML .= '<h4 class="text-center text-white px-3">' . $row['course_name'] . '</h4>';
            $courseHTML .= '</div>';
            $courseHTML .= '</a>';
            $courseHTML .= '</div>';

            $coursesHTML .= $courseHTML;
        }
        mysqli_free_result($result);
    }

    $coursesHTML .= '</div>';

    return $coursesHTML;
}
?>