<!DOCTYPE html>
<html>
<head>
    <title>Courses</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <h1>Courses</h1>

<div id="containerVideo"></div>

    <a href="index.php">Back</a>
</body>
</html>
<script>
    $(document).ready(function () {
        var course_id=<?php echo $_GET["course_id"];?>;
        $.ajax({
            type: "post",
            url: "php/contentuploadsOpertion.php",
            data: { function_name: "generateVideoHTML", course_id: course_id },
          
            success: function (response) {
                $("#containerVideo").html(response);
                
            }
        });
    });
</script>