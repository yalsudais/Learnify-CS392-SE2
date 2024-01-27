<style>

    .video-list {
      max-height: 100vh;
      overflow-y: scroll;
    }
    .video-title {
      width: auto;
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
      
    }
    .list-group-item{
      border: none;
     
    }
    i{
      font-size: 50px;
    }
    </style>
  <?php 
  include 'include/header.php';
  ?>
  
  <body>
    
  <?php 
  include 'include/navbar.php';
  ?>
  <div class="container bg-light mt-3">
    <h2 class="p-2 text-center">
      Detiles of course
    </h2>
  </div>
  <div class="container mt-3">
    <div class="row">
      <div class="col-lg-9 col-md-12">
        <video class="w-100 rounded" id="player" controls>
          <!-- The selected video will be loaded here -->
        </video>
        <div class="row">
          <div class="col-12 rounded bg-light px-3 m-2 d-flex align-items-center">
            <i class="uil uil-video icon p-2"></i>
            <h4>Title of the Courses</h4>
          </div>
          <div class="col-12 rounded bg-light p-2 m-2 d-flex">
            <i class="uil uil-file-alt icon"></i>
            <p class="p-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi sunt beatae in odio nostrum nemo minima quisquam hic odit quidem assumenda maiores provident non, voluptates, quos, ut omnis. Quam, aspernatur?</p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-12 p-2 rounded bg-light">
        <h3 class="p-2">Title of the Courses</h3>
        <div class="video-list">
          <div class="list-group">
          <div id="containerVideo"></div>
            <!-- <a href="#" class="list-group-item list-group-item-action w-100 p-1 rounded" data-video="video1.mp4">
              <div class="card shadow-sm">
                <div class="card-body m-1 p-1">
                  <img src="images/1.jpg" class="rounded img-fluid" alt="">
                  <h5 class="video-title mt-2">Title of the video</h5>
                </div>
              </div>
            </a>
            <a href="#" class="list-group-item list-group-item-action w-100 p-1 rounded" data-video="video1.mp4">
              <div class="card shadow-sm">
                <div class="card-body m-1 p-1">
                  <img src="images/1.jpg" class="rounded img-fluid" alt="">
                  <h5 class="video-title mt-2">Title of the video</h5>
                </div>
              </div>
            </a>
            <a href="#" class="list-group-item list-group-item-action w-100 p-1 rounded" data-video="video1.mp4">
              <div class="card shadow-sm">
                <div class="card-body m-1 p-1">
                  <img src="images/1.jpg" class="rounded img-fluid" alt="">
                  <h5 class="video-title mt-2">Title of the video</h5>
                </div>
              </div>
            </a> -->
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php 
 include   'include/footer.php';
  ?>
  <!-- <script src="js/jquery-3.5.1.slim.min.js"></script> -->
  <script src="js/bootstrap.bundle.min.js"></script>

  <script >
    $(document).ready(function() {
      $('.list-group-item').click(function(e) {
        e.preventDefault();
        var videoUrl = $(this).data('video');
        $('#player').attr('src', videoUrl);
      });
    });

    
  </script>
  <script>
    $(document).ready(function () {
        var course_id=<?php echo $_GET["course_id"];?>;
        $.ajax({
            type: "post",
            url: "php/contentuploadsOpertion.php",
            data: { function_name: "generateVideoHTML", course_id: course_id },
          
            success: function (response) {
                $("#containerVideo").html(response);
                console.log(response);
                // Get the element to attach the click event
         // Get all elements with the class "iframeclick"

                
            }
            ,complete:function(){
   // Add a click event listener to each iframe element
var iframeElements = document.querySelectorAll('.iframeclick');
var videoElement = document.getElementById('player');

iframeElements.forEach(function(iframeElement) {
  iframeElement.addEventListener('click', function(event) {
    event.preventDefault(); // Prevent the default behavior of the anchor tag

    // Access the data-video attribute of the clicked element
    var dataVideo = event.currentTarget.getAttribute('data-video');
    
    // Pause the video playback
    if (videoElement) {
      videoElement.pause();
    }
    
    // Update the video source and autoplay settings
    if (videoElement) {
      videoElement.src = dataVideo;
      videoElement.autoplay = true; // Disable autoplay
    }

    // Perform any other desired action here when the iframe is clicked
    console.log('Iframe clicked! Data Video:', dataVideo);
    // You can add more code to control the autoplay behavior or any other desired functionality
  });
});

            }
        });
    });
</script>
</body>
</html>