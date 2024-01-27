<?php
include('include/header.php');

?>


<?php
include('include/navbar.php')
?>
<style>
  .clear-icon {
    cursor: pointer;
    margin-left: -30px;
  }

  .results {
    position: relative;


  }
  
  a{
      text-decoration: none;
  }

  .search-results {
    height: auto;
    max-height: 400px;
    overflow-y: auto;
  }
</style>
</style>
<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex justify-content-center align-items-center text-center">
  <div class="container position-relative">
    <h1 class="pb-3"> Welcome to LEARNIFY! </h1>
    <div class="row ">
      <div class="container ">
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
                    <a class="dropdown-item filterOption" href="#" data-filter="4">all</a>
                    <a class="dropdown-item filterOption" href="#" data-filter="2">Articals</a>
                    <a class="dropdown-item filterOption" href="#" data-filter="3">Cources</a>
                    <a class="dropdown-item filterOption" href="#" data-filter="1">Books</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- <div class="searchResultsContainer " id="searchResultsContainer" style=" overflow:scroll;z-index:999;"></div> -->
    <div class="rounded results search-results" id="results">

    </div>
  </div>

</section>


<!-- End Hero -->

<main id="main">
<section id="popular-courses" class="courses  p-5 rounded bg-light container-fluid">

<div class="section-title">
  <h2>Courses</h2>
  <p>Popular Courses</p>
</div>
<div class="container-fluid px-0 py-5">
  <div id="contenerCourse"></div>
</div>

</section>
  <!-- ======= About Section ======= -->
  <section id="about" class="about">
    <div class="container" data-aos="fade-up">

      <div class="row">
        <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">
          <img src="assets/img/about.jpg" class="img-fluid rounded " alt="">
        </div>
        <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
          <p> Learnify isn't just another educational platform. It's a refuge for the curious about computer science, a haven for the ambitious, and a launchpad for those who dare to learn smarter and achieve faster. We believe knowledge is power, but that doesn't mean it needs to be heavy or convoluted. Learnify is all about streamlining your learning journey, cutting through the information clutter, and delivering the essentials about computer science that ignite your potential.
            </hp>
          <p class="fst-italic">
            <hp>
              Imagine a curated library built just for you, filled with actionable insights and bite-sized learning hacks. That's what Learnify offers. We dive deep into diverse computer science topics, unpack complex concepts, and translate them into practical skills you can use today.
              <br>
              No matter where you are on your journey, whether you're a novice seeking inspiration or a seasoned seeker sharpening your skills, Leanrify has a place for you.
              <br>
              So, take a deep breath, shed the weight of information overload, and step into the Learnify oasis. Here, you'll find the clarity, the guidance, and the knowledge to unlock your potential and conquer your goals. Welcome to the future of learning, where less is more and knowledge becomes your greatest asset.
            </hp>


        </div>
      </div>

    </div>
  </section><!-- End About Section -->

  <!-- ======= Popular Courses Section ======= -->
  <section id="popular-courses" class="courses  p-5 rounded bg-light container-fluid">

    <div class="section-title">
      <h2>Articals</h2>
      <p>Popular Artical</p>
    </div>
    <div class="container-fluid px-0 py-5">
      <div id="contenerArtical"></div>
    </div>

  </section>

  <!-- End Popular Courses Section -->
  <!-- ======= Counts Section ======= -->
  <section id="counts" class="counts section-bg">
    <div class="container">

      <div class="row counters">

        <div class="col-lg-3 col-6 text-center">
          <span data-purecounter-start="0" data-purecounter-duration="1" id="countBooks" class="purecounter"></span>
          <p>Books</p>
        </div>

        <div class="col-lg-3 col-6 text-center">
          <span data-purecounter-start="0" data-purecounter-duration="1" id="countArticals" class="purecounter"></span>
          <p>Articals</p>
        </div>

        <div class="col-lg-3 col-6 text-center">
          <span data-purecounter-start="0" data-purecounter-duration="1" id="countPublisher" class="purecounter"></span>
          <p>Publishers</p>
        </div>

        <div class="col-lg-3 col-6 text-center">
          <span data-purecounter-start="0" data-purecounter-duration="1" id="countCourse" class="purecounter"></span>
          <p>Courses</p>
        </div>
      </div>

    </div>
  </section><!-- End Counts Section -->

  <!-- ======= Why Us Section ======= -->
  <section id="why-us" class="why-us">
    <div class="container" data-aos="fade-up">

      <div class="row">
        <div class="col-lg-4 d-flex align-items-stretch">
          <div class="content">
            <h3>Why Choose LEARNIFY?</h3>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Duis aute irure dolor in reprehenderit
              Asperiores dolores sed et. Tenetur quia eos. Autem tempore quibusdam vel necessitatibus optio ad corporis.
            </p>
            <div class="text-center">
              <a href="about.html" class="more-btn">Learn More <i class="bx bx-chevron-right"></i></a>
            </div>
          </div>
        </div>
        <div class="col-lg-8 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
          <div class="icon-boxes d-flex flex-column justify-content-center">
            <div class="row">
              <div class="col-xl-4 d-flex align-items-stretch">
                <div class="icon-box mt-4 mt-xl-0">
                  <i class="bx bx-receipt"></i>
                  <h4>Corporis voluptates sit</h4>
                  <p>Consequuntur sunt aut quasi enim aliquam quae harum pariatur laboris nisi ut aliquip</p>
                </div>
              </div>
              <div class="col-xl-4 d-flex align-items-stretch">
                <div class="icon-box mt-4 mt-xl-0">
                  <i class="bx bx-cube-alt"></i>
                  <h4>Ullamco laboris ladore pan</h4>
                  <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt</p>
                </div>
              </div>
              <div class="col-xl-4 d-flex align-items-stretch">
                <div class="icon-box mt-4 mt-xl-0">
                  <i class="bx bx-images"></i>
                  <h4>Labore consequatur</h4>
                  <p>Aut suscipit aut cum nemo deleniti aut omnis. Doloribus ut maiores omnis facere</p>
                </div>
              </div>
            </div>
          </div><!-- End .content-->
        </div>
      </div>

    </div>
  </section><!-- End Why Us Section -->





  <!-- ======= Trainers Section ======= -->
  <section id="trainers" class="trainers  p-5 rounded bg-light container-fluid">
    <div class="section-title ">
      <h2>Books</h2>
      <p>Popular Books</p>
    </div>
    <div id="contenerBooks"></div>
  </section><!-- End Trainers Section -->

</main><!-- End #main -->

<?php
include('include/footer.php')
?>
<script src="searchFolder/searchfile.js"></script>
<script src="js/scriptsearch.js"> </script>
<script src="js/funtionIcludefile.js"></script>
<script src="lib/owlcarousel/owl.carousel.min.js"></script>
<script>
  document.addEventListener("DOMContentLoaded", function() {
    $.ajax({
      type: "POST",
      url: "php/contentuploadsOpertion.php",
      data: {
        function_name: "getContentByType"
      },
      dataType: "json",
      success: function(response) {
        // Log the response to the console for debugging
        console.log(response);

        // Update HTML elements with the received data
        $("#countBooks").attr("data-purecounter-end", response["1"]);
        $("#countArticals").attr("data-purecounter-end", response["2"]);
        $("#countPublisher").attr("data-purecounter-end", response["3"]);
        $("#countCourse").attr("data-purecounter-end", response["4"]);

        // Trigger PureCounter initialization
        $(".purecounter").each(function() {
          var thiss = $(this);
          thiss.pureCounter({
            duration: thiss.attr("data-purecounter-duration"),
            start: thiss.attr("data-purecounter-start"),
            end: thiss.attr("data-purecounter-end")
          });
        });
      },
      error: function(xhr, status, error) {
        console.error(status + ": " + error);
      }
    });
    // Make an AJAX request using jQuery
    $.ajax({
      url: "php/contentuploadsOpertion.php",
      type: "post",
      data: {
        function_name: "generateBooksFromDatabase"
      },
      success: function(response) {
        // Set the articles in the contenerBooks element
        $("#contenerBooks").html(response);

        $('.owl-carousel').owlCarousel({
          loop: true,
          margin: 10,
          nav: true,
          autoplay: true,
          autoplayTimeout: 3000,
          responsive: {
            0: {
              items: 1
            },
            600: {
              items: 3
            },
            1000: {
              items: 5
            }
          },
          navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"]
        });

      },
      complete: function() {
        includeFile('js/main2.js', 'js');
        includeFile('assets/css/style2.css', 'css');

      },
      error: function(xhr, status, error) {
        // Handle error if the AJAX request fails
        console.log("AJAX request failed: " + error);
      }
    });
    $.ajax({
      url: "php/contentuploadsOpertion.php",
      type: "post",
      data: {
        function_name: "generateArticlesFromDatabase"
      },
      success: function(response) {
        // Set the articles in the contenerArtical element
        $("#contenerArtical").html(response);

        $('.owl-carousel').owlCarousel({
          loop: true,
          margin: 10,
          nav: true,
          autoplay: true,
          autoplayTimeout: 3000,
          responsive: {
            0: {
              items: 1
            },
            600: {
              items: 3
            },
            1000: {
              items: 5
            }
          },
          navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"]
        });

      },
      complete: function() {
        includeFile('js/main2.js', 'js');
        includeFile('assets/css/style2.css', 'css');

      },
      error: function(xhr, status, error) {
        // Handle error if the AJAX request fails
        console.log("AJAX request failed: " + error);
      }
    });

    $.ajax({
      url: "php/contentuploadsOpertion.php",
      type: "post",
      data: {
        function_name: "generateCoursesFromDatabase"
      },
      success: function(response) {
        // Set the articles in the contenerCourse element
        $("#contenerCourse").html(response);

        $('.owl-carousel').owlCarousel({
          loop: true,
          margin: 10,
          nav: true,
          autoplay: true,
          autoplayTimeout: 3000,
          responsive: {
            0: {
              items: 1
            },
            600: {
              items: 3
            },
            1000: {
              items: 5
            }
          },
          navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"]
        });

      },
      complete: function() {
        includeFile('js/main2.js', 'js');
        includeFile('assets/css/style2.css', 'css');

      },
      error: function(xhr, status, error) {
        // Handle error if the AJAX request fails
        console.log("AJAX request failed: " + error);
      }
    });
  });

  function truncateText(text, numWords) {
    var words = text.split(' ');
    if (words.length > numWords) {
      var truncatedText = words.slice(0, numWords).join(' ');
      return truncatedText + '...';
    }
    return text;
  }
</script>



</body>


</html>