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
  .btn-primary{
    background-color: #6665ee;

  }
</Style>
<body>

  <nav class="navbar navbar-expand-sm navbar-dark bg px-5">
    <div class=" navbar-toggler-icon nav-item mx-3"  data-bs-toggle="offcanvas" data-bs-target="#demolift"> 
    </div>
      <a class="navbar-brand" href="javascript:void(0)">Logo</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
        <span class="navbar-toggler-icon"></span>
      </button>

        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav ">
            <li class="nav-item"><a href="#" class="nav-link">Home</a></li>
            <li  class="nav-item" ><a href="#"  class="nav-link">Topics</a></li>
            <li class="nav-item"><a href="#" class="nav-link">Materials</a></li>
            <li class="nav-item"><a href="#" class="nav-link">Games</a></li>
            <li class="nav-item"><a href="#" class="nav-link">Discussion</a></li>
            <li class="nav-item"><a href="#" class="nav-link">AboutUs</a></li>
            <li class="nav-item"><a href="#" class="nav-link">ContactUs</a></li>
          </ul>
        </div>
        <div class=" d-flex justify-content-center align-items-center ">
          <ul class="nav navbar-nav ">
            <li class="nav-item"><a href="#" class="nav-link text-light "> Sign Up</a></li>
            <li class="nav-item"><a href="#" class="nav-link text-light  ">Login</a></li>
          </ul>
        </div>
        <!-- <form class="d-flex">
          <input class="form-control me-2" type="text" placeholder="Search">
          <button class="btn btn-primary" type="button">Search</button>
        </form> -->
      </div>
    </div>
  </nav>


<!-- 
<div class="offcanvas offcanvas-end" id="demolift">
  <div class="offcanvas-header">
    <h1 class="offcanvas-title">Heading</h1>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
  </div>
  <div class="offcanvas-body">
    <p>Some text lorem ipsum.</p>
    <p>Some text lorem ipsum.</p>
    <p>Some text lorem ipsum.</p>
    <button class="btn btn-secondary" type="button">A Button</button>
  </div>
</div> -->




  <div class="container-fluid " >
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

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>
  <script>
    ClassicEditor
      .create(document.querySelector('.ckeditor'))
      .catch(error => {
        console.error(error);
      });
  </script>
</body>
</html>