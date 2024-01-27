<?php
include('include/header.php')
?>
<link rel="stylesheet" href="assets/css/coursestyle.css">

<body>
  <?php
  include 'include/navbar.php';
  ?>

  <section style="padding: 5px 0; margin-bottom:70px;">
    <!-- Nav tabs -->
    <div class="sidebar">
      <div id="containerSubject"></div>
    </div>
  </section>

  <section style="margin-left:20%; " class="pt-0 px-3 ">
    <div class="container p-3 bg-light my-2 rounded border">
      <div class="row ">
        <div class="col-lg-12 col-md-6 ">
          <div class="input-group ">
            <div class="input-group-prepend">
              <button class="btn btn-primary" id="searchButton">
                <i class="uil uil-search"></i>
              </button>
            </div>
            <input type="text" id="searchInput" class="form-control" placeholder="Search...">
            <i class="uil uil-times-circle clear-icon input-group-text px-3" id="clearButton" style="display: none;"></i>
            <div class="input-group-append">
              <div class="dropdown">
                <button class="btn btn-outline-primary dropdown-toggle" id="filterButton" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="uil uil-filter"></i> Filter
                </button>
                <div class="dropdown-menu" aria-labelledby="filterButton">
                  <a class="dropdown-item filterOption" href="#" data-filter="option1">Articals</a>
                  <a class="dropdown-item filterOption" href="#" data-filter="option2">Cources</a>
                  <a class="dropdown-item filterOption" href="#" data-filter="option3">Option 3</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Panale tabs -->
    <div class="tab-content bg rounded-2">
      <div id="java" class="container tab-pane active "><br>
        <h3 class="mb-3 text-light text-center" id="titleSubject"></h3>
        <div class="row">
          <ul class="nav nav-tabs d-flex justify-content-center align-items-center" role="tablist">
            <li class="col-3 md-col-4 p-2 btn btn-primary" id="subArticals2">
              <div class="card" data-bs-toggle="tab" href="#SE-Artical">
                <!-- <div class="card-body">
                                <img src="assets/img/SWE.jpg" alt="" class="img-fluid">
                            </div> -->
                <div class="card-head">
                  Articals
                </div>
              </div>
            </li>
            <li class="col-3 md-col-4 p-2 btn btn-primary" id="subVideos">
              <div class="card" data-bs-toggle="tab" href="#SE-Video">
                <!-- <div class="card-body">
                                <img src="assets/img/SWE.jpg" alt="" class="img-fluid">
                            </div> -->

                <div class="card-head">
                  Cources
                </div>
              </div>
            </li>
            <li class="col-3 md-col-4 p-2 btn btn-primary" id="subBooks">
              <div class="card" data-bs-toggle="tab" href="#SE-Book">
                <!-- <div class="card-body">
                                <img src="assets/img/SWE.jpg" alt="" class="img-fluid">
                            </div> -->
                <div class="card-head">
                  Books
                </div>
              </div>
            </li>

          </ul>
        </div>
      </div>

    </div>

    <div class="tab-content  rounded-2 mt-3 m-0 p-0">
      <div id="SE-Artical" class="container tab-pane  "><br>
        <h3 class="mb-3" id="subtitleArtical"> </h3>
        <div class="container p-0 m-0">
          <div class="row" id="contentArtical2">

          </div>



          <div class="row">
            <div class="clo-6 clo-lg col-sm col-md ">
              <div class="container mt-3 ">
                <div class="container">
                  <div id="contentArtical">

                  </div>
                </div>


                <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> -->
              </div>
            </div>

            <!-- <div class="col-3 side-menu mt-3 rounded-2 text-light scrollable-menu">
                        <h1 class="h3 text-center text-light bg p-3 mt-2  rounded-2 ">Recent Posters</h1>
                        <div id="containerRecentPoster"></div>
                    </div> -->
          </div>
        </div>
      </div>

      <div id="SE-Video" class="container tab-pane  "><br>
        <h3 class="mb-3"> Courses</h3>
        <div id="containerCourses"></div>
        <!-- ======= Cource Details Section ======= -->
        <!-- End Cource Details Section -->
      </div>

      <div id="SE-Book" class="container tab-pane  "><br>
        <h3 class="mb-3"> Books </h3>
        <div class="container">
          <div id="containerbook"></div>
        </div>
      </div>
    </div>
  </section>



  <style>
    footer {
      margin-left: 20%;
    }
  </style>
  <?php
  include('include/footer.php')
  ?>
  <script src="js/scriptsearch.js"> </script>
  <script src="js/funtionIcludefile.js"></script>
  <script src="js/script_subjects2.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>

  <script>
    function fetchArtical() {
      // Make an AJAX request to fetch the course data
      $.ajax({
        url: 'php/contentuploadsOpertion.php',
        type: 'post',
        data: {
          function_name: "select_data",
          content_type: 2
        },
        dataType: "json",
        success: function(data) {
          console.log(data);
          var articlHtml = '';
          // Generate the HTML for each course using the fetched data
          data.forEach(function(artical) {
            articlHtml += `
            <div class="col-lg-4 col-md-6 pb-4">
                <a class="courses-list-item position-relative d-block overflow-hidden mb-2" href="articlesDetails.php?upload_id=${artical.upload_id}">
                    <img class="img-fluid" src="upload_image/${artical.image}" style="width:300px; height:350px;" alt="">
                    <div class="courses-text">
                        <h4 class="text-center text-white px-3">${artical.title}</h4>
                        <div class="border-top w-100 mt-3">
                            <div class="d-flex justify-content-between p-4">
                              
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        `;
          });

          // Append the generated HTML for each course to the container
          $("#contentArtical2").html(articlHtml);
          includeFile('js/main2.js', 'js');
          includeFile('assets/css/style2.css', 'css');
        }
      });
    }
    $(document).ready(function() {
      fetchArtical();
    });
  
    // $.ajax({
    //   url: "php/contentuploadsOpertion.php",
    //   type: "post",
    //   data: {
    //     function_name: "generateArticlesFromDatabase2"
    //   },
    //   success: function(response) {
    //     // Set the articles in the contenerCourse element
    //     $("#contentArtical2").html(response);

    //     $('.owl-carousel').owlCarousel({
    //       loop: true,
    //       margin: 10,
    //       nav: true,
    //       autoplay: true,
    //       autoplayTimeout: 3000,
    //       responsive: {
    //         0: {
    //           items: 1
    //         },
    //         600: {
    //           items: 3
    //         },
    //         1000: {
    //           items: 5
    //         }
    //       },
    //       navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"]
    //     });

    //   },
    //   complete: function() {
    //     includeFile('js/main2.js', 'js');
    //     includeFile('assets/css/style2.css', 'css');

    //   },
    //   error: function(xhr, status, error) {
    //     // Handle error if the AJAX request fails
    //     console.log("AJAX request failed: " + error);
    //   }
    // });
  </script>
  <!-- <script src="lib/owlcarousel/owl.carousel.min.js"></>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script> -->