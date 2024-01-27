<?php
include 'include/header.php';
?>



<?php
include 'include/navbar.php';
?>

<body>
    <style>
        .pt-5 {
            padding-top: 150px;
        }

        .cover-image-artical {
            max-height: 400px;
            width: 100%;
            object-fit: cover;
            padding: 15px;
        }

        /* .col-artical{
       height: 100vh; 
    }
    .col-artical{
       height: 100vh; 
    } */
    </style>

    <div class="container " style="padding-top: 70px;">
        <div class="row p-0 m-0">
            <div class="col-lg-8  bg-dark col-artical ">
                <div class="row">
                    <div class="col-lg-12">
                        <img src="assets/img/logo.jpg" class="img-fluid cover-image-artical" id="image" alt="">
                    </div>
                    <div class="col-lg-12 px-4">
                        <h1 id="title-article"> </h1>
                        <p id="des-article"></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4  bg-light col-recent ">
                <h1 class="bg-light p-2 mt-1  border">Recent </h1>
                <div class="row mt-2">
                    <div class="col-lg-12" id="containerRecentArtical">


                    </div>
                </div>

            </div>
        </div>
    </div>

    <script>
        // استهدف زر "آخر المقالات"
    </script>
    <?php
    include 'include/footer.php';
    ?>

    <script>
        $(document).ready(function() {
            fetchArtical();

          var artical_id=<?php echo isset($_GET["upload_id"])?$_GET["upload_id"]:$_GET["upload_id"];?>;
          fetchArticalSelect(artical_id);
        });

        function fetchArtical() {
            // Make an AJAX request to fetch the article data
            $.ajax({
                url: 'php/contentuploadsOpertion.php',
                type: 'post',
                data: {
                    function_name: "select_artical"
                },
                dataType: "json",
                success: function(data) {
                    console.log(data);
                    var articlHtml = '';
                    // Generate the HTML for each article using the fetched data
                    data.forEach(function(article) {
                        var uploadDate = article.upload_time.split(' ')[0];
                        articlHtml += '<a href="" class="mt-3 border article-container" data-article-id="' + article.upload_id + '">' +
                            '<div class="row">' +
                            '<div class="col-lg-4">' +
                            '<img src="upload_image/' + article.image + '" class="img-fluid border cover-image-artical" alt="">' +
                            '</div>' +
                            '<div class="col-lg-8">' +
                            '<h5 class="p-0 m-0">' + article.title + '</h5>' +
                            '<p class="p-0 m-0">' + truncateText(article.content, 3) + '</p>' +
                            '<div class="p-0 m-0 d-flex align-items-center justify-content-between">' +
                            '<div class="col-lg-6">' +
                            article.username +
                            '</div><br>' +
                            '<div class="col-lg-6">' +
                            '' +
                            '</div>' +
                            '</div>' +
                            '<div class="p-0 m-0">' +
                            article.upload_time +
                            '</div>' +
                            '</div>' +
                            '</div>' +
                            '</a>';
                    });
                    $("#containerRecentArtical").html(articlHtml);
                },
                complete: function() {
                    $(document).on('click', '.article-container', function(e) {
                        e.preventDefault();

                        var articleContainer = $(this);
                        var articleId = articleContainer.data('article-id');

                        // Make an AJAX request to fetch the specific article data
                        $.ajax({
                            url: 'php/contentuploadsOpertion.php',
                            type: 'post',
                            data: {
                                function_name: 'select_specific_article',
                                article_id: articleId
                            },
                            dataType: 'json',
                            success: function(data) {
                                console.log(data);
                                // Replace the elements with the fetched article data
                                var newImageSrc = 'upload_image/' + data[0].image;
                                var newArticleTitle = data[0].title;
                                var newArticleContent = data[0].content;
                                console.log(newArticleTitle);
                                // Replace the image
                                var articleImage = document.querySelector('.cover-image-artical');
                                articleImage.src = newImageSrc;
                                // Replace the title
                                ;
                                $("#title-article").html(newArticleTitle);
                                $("#des-article").html(newArticleTitle);
                                // Replace the content

                            }
                        });
                    });
                }
            });
        }

        function fetchArticalSelect(articleId) {
            $.ajax({
                url: 'php/contentuploadsOpertion.php',
                type: 'post',
                data: {
                    function_name: 'select_specific_article',
                    article_id: articleId
                },
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                    // Replace the elements with the fetched article data
                    var newImageSrc = 'upload_image/' + data[0].image;
                    var newArticleTitle = data[0].title;
                    var newArticleContent = data[0].content;
                    console.log(newArticleTitle);
                    // Replace the image
                    var articleImage = document.querySelector('.cover-image-artical');
                    articleImage.src = newImageSrc;
                    // Replace the title
                    ;
                    $("#title-article").html(newArticleTitle);
                    $("#des-article").html(newArticleTitle);
                    // Replace the content

                }
            });

        }

        function truncateText(text, numWords) {
            var words = text.split(' ');
            if (words.length > numWords) {
                var truncatedText = words.slice(0, numWords).join(' ');
                return truncatedText + '...';
            }
            return text;
        }

        function formatDate(dateTimeString) {
            var dateParts = dateTimeString.split('-'); // Split the date string by "-"
            var day = dateParts[0]; // Extract the day
            var month = dateParts[1]; // Extract the month
            var year = dateParts[2]; // Extract the year
            return month + '-' + day + '-' + year; // Return formatted date (mm-dd-yyyy)
        }

        // Function to format the time (assuming the time is in the format "hh:mm:ss")
        function formatTime(dateTimeString) {
            var time = dateTimeString.split(' ')[1]; // Split the date string by space and get the second part (time)
            return time; // Return formatted time
        }
    </script>