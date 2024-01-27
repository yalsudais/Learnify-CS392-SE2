<?php include "../php/config.php";
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
function searchInDatabase($keyword,$filter=null) {
    global $conn;
    
    // Prepare the SQL query with INNER JOIN and WHERE clause to search for the keyword
    $query = "SELECT
    `upload_id`,
    `user_id`,
    `title`,
    `content`,
    `path`,
    `image`,
    `subject_id`,
    `course_id`,
    `content_type`,
    `upload_time`,
    `is_approved`,
    CASE
      WHEN `content_type` = 1 THEN 'bookDetails.php'
      WHEN `content_type` = 2 THEN 'articlesDetails.php'
      WHEN `content_type` = 3 THEN 'vidoeDetiles.php'
      ELSE ''
    END AS `details_page`
  FROM
    `contentuploads`
  WHERE
    `title` LIKE '%{$keyword}%' OR `content` LIKE '%{$keyword}%'";
       if (!empty($filter)||$filter==4) {
        $query .= " and `content_type` = '{$filter}'";
      }
    
    // Execute the query
    $result = mysqli_query($conn, $query);
    
    // Check if the query was successful
    if (!$result) {
      die('Query execution failed: ' . mysqli_error($conn));
    }
    
    // Fetch the data from the result set
    $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
    
    // Free the result set
    mysqli_free_result($result);
    
    // Close the database connection
    mysqli_close($conn);
    
    // Return the fetched data
    return json_encode($data);
  }