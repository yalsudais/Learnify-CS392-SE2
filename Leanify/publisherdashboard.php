<?php 
 include('include/header.php')
 ?> 


 <?php 
 include('include/navbar.php')
 ?> 


<!-- <Style>
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
</Style> -->


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
          <div class="container bg text-light py-3 rounded">
            <!-- <h2>Toggleable Tabs</h2> -->
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Something clever..">
              <button class="btn btn-primary" type="button">OK</button>
              <button class="btn btn-danger" type="button">Cancel</button>
            </div>
          </div>
          <br>
          <!-- Nav tabs -->
          <ul class="nav nav-tabs d-flex justify-content-center align-items-center" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" data-bs-toggle="tab" href="#all-posters"> All Content </a>
            </li>
  
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="tab" href="#add-artical">
              Create New Artical 
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="tab" href="#add-video">
              Create New video
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="tab" href="#add-quize">
              Create New Quize
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="tab" href="#add-books">
              Add New Books
              </a>
            </li>
          </ul>
        
          <!-- Tab panes -->
        <div class="tab-content bg rounded-2">
          <div id="all-posters" class="container tab-pane active "><br>
              <h3 class="mb-3">All Posters</h3>
              
            <div class="container bg-light rounded mb-3">
                <ul class="nav navbar">
                  <li class="nav-item">
                    <a href="" class="nav-link">
                      <div class="row mt-2">
                        <div class="col-1">
                          <img src="images/1.jpg" alt="" class="img-fluid rounded-circle" >
                        </div>
                        <div class="col-5">
                          <p class="h1 "> Titel of the Poster</p>
                          <p class="h6">  20-5-2023 , 10:30:00 PM</p>
                        </div>
                        
                        <div class="col-3 text-center">
                          <p class="h5"> likes </p>
                          <p class="h6"> 245 </p>
                        </div>
      
                        <div class="col-3 text-center">
                          <p class="h5"> Views </p>
                          <p class="h6"> 245 </p>
                        </div>
                      </div>
                    </a>
                  </li>
                </ul>
            </div>
              
              <div class="container bg-light rounded mb-3">
                <ul class="nav navbar">
                  <li class="nav-item">
                    <a href="" class="nav-link">
                      <div class="row mt-2">
                        <div class="col-1">
                          <img src="images/1.jpg" alt="" class="img-fluid rounded-circle" >
      
                        </div>
      
                        <div class="col-5">
                          <p class="h1 "> Titel of the Poster</p>
                          <p class="h6">  20-5-2023 , 10:30:00 PM</p>
                        </div>
                        
                        <div class="col-3 text-center">
                          <p class="h5"> likes </p>
                          <p class="h6"> 245 </p>
                        </div>
      
                        <div class="col-3 text-center">
                          <p class="h5"> Views </p>
                          <p class="h6"> 245 </p>
                        </div>
                      </div>
                    </a>
                  </li>
                </ul>
              </div>
              
              <div class="container bg-light rounded mb-3">
                <ul class="nav navbar">
                  <li class="nav-item">
                    <a href="" class="nav-link">
                      <div class="row mt-2">
                        <div class="col-1">
                          <img src="images/1.jpg" alt="" class="img-fluid rounded-circle" >
      
                        </div>
      
                        <div class="col-5">
                          <p class="h1 "> Titel of the Poster</p>
                          <p class="h6">  20-5-2023 , 10:30:00 PM</p>
                        </div>
                        
                        <div class="col-3 text-center">
                          <p class="h5"> likes </p>
                          <p class="h6"> 245 </p>
                        </div>
      
                        <div class="col-3 text-center">
                          <p class="h5"> Views </p>
                          <p class="h6"> 245 </p>
                        </div>
                      </div>
                    </a>
                  </li>
                </ul>
              </div>
              
              <div class="container bg-light rounded mb-3">
                <ul class="nav navbar">
                  <li class="nav-item">
                    <a href="" class="nav-link">
                      <div class="row mt-2">
                        <div class="col-1">
                          <img src="images/1.jpg" alt="" class="img-fluid rounded-circle" >
      
                        </div>
      
                        <div class="col-5">
                          <p class="h1 "> Titel of the Poster</p>
                          <p class="h6">  20-5-2023 , 10:30:00 PM</p>
                        </div>
                        
                        <div class="col-3 text-center">
                          <p class="h5"> likes </p>
                          <p class="h6"> 245 </p>
                        </div>
      
                        <div class="col-3 text-center">
                          <p class="h5"> Views </p>
                          <p class="h6"> 245 </p>
                        </div>
                </div>
                    </a>
                  </li>
                </ul>
              </div>
              
              <div class="container bg-light rounded mb-3">
                <ul class="nav navbar">
                  <li class="nav-item">
                    <a href="" class="nav-link">
                      <div class="row mt-2">
                        <div class="col-1">
                          <img src="images/1.jpg" alt="" class="img-fluid rounded-circle" >
      
                        </div>
      
                        <div class="col-5">
                          <p class="h1 "> Titel of the Poster</p>
                          <p class="h6">  20-5-2023 , 10:30:00 PM</p>
                        </div>
                        
                        <div class="col-3 text-center">
                          <p class="h5"> likes </p>
                          <p class="h6"> 245 </p>
                        </div>
      
                        <div class="col-3 text-center">
                          <p class="h5"> Views </p>
                          <p class="h6"> 245 </p>
                        </div>
                      </div>
                    </a>
                  </li>
                </ul>
              </div>
          </div>

          <div id="add-artical" class="container tab-pane fade"><br>
              <h3>Add New Article</h3>

              <div class="row">
                <div class="col-sm-12 col-md-12 ">
                  <button class="btn btn-primary w-100" id="addBookButton" data-bs-toggle="modal" data-bs-target="#articleModal"> Add Article </button>

                  <div class="modal fade" id="articleModal" tabindex="-1" role="dialog" aria-labelledby="articleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                          <div class="modal-content">
                              <div class="modal-header">
                                  <h5 class="modal-title" id="questionModalLabel"> Add article </h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                              <form >
                                  <div class="form-group">
                                    <label for="articleCategory " class="h6 text-light"> Select Type </label>
                                    <select class="form-control" id="articleCategory">
                                        <option value="CS1"> Web Desgining </option>
                                        <option value="CS2"> Mobile Programming  </option>
                                        <option value="CS3"> Softwear Engineering </option>
                                    </select>
                                </div>
                                <div class="form-floating mb-1 mt-3">
                                  <input type="text" class="form-control" id="title" placeholder="Enter Title Of post" name="title">
                                  <label for="title">Title Of Video</label>
                                </div>
                                <div class="form-floating mb-1 mt-3">
                                  <textarea class="form-control ckeditor h-100" id="description" placeholder="Enter Description Of post" name="description" rows="10"></textarea>
                                  <label for="description"></label>
                                </div>
                                <div class="form-floating mb-1 mt-3">
                                  <input type="file" class="form-control" id="image" name="image">
                                  <label for="image"></label>
                                </div>
                              </form>
                              </div>
                              <div class="m-3">
                                <div class="row">
                                  <div class="col-6">
                                    <button type="submit" class="btn btn-primary w-100 "> Add Video</button>
                                  </div>
                                  <div class="col-6">
                                    <button type="button" class="btn btn-secondary w-100 " data-bs-dismiss="modal">Cancel</button>                        </div>
                                </div>
                              </div>
                          </div>
                      </div>
                  </div>

                </div>

                <div class="col-sm-12 col-md-12 ">
                  <h3 class="text-light mb-4"> Qustions List</h3>
                  <table class="table  ">
                    <thead class="thead-dark ">
                        <tr>
                            <th scope="col">Question</th>
                            <th scope="col">Correct Answer</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Question 1</td>
                            <td>Answer 1</td>
                            <td>
                                <button class="btn btn-danger">Delete</button>
                                <button class="btn btn-primary">Edit</button>
                            </td>
                        </tr>
                        <tr>
                            <td>Question 2</td>
                            <td>Answer 2</td>
                            <td>
                                <button class="btn btn-danger">Delete</button>
                                <button class="btn btn-primary">Edit</button>
                            </td>
                        </tr>
                        <tr>
                            <td>Question 3</td>
                            <td>Answer 3</td>
                            <td>
                                <button class="btn btn-danger">Delete</button>
                                <button class="btn btn-primary">Edit</button>
                            </td>
                        </tr>
                    </tbody>
                  </table>
                </div>
              </div>

          </div>

          <div id="add-video" class="container tab-pane fade"><br>
          
              <h3>Add New Video</h3>
              <div class="row">
                <div class="col-sm-12 col-md-12 ">
                  <button class="btn btn-primary w-100" id="addBookButton" data-bs-toggle="modal" data-bs-target="#videoModal"> Add Video </button>

                  <div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="videoModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                          <div class="modal-content">
                              <div class="modal-header">
                                  <h5 class="modal-title" id="questionModalLabel"> Add Video </h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                              <form >
                                  <div class="form-group">
                                    <label for="articleCategory " class="h6 text-light"> Select Type </label>
                                    <select class="form-control" id="articleCategory">
                                        <option value="CS1"> Web Desgining </option>
                                        <option value="CS2"> Mobile Programming  </option>
                                        <option value="CS3"> Softwear Engineering </option>
                                    </select>
                                </div>
                                <div class="form-floating mb-1 mt-3">
                                  <input type="text" class="form-control" id="title" placeholder="Enter Title Of post" name="title">
                                  <label for="title">Title Of Video</label>
                                </div>
                                <div class="form-floating mb-1 mt-3">
                                  <textarea class="form-control ckeditor h-100" id="description" placeholder="Enter Description Of post" name="description" rows="10"></textarea>
                                  <label for="description"></label>
                                </div>
                                <div class="form-floating mb-1 mt-3">
                                  <input type="file" class="form-control" id="image" name="image">
                                  <label for="image"></label>
                                </div>
                              </form>
                              </div>
                              <div class="m-3">
                                <div class="row">
                                  <div class="col-6">
                                    <button type="submit" class="btn btn-primary w-100 "> Add Video</button>
                                  </div>
                                  <div class="col-6">
                                    <button type="button" class="btn btn-secondary w-100 " data-bs-dismiss="modal">Cancel</button>                        </div>
                                </div>
                              </div>
                          </div>
                      </div>
                  </div>

                </div>

                <div class="col-sm-12 col-md-12 ">
                  <h3 class="text-light mb-4"> Qustions List</h3>
                  <table class="table  ">
                    <thead class="thead-dark ">
                        <tr>
                            <th scope="col">Question</th>
                            <th scope="col">Correct Answer</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Question 1</td>
                            <td>Answer 1</td>
                            <td>
                                <button class="btn btn-danger">Delete</button>
                                <button class="btn btn-primary">Edit</button>
                            </td>
                        </tr>
                        <tr>
                            <td>Question 2</td>
                            <td>Answer 2</td>
                            <td>
                                <button class="btn btn-danger">Delete</button>
                                <button class="btn btn-primary">Edit</button>
                            </td>
                        </tr>
                        <tr>
                            <td>Question 3</td>
                            <td>Answer 3</td>
                            <td>
                                <button class="btn btn-danger">Delete</button>
                                <button class="btn btn-primary">Edit</button>
                            </td>
                        </tr>
                    </tbody>
                  </table>
                </div>
              </div>

          </div>

          <div id="add-quize" class="container tab-pane fade">
            <div class="row">
              <div class="col-sm-12 col-md-12 ">
                <h3>Add New Quize</h3>

                <button class="btn btn-primary w-100" id="addQuestionButton" data-bs-toggle="modal" data-bs-target="#questionModal"> Add Qustions </button>

                <div class="modal fade" id="questionModal" tabindex="-1" role="dialog" aria-labelledby="questionModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="questionModalLabel">إضافة سؤال</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form>
                                  <form class=" mb-5">
                                    <div class="form-group">
                                      <label for="articleCategory " class="h6 text-light"> Select Type </label>
                                      <select class="form-control" id="articleCategory">
                                          <option value="CS1"> Web Desgining </option>
                                          <option value="CS2"> Mobile Programming  </option>
                                          <option value="CS3"> Softwear Engineering </option>
                                      </select>
                                  </div>
                                    <div class="form-floating mb-1 mt-3">
                                      <input type="text" class="form-control" id="title" placeholder="Enter Title Of post" name="title">
                                      <label for="title"> Qution </label>
                                    </div>
                    
                                    <div class="form-floating mb-1 mt-3">
                                      <input type="text" class="form-control" id="title" placeholder="Enter Title Of post" name="title">
                                      <label for="title"> Add Option one </label>
                                    </div>
                                    <div class="form-floating mb-1 mt-3">
                                      <input type="text" class="form-control" id="title" placeholder="Enter Title Of post" name="title">
                                      <label for="title"> Add Option tow </label>
                                    </div>
                                    <div class="form-floating mb-1 mt-3">
                                      <input type="text" class="form-control" id="title" placeholder="Enter Title Of post" name="title">
                                      <label for="title"> Add Option three </label>
                                    </div>
                                    <div class="form-floating mb-1 mt-3">
                                      <input type="text" class="form-control" id="title" placeholder="Enter Title Of post" name="title">
                                      <label for="title"> Add Option four </label>
                                    </div>
                    
                                  </form>
                                </form>
                            </div>
                            <div class="m-3">
                              <div class="row">
                                <div class="col-6">
                                  <button type="submit" class="btn btn-primary w-100 "> Add Question</button>
                                </div>
                                <div class="col-6">
                                  <button type="button" class="btn btn-secondary w-100 " data-bs-dismiss="modal">Cancel</button>                        </div>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>

              </div>

              <div class="col-sm-12 col-md-12 ">
                <h3 class="text-light mb-4"> Qustions List</h3>
                <table class="table  ">
                  <thead class="thead-dark ">
                      <tr>
                          <th scope="col">Question</th>
                          <th scope="col">Correct Answer</th>
                          <th scope="col">Actions</th>
                      </tr>
                  </thead>
                  <tbody>
                      <tr>
                          <td>Question 1</td>
                          <td>Answer 1</td>
                          <td>
                              <button class="btn btn-danger">Delete</button>
                              <button class="btn btn-primary">Edit</button>
                          </td>
                      </tr>
                      <tr>
                          <td>Question 2</td>
                          <td>Answer 2</td>
                          <td>
                              <button class="btn btn-danger">Delete</button>
                              <button class="btn btn-primary">Edit</button>
                          </td>
                      </tr>
                      <tr>
                          <td>Question 3</td>
                          <td>Answer 3</td>
                          <td>
                              <button class="btn btn-danger">Delete</button>
                              <button class="btn btn-primary">Edit</button>
                          </td>
                      </tr>
                  </tbody>
              </table>
              </div>
            </div>
          </div>

          <div id="add-books" class="container tab-pane fade">
            <div class="row">
              <div class="col-sm-12 col-md-12 ">
                <h3>Add New Books</h3>

                <button class="btn btn-primary w-100" id="addBookButton" data-bs-toggle="modal" data-bs-target="#booksModal"> Add Book </button>

                <div class="modal fade" id="booksModal" tabindex="-1" role="dialog" aria-labelledby="booksModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="questionModalLabel"> Add Book </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form>
                                  <form class=" mb-5">
                                    <div class="form-group">
                                      <label for="articleCategory " class="h6 text-light"> Select Type </label>
                                      <select class="form-control" id="articleCategory">
                                          <option value="CS1"> Web Desgining </option>
                                          <option value="CS2"> Mobile Programming  </option>
                                          <option value="CS3"> Softwear Engineering </option>
                                      </select>
                                  </div>
                                    <div class="form-floating mb-1 mt-3">
                                      <input type="text" class="form-control" id="title" placeholder="Enter Title Of post" name="title">
                                      <label for="title"> Qution </label>
                                    </div>
                    
                                    <div class="form-floating mb-1 mt-3">
                                      <input type="text" class="form-control" id="title" placeholder="Enter Title Of post" name="title">
                                      <label for="title"> Add Option one </label>
                                    </div>
                                    <div class="form-floating mb-1 mt-3">
                                      <input type="text" class="form-control" id="title" placeholder="Enter Title Of post" name="title">
                                      <label for="title"> Add Option tow </label>
                                    </div>
                                    <div class="form-floating mb-1 mt-3">
                                      <input type="text" class="form-control" id="title" placeholder="Enter Title Of post" name="title">
                                      <label for="title"> Add Option three </label>
                                    </div>
                                    <div class="form-floating mb-1 mt-3">
                                      <input type="text" class="form-control" id="title" placeholder="Enter Title Of post" name="title">
                                      <label for="title"> Add Option four </label>
                                    </div>
                    
                                  </form>
                                </form>
                            </div>
                            <div class="m-3">
                              <div class="row">
                                <div class="col-6">
                                  <button type="submit" class="btn btn-primary w-100 "> Add Question</button>
                                </div>
                                <div class="col-6">
                                  <button type="button" class="btn btn-secondary w-100 " data-bs-dismiss="modal">Cancel</button>                        </div>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>

              </div>

              <div class="col-sm-12 col-md-12 ">
                <h3 class="text-light mb-4"> Qustions List</h3>
                <table class="table  ">
                  <thead class="thead-dark ">
                      <tr>
                          <th scope="col">Question</th>
                          <th scope="col">Correct Answer</th>
                          <th scope="col">Actions</th>
                      </tr>
                  </thead>
                  <tbody>
                      <tr>
                          <td>Question 1</td>
                          <td>Answer 1</td>
                          <td>
                              <button class="btn btn-danger">Delete</button>
                              <button class="btn btn-primary">Edit</button>
                          </td>
                      </tr>
                      <tr>
                          <td>Question 2</td>
                          <td>Answer 2</td>
                          <td>
                              <button class="btn btn-danger">Delete</button>
                              <button class="btn btn-primary">Edit</button>
                          </td>
                      </tr>
                      <tr>
                          <td>Question 3</td>
                          <td>Answer 3</td>
                          <td>
                              <button class="btn btn-danger">Delete</button>
                              <button class="btn btn-primary">Edit</button>
                          </td>
                      </tr>
                  </tbody>
              </table>
              </div>
            </div>
          </div>


        </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-12 col-sm-12 side-menu mt-3 rounded-2 text-light scrollable-menu">
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

<script>
  function toggleForm() {
      var form = document.getElementById("questionForm");
      if (form.style.display === "none") {
          form.style.display = "block";
      } else {
          form.style.display = "none";
      }
  }
</script>
</body>
</html>