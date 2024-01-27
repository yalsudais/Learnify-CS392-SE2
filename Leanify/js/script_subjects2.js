function loadSubjectsToUser() {
    $.ajax({
      type: "POST",
      url: "php/subjectsOpertion.php",
      data: { function_name: "showSubject" },
      dataType: "text",
      success: function (response) {
        $("#containerSubject").html(response);
        // Get the elements with the class 'showSub'
        var showSubElements = $('.showSub');
        var subjectId = '';
        var subjectName='';
        // Attach a click event listener to each element
        showSubElements.on('click', function (event) {
            subjectName = $(this).data('subjectName');
          // Get the subject ID and subject name from the selected element
          subjectId = $(this).data('id');
         subjectName = this.getAttribute('data-subjectName');
          // Update the titleSubject element
          var titleSubjectElement = document.getElementById('titleSubject');
          titleSubjectElement.innerText = subjectName;

          $('#titleSubject').data('id', subjectId);
        });
  
        showSubElements.eq(0).click();
      }
    });
  }
  
  function loadRecentrtical() {
    var subject_id = $("#titleSubject").data("id");
    
    $.ajax({
      type: "POST",
      url: "php/contentuploadsOpertion.php",
      data: { function_name: "showArtical", subject_id: subject_id },
      dataType: "text",
      success: function (response) {
        console.log("recent" + response);
        $("#containerRecentPoster").html(response);
      }
    });
  }
  
  // function loadArtical() {
  //   var subject_id = $("#titleSubject").data("id");

  //   $.ajax({
  //     type: "POST",
  //     url: "php/contentuploadsOpertion.php",
  //     data: { function_name: "generateArticleFromDatabase", subject_id: subject_id },
  //     dataType: "text",
  //     success: function (response) {
  //       console.log(response);
  //       $("#contentArtical").html(response);
  //     }
  //   });
  // }
  
  function fetchCourses() {
    var subject_id = $("#titleSubject").data("id");
    $.ajax({
      url: 'php/coursesOpertion.php',
      type: 'post',
      data: { function_name: "select_data", subject_id: subject_id },
      dataType: "json",
      success: function (data) {
        var courseHtml = '';
        data.forEach(function (course) {
          courseHtml += `
            <div class="col-lg-4 col-md-6 pb-4">
                <a class="courses-list-item position-relative d-block overflow-hidden mb-2" href="detail.php?course_id=${course.course_id}">
                    <img class="img-fluid" src="upload_image/${course.course_banner_image}" style="width:300px; height:350px;" alt="">
                    <div class="courses-text">
                        <h4 class="text-center text-white px-3">${course.course_name}</h4>
                        <div class="border-top w-100 mt-3">
                           
                        </div>
                    </div>
                </a>
            </div>
          `;
        });
  
        $("#containerCourses").html(courseHtml);
      }
    });
  }
  
  document.addEventListener('DOMContentLoaded', function () {
    loadSubjectsToUser();
  
    let subArtical = document.getElementById("subArticals2");
    subArtical.addEventListener("click", function () {
      // loadArtical();
      loadRecentrtical();
    });
  
    let subBooks = document.getElementById("subBooks");
    subBooks.addEventListener("click", function () {
      loadBooks();
    });
   
    let subVideos = document.getElementById("subVideos");
    subVideos.addEventListener("click", function () {
      loadCourses();
    });
    // fetchCourses();
  });
  
  document.addEventListener('DOMContentLoaded', function () {
    
  });
function  loadCourses()
{
    var subject_id = $("#titleSubject").data("id");
  
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'php/coursesOpertion.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  
    xhr.onreadystatechange = function () {
      if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
          var response = xhr.responseText;
          document.getElementById("containerCourses").innerHTML = response;
          includeFile('js/main2.js', 'js');
          includeFile('assets/css/style2.css', 'css');
          
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
        
        } else {
          console.log('Error occurred while fetching course data.');
        }
      }
    };
  
    var requestBody = 'function_name=generateCoursesHTMLDetails&subject_id=' + subject_id;
    xhr.send(requestBody);
}
  
  function loadBooks() {
    var subject_id = $("#titleSubject").data("id");
  
    $.ajax({
      type: "post",
      url: "php/contentuploadsOpertion.php",
      data: { function_name: "generateBookData", subject_id: subject_id },
      success: function (response) {
        $("#containerbook").html(response);
      }
    });
  }