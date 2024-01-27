<!DOCTYPE html>
<html>
<head>
  <title>Website</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

  <link rel="stylesheet" href="assets/css/discussion.css">
</head>
<Style>
  body{
    
  }
  .navbar-dark{
    background-color: #6665ee;
    color: #fff;
  }
  .bg-dark{
    background-color: #6665ee;
    color: #fff;
  }
  .bg{
    background-color: #6665ee;
  }
  .text-bg{
    color: #6665ee;
  }

 td,tbody,thead{
  border-radius: 7px;
 }
</Style>
<style>
    .sidebar {
      width: 18%;
      height: 100vh;
      position: fixed;
      left: 0;
      top: 0;
      background-color: #f8f9fa;
      overflow-y: auto;
      transition: width 0.3s ease;
      padding: 5px;
    }

    li{
        cursor: pointer;
        border-radius: 5px;
        margin-bottom: 5px;
        box-shadow: none; 
        transition: box-shadow 0.3s;
    }
    li:hover{
        box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.3);
    }
    .nav-item {
      padding: 10px 20px;
      transition: background-color 0.3s ease;
    }

    .nav-item:hover {
      background-color: #e9ecef;
    
    }

    .nav-link {
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .nav-link i {
      font-size: 20px;
    }

    .content {
      margin-left: 20%;
      padding: 20px;
      transition: margin-left 0.3s ease;
    }

    .content.active {
      margin-left: 25%;
    }



    @media (max-width: 767px) {
    .card {
      width: 100%;
      max-width: 200px;
     margin-left: 2px; /* تحديد العرض الأقصى للكارد */
    }

  .card .card-body {
      padding: 2px; /* ضبط حجم الهامش الداخلي للكارد بادي وأعلى */
    }

    .card .card-body img,
    .card .card-body span {
      display: none;
    }

    .card .card-body:hover span {
      display: none;
    }

    .nav-tabs .nav-item .nav-link {
      padding:0; 
      margin: 0;/* ضبط حجم الهامش الداخلي للروابط في الناف بادين */
      font-size: 10px; /* تصغير حجم الخط في الروابط في الناف بادين */
    }
  }
  
 
  </style>
<?php 
 include('include/header.php')
 ?> 

<style>
    .sectionof{
        padding: 0;
        margin: 0;
    }
</style>

<section style="padding: 5px 0;"  >
    <!-- Nav tabs -->
    <div class="sidebar" >
    <ul class="nav flex-column">
        <li >
            <div class="card mb-1" data-bs-toggle="tab" href="#java">
            <div class="card-body">
                <img src="assets/img/java.jpg" alt="" class="img-fluid">
            </div>
            <div class="card-head text-center pb-2 ">
                Java  
            </div>
            </div>
        </li>
        <li >
            <div class="card mb-1" data-bs-toggle="tab" href="#DLD">
            <div class="card-body">
                <img src="assets/img/DLD.jpg" alt="" class="img-fluid">
            </div>
            <div class="card-head text-center pb-2 ">
                Digital Logic Design
            </div>
            </div>
        </li>
        <li >
            <div class="card mb-1" data-bs-toggle="tab" href="#SE">
            <div class="card-body">
                <img src="assets/img/SWE.jpg" alt="" class="img-fluid">
            </div>
            <div class="card-head text-center pb-2 ">
                Software Engineering
            </div>
            </div>
      
        </li>
    </ul>
    </div>
</section>

<section style="margin-left:20%; padding: 5px 0;">
     <!-- Panale tabs -->
        <div class="tab-content bg rounded-2">
            <div id="java" class="container tab-pane active "><br>
                <h3 class="mb-3 text-light text-center">Java</h3> 
                <div class="row">
                    <ul class="nav nav-tabs d-flex justify-content-center align-items-center" role="tablist">
                        <li class="col-3 md-col-4 p-2 btn btn-primary">
                            <div class="card" data-bs-toggle="tab" href="#SE-Artical">
                                <div class="card-body">
                                    <img src="assets/img/SWE.jpg" alt="" class="img-fluid">
                                </div>
                                <div class="card-head">
                                    Articals
                                </div>
                            </div>
                        </li>
                        <li class="col-3 md-col-4 p-2 btn btn-primary">
                            <div class="card" data-bs-toggle="tab" href="#SE-Video">
                                <div class="card-body">
                                    <img src="assets/img/SWE.jpg" alt="" class="img-fluid">
                                </div>

                                <div class="card-head">
                                    Videos
                                </div>
                            </div>
                        </li>
                        <li class="col-3 md-col-4 p-2 btn btn-primary">
                            <div class="card" data-bs-toggle="tab" href="#SE-Book">
                                <div class="card-body">
                                    <img src="assets/img/SWE.jpg" alt="" class="img-fluid">
                                </div>
                                <div class="card-head">
                                    Books
                                </div>
                            </div>
                        </li>

                    </ul>
                </div>
            </div>

            <div id="DLD" class="container tab-pane  "><br>
                <h3 class="mb-3"> Digital Logic Design</h3> 
                <div class="row">
                    <ul class="nav nav-tabs d-flex justify-content-center align-items-center" role="tablist">
                        <li class="col-3 md-col-4 p-2 btn btn-primary">
                        Add Articals
                        </li>
                        <li class="col-3 md-col-4 p-2 btn btn-primary">
                            Add video
                        </li>
                        <li class="col-3 md-col-4 p-2 btn btn-primary">
                            Add books
                        </li>

                    </ul>
                </div>
            </div>

            <div id="SE" class="container tab-pane  "><br>
                <h3 class="mb-3">Softwear Engineering</h3> 
                <div class="row">
                    <ul class="nav nav-tabs d-flex justify-content-center align-items-center" role="tablist">
                        <li class="col-3 md-col-4 p-2 btn btn-primary">
                            <div class="card" data-bs-toggle="tab" href="#SE-Artical">
                                <div class="card-body">
                                    <img src="assets/img/SWE.jpg" alt="" class="img-fluid">
                                </div>

                                <div class="card-head">
                                    Articals
                                </div>
                            </div>
                        </li>
                        <li class="col-3 md-col-4 p-2 btn btn-primary">
                            <div class="card" data-bs-toggle="tab" href="#SE-Video">
                                <div class="card-body">
                                    <img src="assets/img/SWE.jpg" alt="" class="img-fluid">
                                </div>

                                <div class="card-head">
                                    Videos
                                </div>
                            </div>
                        </li>
                        <li class="col-3 md-col-4 p-2 btn btn-primary">
                            <div class="card" data-bs-toggle="tab" href="#SE-Book">
                                <div class="card-body">
                                    <img src="assets/img/SWE.jpg" alt="" class="img-fluid">
                                </div>
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
                    <h3 class="mb-3"> SW Artical</h3> 
                    <div class="container p-0 m-0" >
                        <div class="row">
                            <div class="col-3 side-menu offcanvas offcanvas-end " id="demolift">
                                <button type="button" class="btn-close m-2" data-bs-dismiss="offcanvas"></button> 
                                <div class="profile">
                                <img src="images/1.jpg" alt="Profile Picture" class="profile-picture">
                                <h4 class="profile-name">John Doe</h4>
                                <p class="profile-email">johndoe@example.com</p>
                                </div>
                                <ul class="menu">
                                <li><button class="menu-button">Menu Item 1</button></li>
                                <li><button class="menu-button">Menu Item 2</button></li>
                                <li><button class="menu-button">Menu Item 3</button></li>
                                <li><button class="menu-button">Menu Item 4</button></li>
                                </ul>
                            </div>

                            <div class="clo-6 clo-lg col-sm col-md scrollable-menu ">
                                <div class="container mt-3 ">
                                <div class="container bg text-light pb-3 rounded">
                                    <h2>Toggleable Tabs</h2>
                                    <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Something clever..">
                                    <button class="btn btn-primary" type="button">OK</button>
                                    <button class="btn btn-danger" type="button">Cancel</button>
                                    </div>
                                </div>

                                <div class="container">
                                    <header>
                                    <h1>Web Development</h1>
                                    </header>
                                    <main>
                                    <article>
                                        <h4>Introduction</h4>
                                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aperiam cum doloribus consequatur corporis obcaecati maxime hic aut. Cumque beatae voluptates et exercitationem? Aut vero adipisci optio expedita laboriosam dolor sint labore. Molestiae dolores et atque fugiat quaerat nostrum hic, expedita ipsum quibusdam fuga, magni dolor unde neque repudiandae laboriosam! A alias aut repudiandae ipsum. Dolorem sunt voluptates provident corrupti fugit, illo obcaecati minima excepturi praesentium, eveniet velit repellat nesciunt temporibus maiores ipsum porro saepe nobis? Quo nesciunt tempore assumenda temporibus quasi magnam, ipsum laborum sequi atque animi. Error nostrum, fugiat, itaque officiis porro, odio minus quam rerum eos rem vel? Eaque enim debitis ex praesentium beatae consectetur ipsum neque consequuntur quia voluptatum soluta modi, aspernatur magnam at optio voluptatem incidunt blanditiis quam iste atque ullam. Quaerat distinctio eaque totam officiis ex, ducimus placeat cupiditate impedit exercitationem perferendis, est veniam? Officia voluptatem dolore dolores doloribus animi, tempora recusandae placeat porro id!</p>
                                
                                        <h4>Web Design</h4>
                                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Illum sequi, quo enim at in optio tempora fuga corrupti tenetur dolorum sapiente aspernatur recusandae. Amet voluptatibus placeat laudantium expedita obcaecati blanditiis quae atque numquam unde quisquam cum nostrum explicabo libero assumenda qui distinctio sapiente vel asperiores iusto, rem dicta consectetur ipsa?</p>
                                
                                        <h4>Frontend Development</h4>
                                        <p>Proin ultricies dapibus urna, vitae placerat diam pulvinar accumsan.</p>
                                
                                        <h4>Backend Development</h4>
                                        <p>In hac habitasse platea dictumst. Maecenas vel ipsum sed est gravida ullamcorper.</p>
                                    </article>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="read-count">Reads: <span id="read-count">0</span></div>
                                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#commentModal">Add Comment</button>
                                    </div>
                                    <section>
                                        <h2>User Comments</h2>
                                        <div class="container p-3 m-2 ">
                                        <div class="row bg-light m-2" >
                                            <div class="col-2">
                                            <img src="images/1.jpg" alt="User Profile Image" class="img-fluid rounded-circle " width="90px">
                                            </div>
                                            <div class="col-10">
                                            <div class="row">
                                                <strong>John Doe</strong> 
                                                <small>December 25, 2023 10:30 AM </small>
                                            </div>
                                            <div class="row">
                                            <p> This is a sample comment.</p>
                                            </div>
                                            </div>
                                        </div>
                                        <div class="row bg-light m-2" >
                                            <div class="col-2">
                                            <img src="images/1.jpg" alt="User Profile Image" class="img-fluid rounded-circle " width="90px">
                                            </div>
                                            <div class="col-10">
                                            <div class="row">
                                                <strong>John Doe</strong> 
                                                <small>December 25, 2023 10:30 AM </small>
                                            </div>
                                            <div class="row">
                                            <p> This is a sample comment.</p>
                                            </div>
                                            </div>
                                        </div>
                                        <div class="row bg-light m-2" >
                                            <div class="col-2">
                                            <img src="images/1.jpg" alt="User Profile Image" class="img-fluid rounded-circle " width="90px">
                                            </div>
                                            <div class="col-10">
                                            <div class="row">
                                                <strong>John Doe</strong> 
                                                <small>December 25, 2023 10:30 AM </small>
                                            </div>
                                            <div class="row">
                                            <p> This is a sample comment.</p>
                                            </div>
                                            </div>
                                        </div>
                                        </div>
                                    </section>
                                    </main>
                            
                                </div>
                                
                                <!-- Comment Modal -->
                                <div class="modal fade" id="commentModal" tabindex="-1" aria-labelledby="commentModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="commentModalLabel">Add Comment</h5>
                                        <button type="button" class="btn-close " data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                        <form>
                                            <div class="mb-3">
                                            <label for="comment" class="form-label">Comment</label>
                                            <textarea class="form-control" id="comment" rows="3" required></textarea>
                                            </div>
                                            <div class="mb-3">
                                            <div class="row">
                                                <div class="col-6">
                                                <button type="submit" class="btn btn-primary w-100 ">Send </button>
                                                </div>
                                                <div class="col-6">
                                                <button type="button" class="btn btn-secondary w-100 " data-bs-dismiss="modal">Cancel</button>                        </div>
                                            </div>
                                            </div>
                                        </form>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                
                                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
                                </div>
                            </div>

                            <div class="col-3 side-menu mt-3 rounded-2 text-light scrollable-menu">
                                <h1 class="h3 text-center text-light bg p-3 mt-2  rounded-2 ">Recent Posters</h1>
                                <ul class="menu bg p-2 rounded">
                                <li class="mt-2">
                                    <a href="" class="link nav-link">
                                    <div class="subject text-bg bg-light ">
                                    <img src="images/1.jpg" alt="Profile Picture" class="subject-picture ">
                                    <h4 >Title Of Post By the users</h4>
                                    <p >Description Of Post : In this post you will read some topics</p>
                                    </div>
                                    </a>
                                </li>
                                <li class="mt-2">
                                    <a href="" class="link nav-link">
                                    <div class="subject text-bg bg-light ">
                                    <img src="images/1.jpg" alt="Profile Picture" class="subject-picture ">
                                    <h4 >Title Of Post By the users</h4>
                                    <p >Description Of Post : In this post you will read some topics</p>
                                    </div>
                                    </a>
                                </li>
                                <li class="mt-2">
                                    <a href="" class="link nav-link">
                                    <div class="subject text-bg bg-light ">
                                    <img src="images/1.jpg" alt="Profile Picture" class="subject-picture ">
                                    <h4 >Title Of Post By the users</h4>
                                    <p >Description Of Post : In this post you will read some topics</p>
                                    </div>
                                    </a>
                                </li>
                                <li class="mt-2">
                                    <a href="" class="link nav-link">
                                    <div class="subject text-bg bg-light ">
                                    <img src="images/1.jpg" alt="Profile Picture" class="subject-picture ">
                                    <h4 >Title Of Post By the users</h4>
                                    <p >Description Of Post : In this post you will read some topics</p>
                                    </div>
                                    </a>
                                </li>
                                <li class="mt-2">
                                    <a href="" class="link nav-link">
                                    <div class="subject text-bg bg-light ">
                                    <img src="images/1.jpg" alt="Profile Picture" class="subject-picture ">
                                    <h4 >Title Of Post By the users</h4>
                                    <p >Description Of Post : In this post you will read some topics</p>
                                    </div>
                                    </a>
                                </li>
                                <li class="mt-2">
                                    <a href="" class="link nav-link">
                                    <div class="subject text-bg bg-light ">
                                    <img src="images/1.jpg" alt="Profile Picture" class="subject-picture ">
                                    <h4 >Title Of Post By the users</h4>
                                    <p >Description Of Post : In this post you will read some topics</p>
                                    </div>
                                    </a>
                                </li>
                                <li class="mt-2">
                                    <a href="" class="link nav-link">
                                    <div class="subject text-bg bg-light ">
                                    <img src="images/1.jpg" alt="Profile Picture" class="subject-picture ">
                                    <h4 >Title Of Post By the users</h4>
                                    <p >Description Of Post : In this post you will read some topics</p>
                                    </div>
                                    </a>
                                </li>

                                </ul>
                            </div>
                        </div>
                    </div>
            </div>

            <div id="SE-Video" class="container tab-pane  "><br>
                    <h3 class="mb-3"> Videos</h3> 
                        <!-- ======= Cource Details Section ======= -->
                    
                    <div class="container" >
                        <div class="container">
                            <div class="row">
                            <div class="col-lg-4">
                                <div class="embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item rounded" src="https://www.youtube.com/embed/VIDEO_ID"></iframe>
                                </div>
                                <h2>Video Title</h2>
                                <p>Video Description</p>
                            </div>
                            <div class="col-lg-4">
                                <div class="embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item rounded" src="https://www.youtube.com/embed/VIDEO_ID"></iframe>
                                </div>
                                <h2>Video Title</h2>
                                <p>Video Description</p>
                            </div>
                            <div class="col-lg-4">
                                <div class="embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item rounded" src="https://www.youtube.com/embed/VIDEO_ID"></iframe>
                                </div>
                                <h2>Video Title</h2>
                                <p>Video Description</p>
                            </div>

                            </div>
                        </div>
                    </div>
                    <div class="container" >
                        <div class="container">
                            <div class="row">
                            <div class="col-lg-4">
                                <div class="embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item rounded" src="https://www.youtube.com/embed/VIDEO_ID"></iframe>
                                </div>
                                <h2>Video Title</h2>
                                <p>Video Description</p>
                            </div>
                            <div class="col-lg-4">
                                <div class="embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item rounded" src="https://www.youtube.com/embed/VIDEO_ID"></iframe>
                                </div>
                                <h2>Video Title</h2>
                                <p>Video Description</p>
                            </div>
                            <div class="col-lg-4">
                                <div class="embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item rounded" src="https://www.youtube.com/embed/VIDEO_ID"></iframe>
                                </div>
                                <h2>Video Title</h2>
                                <p>Video Description</p>
                            </div>

                            </div>
                        </div>
                    </div>
                    <div class="container" >
                        <div class="container">
                            <div class="row">
                            <div class="col-lg-4">
                                <div class="embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item rounded" src="https://www.youtube.com/embed/VIDEO_ID"></iframe>
                                </div>
                                <h2>Video Title</h2>
                                <p>Video Description</p>
                            </div>
                            <div class="col-lg-4">
                                <div class="embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item rounded" src="https://www.youtube.com/embed/VIDEO_ID"></iframe>
                                </div>
                                <h2>Video Title</h2>
                                <p>Video Description</p>
                            </div>
                            <div class="col-lg-4">
                                <div class="embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item rounded" src="https://www.youtube.com/embed/VIDEO_ID"></iframe>
                                </div>
                                <h2>Video Title</h2>
                                <p>Video Description</p>
                            </div>

                            </div>
                        </div>
                    </div>

                    <!-- End Cource Details Section -->
            </div>

            <div id="SE-Book" class="container tab-pane  "><br>
                <h3 class="mb-3">  Books </h3> 
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card">
                            <img src="assets/img/course-details.jpg" class="card-img-top" alt="Book 1">
                            <div class="card-body">
                                <h5 class="card-title">Book 1 Title</h5>
                                <p class="card-text">Book 1 Description</p>
                                <a href="#" class="btn btn-primary">View Book</a>
                                <a href="#" class="btn btn-secondary">Download Book</a>
                            </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card">
                            <img src="assets/img/course-details.jpg" class="card-img-top" alt="Book 2">
                            <div class="card-body">
                                <h5 class="card-title">Book 2 Title</h5>
                                <p class="card-text">Book 2 Description</p>
                                <a href="#" class="btn btn-primary">View Book</a>
                                <a href="#" class="btn btn-secondary">Download Book</a>
                            </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card">
                            <img src="assets/img/course-details.jpg" class="card-img-top" alt="Book 3">
                            <div class="card-body">
                                <h5 class="card-title">Book 3 Title</h5>
                                <p class="card-text">Book 3 Description</p>
                                <a href="#" class="btn btn-primary bg">View Book</a>
                                <a href="#" class="btn btn-secondary">Download Book</a>
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card">
                            <img src="assets/img/course-details.jpg" class="card-img-top" alt="Book 1">
                            <div class="card-body">
                                <h5 class="card-title">Book 1 Title</h5>
                                <p class="card-text">Book 1 Description</p>
                                <a href="#" class="btn btn-primary">View Book</a>
                                <a href="#" class="btn btn-secondary">Download Book</a>
                            </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card">
                            <img src="assets/img/course-details.jpg" class="card-img-top" alt="Book 2">
                            <div class="card-body">
                                <h5 class="card-title">Book 2 Title</h5>
                                <p class="card-text">Book 2 Description</p>
                                <a href="#" class="btn btn-primary">View Book</a>
                                <a href="#" class="btn btn-secondary">Download Book</a>
                            </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card">
                            <img src="assets/img/course-details.jpg" class="card-img-top" alt="Book 3">
                            <div class="card-body">
                                <h5 class="card-title">Book 3 Title</h5>
                                <p class="card-text">Book 3 Description</p>
                                <a href="#" class="btn btn-primary bg">View Book</a>
                                <a href="#" class="btn btn-secondary">Download Book</a>
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card">
                            <img src="assets/img/course-details.jpg" class="card-img-top" alt="Book 1">
                            <div class="card-body">
                                <h5 class="card-title">Book 1 Title</h5>
                                <p class="card-text">Book 1 Description</p>
                                <a href="#" class="btn btn-primary">View Book</a>
                                <a href="#" class="btn btn-secondary">Download Book</a>
                            </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card">
                            <img src="assets/img/course-details.jpg" class="card-img-top" alt="Book 2">
                            <div class="card-body">
                                <h5 class="card-title">Book 2 Title</h5>
                                <p class="card-text">Book 2 Description</p>
                                <a href="#" class="btn btn-primary">View Book</a>
                                <a href="#" class="btn btn-secondary">Download Book</a>
                            </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card">
                            <img src="assets/img/course-details.jpg" class="card-img-top" alt="Book 3">
                            <div class="card-body">
                                <h5 class="card-title">Book 3 Title</h5>
                                <p class="card-text">Book 3 Description</p>
                                <a href="#" class="btn btn-primary bg">View Book</a>
                                <a href="#" class="btn btn-secondary">Download Book</a>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
 
    

<style>
    footer{
    margin-left: 20%;
}
</style>
<?php 
include('include/footer.php')
?> 