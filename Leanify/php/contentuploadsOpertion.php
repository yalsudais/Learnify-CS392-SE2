<?php session_start();
include "config.php";

if (isset($_POST["function_name"])) {
    $fun = $_POST["function_name"];
    unset($_POST["function_name"]);

    $param = $_POST;
    try {
        $result = call_user_func_array($fun, $param);
        echo $result;
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}
function add_contentuploads($upload_id, $user_id, $title, $content, $path = "", $image, $subject_id, $course_id, $content_type, $upload_time, $is_approved)
{
    global $conn;

    // Prepare the SQL statement
    $sql = "INSERT INTO `contentuploads` (`upload_id`, `user_id`, `title`, `content`, `path`, `image`, `subject_id`, `course_id`, `content_type`, `upload_time`, `is_approved`) VALUES ('$upload_id', '$user_id', '$title', '$content', '$path', '$image', '$subject_id', '$course_id', '$content_type', '$upload_time', '$is_approved')";

    // Execute the SQL statement
    if ($conn->query($sql) === TRUE) {
        return "1";
    } else {
        throw new Exception("Error: " . $conn->error);
    }

    // Close the database connection
    $conn->close();
}
function select_data($content_type)
{
    global  $conn;
    $query = $conn->query("SELECT contentuploads.`upload_id`, contentuploads.`user_id`, contentuploads.`title`, contentuploads.`content`, contentuploads.`path`, contentuploads.`image`, contentuploads.`subject_id`,subjects.subject_name, concat(courses.`course_id`,'-',courses.`course_code`) as'course_id', contentuploads.`content_type`, contentuploads.`upload_time`, contentuploads.`is_approved` FROM `contentuploads`   inner join subjects on contentuploads.subject_id =subjects.subject_id  left join courses on contentuploads.course_id =courses.course_id where content_type=$content_type");

    $data = $query->fetch_all(MYSQLI_ASSOC);

    echo json_encode($data);
}
function delete_contentuploads($upload_id)
{
    global  $conn;
    $query = "delete FROM contentuploads where contentuploads.`upload_id`=$upload_id";
    if ($conn->query($query)) {
        return "1";
    } else {
        throw new Exception("Error: " . $conn->error);
    }
}
function update_contentuploads($upload_id, $user_id, $title, $content,  $path = "", $image, $subject_id, $course_id = null, $content_type, $upload_time, $is_approved)
{
    global $conn;
    $query = "UPDATE `contentuploads` SET contentuploads.`upload_id`='$upload_id', contentuploads.`user_id`='$user_id', contentuploads.`title`='$title', contentuploads.`content`='$content', contentuploads.`path`='$path', contentuploads.`image`='$image', contentuploads.`subject_id`='$subject_id', contentuploads.`course_id`='$course_id', contentuploads.`content_type`='$content_type', contentuploads.`upload_time`='$upload_time', contentuploads.`is_approved`='$is_approved' WHERE `upload_id`='$upload_id'";

    if ($conn->query($query)) {
        return "1";
    } else {
        throw new Exception("Error: " . $conn->error);
    }
}

function uploadcontent($upload_id, $title, $content, $subject_id, $course_id = NULL, $content_type, $updateOrAdd = 0)
{
    global $conn;

    $uploadDirectory = "../upload/";
    $image = "";
    $user_id = $_SESSION["user_id"];

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
                if ($upload_id == 0) {
                    $stmt = $conn->prepare("INSERT INTO `contentuploads`(`user_id`, `title`, `content`, `path`, `image`, `subject_id`, `course_id`, `content_type`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
                    $stmt->bind_param("issssiis", $user_id, $title, $content, $uploadFilePath, $image, $subject_id, $course_id, $content_type);
                    if ($stmt->execute()) {
                        echo "File $fileName uploaded successfully.<br>";
                    } else {
                        echo "Error inserting file $fileName: " . $stmt->error . "<br>";
                    }

                    $stmt->close();
                } elseif ($upload_id >= 1) {
                    $stmt = $conn->prepare("UPDATE `contentuploads` SET `upload_id`=?, `user_id`=?, `title`=?, `content`=?, `path`=?, `image`=?, `subject_id`=?, `course_id`=?, `content_type`=? WHERE upload_id=?");
                    $stmt->bind_param("iissssiisi", $upload_id, $user_id, $title, $content, $uploadFilePath, $image, $subject_id, $course_id, $content_type, $upload_id);

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
            echo "Error uploading the fi";
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
function addArticle($articleId,$title, $content, $subject_id, $content_type = 2)
{
    global $conn;

    $uploadDirectory = "../upload/";
    $image = "";
    $user_id = $_SESSION["user_id"];

    // Handle multiple video files


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
    $stmt = $conn->prepare("INSERT INTO `contentuploads` (`user_id`, `title`, `content`, `image`, `subject_id`, `content_type`) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("isssis", $user_id, $title, $content, $image, $subject_id, $content_type);
    if ($stmt->execute()) {
        return true; // Article added successfully
    } else {
        return false; // Failed to add article
    }
}
function updateArticle($articleId, $title, $content, $subject_id, $content_type = 2)
{
    global $conn;

    $uploadDirectory = "../upload/";
    $image = "";
    $user_id = $_SESSION["user_id"];

    // Handle multiple video files
    // $uploadedFiles = $_FILES['path'];

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

    // Check if the article exists
    $stmt = $conn->prepare("SELECT * FROM `contentuploads` WHERE `upload_id` = ?");
    $stmt->bind_param("i", $articleId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        throw new Exception("Article not found.");
    }

    $stmt = $conn->prepare("UPDATE `contentuploads` SET `title` = ?,user_id=?, `content` = ?, `image` = ?, `subject_id` = ?, `content_type` = ? WHERE `upload_id` = ?");
    $stmt->bind_param("sissisi", $title, $user_id,$content, $image, $subject_id, $content_type, $articleId);

    if ($stmt->execute()) {
        return true; // Article updated successfully
    } else {
        return false; // Failed to update article
    }
}

function showArtical($subject_id)
{
    global $conn;
    $query = $conn->query("SELECT `upload_id`, `user_id`, `title`, `content`, `path`, `image`, `subject_id`, `course_id`, `content_type`, `upload_time`, `is_approved` FROM `contentuploads` WHERE content_type=2 and subject_id='$subject_id' ORDER BY `upload_time` DESC LIMIT 5");
    $htmlCode = '<ul class="menu bg p-2 rounded">';
    while ($row = $query->fetch_assoc()) {
        $htmlCode .= '
            <li class="mt-2">
                <a href="" class="link nav-link">
                    <div class="subject text-bg bg-light">
              
                        <h4>'.$row["title"].'</h4>
                        <p>'.$row["content"].'</p>
                    </div>
                </a>
            </li>';
    }
    $htmlCode .= '</ul>';

    echo $htmlCode;
}
// function showArtical($subject_id)
// {
//     global $conn;
//     $query = $conn->query("SELECT `upload_id`, `user_id`, `title`, `content`, `path`, `image`, `subject_id`, `course_id`, `content_type`, `upload_time`, `is_approved` FROM `contentuploads` WHERE content_type=2 and subject_id='$subject_id' ORDER BY `upload_time` DESC LIMIT 5");
//     $htmlCode = '<ul class="menu bg p-2 rounded">';
//     while ($row = $query->fetch_assoc()) {
//         $htmlCode .= '
//             <li class="mt-2">
//                 <a href="" class="link nav-link">
//                     <div class="subject text-bg bg-light">
//                         <img src="upload_image/'.$row["image"].'" alt="Profile Picture" class="subject-picture">
//                         <h4>'.$row["title"].'</h4>
//                         <p>'.$row["content"].'</p>
//                     </div>
//                 </a>
//             </li>';
//     }
//     $htmlCode .= '</ul>';

//     echo $htmlCode;
// }
function generateArticleFromDatabase($subject_id)
{
    global $conn;
    $query = $conn->query("SELECT `upload_id`, `user_id`, `title`, `content`, `path`, `image`, `subject_id`, `course_id`, `content_type`, `upload_time`, `is_approved` FROM `contentuploads` WHERE content_type=2  and subject_id='$subject_id'");

    $htmlCode = '<article>';

    while ($row = $query->fetch_assoc()) {
        $title = $row['title'];
        $content = $row['content'];

        $htmlCode .= '
            <h4>' . $title . '</h4>
            <p>' . $content . '</p>
        ';
    }

    $htmlCode .= '</article>';

    return $htmlCode;
}

function generateBookData($subject_id)
{
    global $conn;
    // Query to retrieve book details from the database
    $query = "SELECT `upload_id`, `user_id`, `title`, `content`, `path`, `image`, `subject_id`, `course_id`, `content_type`, `upload_time`, `is_approved` FROM `contentuploads`where content_type=1 and subject_id='$subject_id' ";
    $result = $conn->query($query);

    // Check if the query was successful
    if (!$result) {
        echo "Error executing query: " . $conn->error;
        exit();
    }

    // Generate the HTML code for each book dynamically with new rows
    $output = '';
    $counter = 0;
    while ($row = $result->fetch_assoc()) {
        if ($counter % 3 === 0) {
            $output .= '</div><div class="row">';
        }

        $output .= '
            <div class="col-lg-4">
                <div class="card">
                <img src="upload_image/' . $row['image'] . '" class="card-img-top" alt="' . $row['title'] . '" style=" height:100;width:100;">
                    <div class="card-body">
                        <h5 class="card-title">' . $row['title'] . '</h5>
                        <p class="card-text">' . $row['content'] . '</p>
                        <a href="#" class="btn btn-primary">View Book</a>
                        <a href="#" class="btn btn-secondary">Download Book</a>
                    </div>
                </div>
            </div>
        ';

        $counter++;
    }

    // Close the database connection
    $conn->close();

    // Return the generated HTML code
    return $output;
}

function generateVideoHTML($course_id)
{
    $html = '';
    global $conn;

    // Query to retrieve video details from the database
    $query = "SELECT `upload_id`, `user_id`, `title`, `content`, `path`, `image`, `subject_id`, `course_id`, `content_type`, `upload_time`, `is_approved` FROM `contentuploads` WHERE `content_type` = 3 AND `course_id` = '$course_id'";
    $result = $conn->query($query);

    // Check if the query was successful
    if (!$result) {
        echo "Error executing query: " . $conn->error;
        exit();
    }

    // Generate the HTML code for each video dynamically
    while ($row = $result->fetch_assoc()) {
        $cleanedString = str_replace('../', '', $row["path"]);

        $html .= '<a href="#" class="list-group-item list-group-item-action w-100 p-1 rounded iframeclick" data-video="' . $cleanedString . '">';
        $html .= '<div class="card shadow-sm">';
        $html .= '<div class="card-body m-1 p-1">';
        $html .= '<video src="' . $cleanedString. '" class="rounded sidbarvideo" controls></video>';
        $html .= '<h5 class="video-title mt-2">' . $row['title'] . '</h5>';
        $html .= '</div>';
        $html .= '</div>';
        $html .= '</a>';
    }

    return $html;
}

function getContentByType() {
    // Create a connection to your database
    global $conn;

    // Query to retrieve content grouped by content type
    $sql = "SELECT content_type, COUNT(*) AS content_count
    FROM contentuploads
    GROUP BY content_type;";

    // Query to retrieve the count of courses
    $sql2 = "select count(*) content_count from courses";

    // Execute the first query
    $result = $conn->query($sql);

    $contentByType = array();

    while ($row = $result->fetch_assoc()) {
        $contentByType[$row["content_type"]] = $row["content_count"];
    }

    // Execute the second query to get the count of courses
    $result2 = $conn->query($sql2);
    if ($row2 = $result2->fetch_assoc()) {
        $contentByType["4"] = $row2["content_count"]; // Assuming "4" represents the course content type
    }

    // Close the database connection
    $conn->close();

    echo json_encode($contentByType);
}
// function generateArticlesFromDatabase() {
//     // Create a connection to your database
//     global $conn;

//     // Query to retrieve articles from the contentuploads table with content_type = 2
//     $sql = "SELECT * FROM contentuploads WHERE content_type = 2";

//     $result = $conn->query($sql);

//     $articles = '';

//     while ($row = $result->fetch_assoc()) {
//         $articleTitle = $row["title"];
//         $articleContent = $row["content"];
//         $articleImage = $row["image"];

//         // Generate the HTML code for each article
//         $articleHTML = '<div class="col-lg-4 col-md-6 d-flex align-items-stretch">';
//         $articleHTML .= '<div class="course-item">';
//         $articleHTML .= '<img src="assets/img/' . $articleImage . '" class="img-fluid" alt="...">';
//         $articleHTML .= '<div class="course-content">';
//         $articleHTML .= '<h3>' . $articleTitle . '</h3>';
//         $articleHTML .= '<p>' . $articleContent . '</p>';
//         $articleHTML .= '</div>';
//         $articleHTML .= '</div>';
//         $articleHTML .= '</div>';

//         // Append the generated HTML code to the articles string
//         $articles .= $articleHTML;
//     }

//     // Close the database connection
//     $conn->close();

//     return $articles;
// }
function generateArticlesFromDatabase() {
    // Create a connection to your database
    global $conn;

    // Query to retrieve articles from the contentuploads table with content_type = 2
    $sql = "SELECT cu.*, u.username
    FROM contentuploads cu
    INNER JOIN users u ON cu.user_id = u.user_id
    WHERE cu.content_type = 2";

    $result = $conn->query($sql);

    $articles = '<div class="owl-carousel related-carousel position-relative" style="padding: 0 30px;">'; // Added line

    while ($row = $result->fetch_assoc()) {
        $articleTitle = $row["title"];
        $articleDescription = $row["content"];
        $articleImage = $row["image"];
        $trainerName = $row["username"];
        $upload_time = $row["upload_time"];
        $upload_id= $row["upload_id"];
     
        // Generate the HTML code for each article
        $articleHTML = '<div class="courses-list-item position-relative d-block overflow-hidden border shadow-sm mb-2 cursor-pointer  " >';

        $articleHTML .= '<img src="upload_image/' . $articleImage . '"  class="img-fluid rounded border" alt="..." ">';
        $articleHTML .= '<div class="course-content ">';
        $articleHTML .= '<div class="d-flex justify-content-center align-items-center   ">';
        $articleHTML .= '<h4 class="w-100  rounded p-2 text-center">' . $articleTitle . '</h4>';
        $articleHTML .= '</div>';
        $articleHTML .= '<h3><a href="articlesDetails.php?' . $upload_id . '"><script>truncateText("' . $articleDescription . '", 3)</script></a></h3>';
        $articleHTML .= '<p></p>';   $articleHTML .= '<p> </p>';
        $articleHTML.='<div class="trainer d-flex justify-content-between align-items-center">';
        $articleHTML .= '<div class="d-flex d-flex  justify-content-between align-items-center ">';
        $articleHTML .= '<div class="trainer-profile ">';
        $articleHTML .= '<span>' . $trainerName . '</span>';
        $articleHTML .= '</div>';
        $articleHTML .= '<div class="trainer-rank  " >'. $upload_time;
        $articleHTML .= '</div>';
        $articleHTML .= '</div>';
        $articleHTML .= '</div>';
        $articleHTML .= '</div>';
        $articleHTML .= '</div>';

        // Append the generated HTML code to the articles string
        $articles .= $articleHTML;
    }

    $articles .= '</div>'; // Added line

    // Close the database connection
    $conn->close();

    return $articles;
}

function generateBooksFromDatabase() {
    // Create a connection to your database
    global $conn;

    // Query to retrieve articles from the contentuploads table with content_type = 2
    $sql = "SELECT cu.*, u.username
    FROM contentuploads cu
    INNER JOIN users u ON cu.user_id = u.user_id
    WHERE cu.content_type = 1";

    $result = $conn->query($sql);

    $books = '<div class="owl-carousel related-carousel position-relative " style="padding: 0 30px;">'; // Added line

    while ($row = $result->fetch_assoc()) {
        $articleTitle = $row["title"];
        $articleDescription = $row["content"];
        $articleImage = $row["image"];
        $trainerName = $row["username"];
        $upload_time = $row["upload_time"];
        $path = $row["path"];
        // Generate the HTML code for each BooKs
        $articleHTML = '<div class="courses-list-item position-relative d-block overflow-hidden border shadow-sm mb-2 cursor-pointer ">';

        $articleHTML .= '<img src="upload_image/' . $articleImage . '"  class="img-fluid rounded border" alt="..." >';
        $articleHTML .= '<div class="course-content">';
        $articleHTML .= '<div class="d-flex justify-content-center align-items-center ">';
        $articleHTML .= '<h4 class="w-100  rounded p-2 text-center"><a href="upload'.$path.'">' . $articleTitle . '</h4>';
        $articleHTML .= '</div>';
        $articleHTML .= '<h3> <script>truncateText(' . $articleDescription . ', 3)</script></a></h3>';
        $articleHTML .= '<p> </p>';
        $articleHTML .= '<div class="d-flex justify-content-between p-4">';
        $articleHTML .= '<div class="trainer-profile d-flex align-items-center">';
        $articleHTML .= '<span>' . $trainerName . '</span>';
        $articleHTML .= '</div>';
        $articleHTML .= '<div class="trainer-rank d-flex align-items-center">'. $upload_time;
        $articleHTML .= '</div>';
        $articleHTML .= '</div>';
        $articleHTML .= '</div>';
  
        $articleHTML .= '</div>';

        // Append the generated HTML code to the articles string
        $books .= $articleHTML;
    }

    $books .= '</div>'; // Added line

    // Close the database connection
    $conn->close();

    return $books;
}


function generateCoursesFromDatabase() {
    // Create a connection to your database
    global $conn;

    // Query to retrieve articles from the contentuploads table with content_type = 2
    $sql = "SELECT courses.course_id, courses.course_code, courses.course_name, courses.course_description, courses.course_price, courses.course_banner_image, subjects.subject_name,courses.create_date 
    FROM courses
    LEFT JOIN subjects ON courses.subject_id = subjects.subject_id;";

    $result = $conn->query($sql);

    $courses = '<div class="owl-carousel related-carousel position-relative" style="padding: 0 30px;">'; // Added line

    while ($row = $result->fetch_assoc()) {
        $courseCode = $row["course_code"];
        $courseName = $row["course_name"];
        $courseDescription = $row["course_description"];
        $courseImage = $row["course_banner_image"];
        $subjectName = $row["subject_name"];
        $course_id = $row["course_id"];
        $create_date = $row["create_date"];
        // Generate the HTML code for each course
        $courseHTML = '<a href="vidoeDetiles.php?course_id='.$course_id.'"><div class="courses-list-item position-relative d-block overflow-hidden border shadow-sm mb-2 cursor-pointer" href="" >';
        $courseHTML .= '<img src="upload_image/' . $courseImage . '" class="img-fluid rounded border" alt="...">';
        $courseHTML .= '<div class="course-content">';
        $courseHTML .= '<div class="d-flex justify-content-center align-items-center">';
        $courseHTML .= '<h4 class="w-100 rounded p-2 text-center">' . $courseName . '</h4>';
        $courseHTML .= '</div>';
        $courseHTML .= '<h3><script>truncateText("' . $courseDescription . '", 3)</script></h3>';
        $courseHTML .= '<p> </p>';
        $courseHTML .= '<div class="d-flex justify-content-between p-1 navbar-link">';
        $courseHTML .= '<div class="trainer-profile d-flex align-items-center">';
        $courseHTML .= '<span>' . $subjectName . '</span>';
        $courseHTML .= '</div>';
        $courseHTML .= '<div class="trainer-rank d-flex align-items-center">' . $create_date;
        $courseHTML .= '</div>';
        $courseHTML .= '</div>';
        $courseHTML .= '</div>';

        $courseHTML .= '</div></a>';

        // Append the generated HTML code to the courses string
        $courses .= $courseHTML;
    }

    $courses .= '</div>'; // Added line

    // Close the database connection
    $conn->close();

    return $courses;
}




// Usage example

// function generateCardsFromDatabase() {
//     // Create a connection to your database
//     global $conn;

//     // Query to retrieve data from the contentuploads table
//     $sql = "SELECT * FROM contentuploads WHERE content_type = '2'";

//     $result = $conn->query($sql);

//     $cards = '';

//     while ($row = $result->fetch_assoc()) {
//         $title = $row["title"];
//         $content = $row["content"];
//         $image = $row["image"];

//         // Generate the HTML code for each card
//         $cardHTML = '<div class="col-3">';
//         $cardHTML .= '<div class="card">';
//         $cardHTML .= '<div class="card-header"><h4>' . $title . '</h4></div>';
//         $cardHTML .= '<div class="card-body">';
//         $cardHTML .= '<img src="upload_image/' . $image . '" class="img-fluid" alt="Card Image">';
//         $cardHTML .= '<p>' . $content . '</p>';
//         $cardHTML .= '</div>';
//         $cardHTML .= '<div class="card-footer">';
//         $cardHTML .= '<button class="btn btn-info">Artical Ditailes</button>';
//         $cardHTML .= '</div>';
//         $cardHTML .= '</div>';
//         $cardHTML .= '</div>';

//         // Append the generated HTML code to the cards string
//         $cards .= $cardHTML;
//     }

//     // Close the database connection
//     $conn->close();

//     return $cards;
// }
function generateArticlesFromDatabase2() {
    // Create a connection to your database
    global $conn;

    // Query to retrieve articles from the contentuploads table with content_type = 2
    $sql = "SELECT cu.*, u.username
    FROM contentuploads cu
    INNER JOIN users u ON cu.user_id = u.user_id
    WHERE cu.content_type = 2";

    $result = $conn->query($sql);

    $articles = ''; // Removed line

    while ($row = $result->fetch_assoc()) {
        $articleTitle = $row["title"];
        $articleDescription = $row["content"];
        $articleImage = $row["image"];
        $trainerName = $row["username"];
        $upload_time = $row["upload_time"];
        $upload_id= $row["upload_id"];
        $articleHTML = '<div class="col-lg-4 col-md-6 pb-4">';
                $articleHTML .= '<div class="card">';
        // Generate the HTML code for each article
        $articleHTML = '<div class="courses-list-item position-relative d-block overflow-hidden border shadow-sm mb-2 cursor-pointer " ">';

        $articleHTML .= '<img src="upload_image/' . $articleImage . '"  class="img-fluid rounded border" alt="..." ">';
        $articleHTML .= '<div class="course-content ">';
        $articleHTML .= '<div class="d-flex justify-content-center align-items-center   ">';
        $articleHTML .= '<h4 class="w-100  rounded p-2 text-center">' . $articleTitle . '</h4>';
        $articleHTML .= '</div>';
        $articleHTML .= '<h3><a href="courcees.php#'.$upload_id.'"  > <script>truncateText(' . $articleDescription . ', 3)</script></a></h3>';
        $articleHTML .= '<p> </p>';
        $articleHTML.='<div class="trainer d-flex justify-content-between align-items-center">';
        $articleHTML .= '<div class="d-flex d-flex  justify-content-between align-items-center ">';
        $articleHTML .= '<div class="trainer-profile ">';
        $articleHTML .= '<span>' . $trainerName . '</span>';
        $articleHTML .= '</div>';
        $articleHTML .= '<div class="trainer-rank  " >'. $upload_time;
        $articleHTML .= '</div>';
        $articleHTML .= '</div>';
        $articleHTML .= '</div>';
        $articleHTML .= '</div>';
        $articleHTML .= '</div>';
        $articleHTML .= '</div>';
       $articleHTML .= '</div>';
        
        // Append the generated HTML code to the articles string
        $articles .= $articleHTML;
    }

    // Close the database connection
    $conn->close();

    return $articles;
}

function select_artical()
{
    global  $conn;
    $query = $conn->query("SELECT cu.*, u.username
    FROM contentuploads cu
    INNER JOIN users u ON cu.user_id = u.user_id
    WHERE cu.content_type = 2");

    $data = $query->fetch_all(MYSQLI_ASSOC);

    echo json_encode($data);
}
function select_specific_article($article_id)
{
    global  $conn;
    $query = $conn->query("SELECT cu.*, u.username
    FROM contentuploads cu
    INNER JOIN users u ON cu.user_id = u.user_id
    WHERE cu.content_type = 2 and upload_id='$article_id'");

    $data = $query->fetch_all(MYSQLI_ASSOC);  
    echo json_encode($data);
}
?>
