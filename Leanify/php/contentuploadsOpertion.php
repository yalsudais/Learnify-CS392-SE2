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
function add_contentuploads($upload_id, $user_id, $title, $content, $path="", $image, $subject_id, $course_id, $content_type, $upload_time, $is_approved)
{
    global $conn;
    
    // Prepare the SQL statement
    $sql = "INSERT INTO `contentuploads` (`upload_id`, `user_id`, `title`, `content`, `path`, `image`, `subject_id`, `course_id`, `content_type`, `upload_time`, `is_approved`) VALUES ('$upload_id', '$user_id', '$title', '$content', '$path', '$image', '$subject_id', '$course_id', '$content_type', '$upload_time', '$is_approved')";
    
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
    $query = $conn->query("SELECT contentuploads.`upload_id`, contentuploads.`user_id`, contentuploads.`title`, contentuploads.`content`, contentuploads.`path`, contentuploads.`image`, contentuploads.`subject_id`, concat(courses.`course_id`,'-',courses.`course_code`) as'course_id', contentuploads.`content_type`, contentuploads.`upload_time`, contentuploads.`is_approved` FROM `contentuploads`   inner join subjects on contentuploads.subject_id =subjects.subject_id  inner join courses on contentuploads.course_id =courses.course_id");
    
    $data = $query->fetch_all(MYSQLI_ASSOC);
    
    echo json_encode($data);
    
  

}
function delete_contentuploads($upload_id)
{
    global  $conn;
    $query = "delete FROM contentuploads where contentuploads.`upload_id`=$upload_id";
  if($conn->query($query))
  {
                    return "1";
                }
  else
  {
    throw new Exception("Error: ". $conn->error);
  }

}
function update_contentuploads($upload_id, $user_id, $title, $content,  $path="", $image, $subject_id, $course_id, $content_type, $upload_time, $is_approved)
{
  global $conn;
  $query = "UPDATE `contentuploads` SET contentuploads.`upload_id`='$upload_id', contentuploads.`user_id`='$user_id', contentuploads.`title`='$title', contentuploads.`content`='$content', contentuploads.`path`='$path', contentuploads.`image`='$image', contentuploads.`subject_id`='$subject_id', contentuploads.`course_id`='$course_id', contentuploads.`content_type`='$content_type', contentuploads.`upload_time`='$upload_time', contentuploads.`is_approved`='$is_approved' WHERE `upload_id`='$upload_id'";
  
  if($conn->query($query))
  {
                    return "1";
                }
  else
  {
    throw new Exception("Error: ". $conn->error);
  }
}

function uploadcontent($upload_id, $user_id, $title, $content , $subject_id, $course_id, $content_type, $upload_time, $is_approved, $updateOrAdd = 0)
{
    global $conn;

    $uploadDirectory = "../upload/";
$image="";
    // Handle multiple video files
    $uploadedFiles = $_FILES['path'];

    // Create a directory for the course if it doesn't exist
    $courseDirectory = $uploadDirectory . "/";
    if (!is_dir($courseDirectory)) {
        mkdir($courseDirectory, 0777, true);
    }

    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $file_tmp = $_FILES['image']['tmp_name'];
        $file_error = $_FILES['image']['error'];

        // Check if the file was uploaded successfully
        if ($file_error === UPLOAD_ERR_OK) {
            // Specify the directory to which the file will be moved
            $upload_dir = '../upload_image/';

            // Generate a unique file name
            $file_extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
            $file_name = uniqid() . '.' . $file_extension;

            // Move the uploaded file to the desired directory
            if (move_uploaded_file($file_tmp, $upload_dir . $file_name)) {
                // Update the course_banner_image column in the database
                $image = $file_name;
            } else {
                throw new Exception("Failed to move the uploaded image file.");
            }
        } else {
            throw new Exception("Error uploading the image file: " . $file_error);
        }
    }

    // Iterate through each uploaded file
    for ($i = 0; $i < count($uploadedFiles['name']); $i++) {
        $file_tmp = $uploadedFiles['tmp_name'][$i];
        $file_error = $uploadedFiles['error'][$i];

        if ($file_error === UPLOAD_ERR_OK) {
            $fileName = $uploadedFiles['name'][$i];
            $fileTmpPath = $file_tmp;
            $fileType = $uploadedFiles['type'][$i];
            $fileSize = $uploadedFiles['size'][$i];
            $file_extension = pathinfo($fileName, PATHINFO_EXTENSION);
            $file_name = uniqid() . $fileName;
            $uploadFilePath = $courseDirectory . $file_name;

            // Enable output buffering to capture the progress
            ob_start();

            // Get the size of the uploaded file
            $totalSize = $fileSize;

            // Set a callback function to track the progress
            $callback = function ($uploadedBytes) use ($totalSize) {
                // Calculate the progress percentage
                $progress = ($uploadedBytes / $totalSize) * 100;

                // Send the progress to the client
                echo json_encode(['progress' => $progress]);

                // Flush the output buffer
                ob_flush();
                flush();
            };

            if (move_uploaded_file_with_progress($fileTmpPath, $uploadFilePath, $callback)) {
                if ($updateOrAdd == 0) {
                    $stmt = $conn->prepare("INSERT INTO `contentuploads`(`user_id`, `title`, `content`, `path`, `image`, `subject_id`, `course_id`, `content_type`, `upload_time`, `is_approved`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                    $stmt->bind_param("issssiissi", $user_id, $title, $content, $uploadFilePath, $image, $subject_id, $course_id, $content_type, $upload_time, $is_approved);
                    if ($stmt->execute()) {
                        echo "File $fileName uploaded successfully.<br>";
                    } else {
                        echo "Error inserting file $fileName: " . $stmt->error . "<br>";
                    }

                    $stmt->close();
                } elseif ($updateOrAdd >= 1) {
                    $stmt = $conn->prepare("UPDATE `contentuploads` SET `upload_id`=?, `user_id`=?, `title`=?, `content`=?, `path`=?, `image`=?, `subject_id`=?, `course_id`=?, `content_type`=?, `upload_time`=?, `is_approved`=? WHERE upload_id=?");
                    $stmt->bind_param("iissssiissii", $upload_id, $user_id, $title, $content, $file_name, $image, $subject_id, $course_id, $content_type, $upload_time, $is_approved, $upload_id);

                    if ($stmt->execute()) {
                        echo "File $fileName updated successfully.<br>";
                    } else {
                        echo "Error updating file $fileName: " . $stmt->error . "<br>";
                    }

                    $stmt->close();
                } else {
                    echo "Invalid updateOrAdd value.<br>";
                }
            }

            ob_end_clean();
        } else {
            echo "Error uploading the file.<br>";
        }
    }
}


function move_uploaded_file_with_progress($source, $destination, $callback)
{
    $chunkSize = 4096;
    $totalBytes = filesize($source);
    $uploadedBytes = 0;

    if (($sourceFile = fopen($source, 'rb')) === false) {
        return false;
    }

    if (($destFile = fopen($destination, 'wb')) === false) {
        fclose($sourceFile);
        return false;
    }

    while (!feof($sourceFile)) {
        $chunk = fread($sourceFile, $chunkSize);

        if ($chunk === false) {
            fclose($sourceFile);
            fclose($destFile);
            return false;
        }

        $writtenBytes = fwrite($destFile, $chunk);

        if ($writtenBytes === false) {
            fclose($sourceFile);
            fclose($destFile);
            return false;
        }

        $uploadedBytes += $writtenBytes;

        if (is_callable($callback)) {
            call_user_func($callback, $uploadedBytes);
        }
    }

    fclose($sourceFile);
    fclose($destFile);

    return true;
}

?>