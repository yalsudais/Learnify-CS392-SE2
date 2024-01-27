<?php include "../php/config.php"; ?>
<!DOCTYPE html>
<!-- Coding By CodingNepal - codingnepalweb.com -->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!----======== CSS ======== -->
    <link rel="stylesheet" href="../assets/css/dashboard.css">

    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="important-text.css">
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    <title>Admin Dashboard Panel</title>
    <style>

    .custom-file-upload {
    display: inline-block;
    padding: 10px 20px;
    background: #f1f1f1;
    color: #333;
    border: 2px solid #ccc;
    cursor: pointer;
    border-radius: 4px;
    width: 100%;
    text-align: center;
    }

    .custom-file-upload:hover {
    background: #e6e6e6;
    }

    .custom-file-upload span {
    margin-left: 5px;
    }
    .SaveButton , .CloseButton{
        width: 200px;
        
    }
    </style>
</head>

<body>
    <?php include "../include/navbar2.php"; ?>
    <section class="dashboard">
        <div class="top">
            <i class="uil uil-bars sidebar-toggle"></i>

            <div class="search-box">
                <i class="uil uil-search"></i>
                <input type="text" placeholder="Search here...">
            </div>

            <!--<img src="images/profile.jpg" alt="">-->
        </div>
<?php
 include "../php/modal_subjects.php";
 include "../php/modal_contentuploads.php";
 include "../php/modal_courses.php";
 include "../php/modal_artical.php";
 include "../php/modal_quizzes.php";
 include "../php/modal_quize.php";
  ?>
        <div class="dash-content">
            <div  class="col-xl-12 col-lg-12 col-xxl-12 col-md-12 mt-3" >
                <div class="card darkandlightmode" id="Department">
                    <div class="card-header">
                        <h3 class="card-title"> Departement</h3>
                       <?php include "../php/message.php";?>
                    </div>
                    <div class="card-body card-body" id="card-body">
                        <div class="table-responsive">
                            <div id='tableContainer_subjects'></div>
                        </div>
                    </div>
                </div>
            </div>
            <div  class="col-xl-12 col-lg-12 col-xxl-12 col-md-12 mt-3">
                <div class="card "  id="addcourse" >
                    <div class="card-header">
                        <h3 class="card-title"> Courses</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <div id='tableContainer_courses'></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-12 col-lg-12 col-xxl-12 col-md-12 mt-3" >
                <div class="card " id="addbook">
                    <div class="card-header ">
                        <h3 class="card-title"> Book</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <div id='tableContainer_contentuploads'></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-12 col-lg-12 col-xxl-12 col-md-12 mt-3" >
                <div class="card " id="addarticle">
                    <div class="card-header ">
                        <h3 class="card-title"> Artical</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <div id='tableContainer_contentAtrtical'></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <div class="col-xl-12 col-lg-12 col-xxl-12 col-md-12 mt-3"  >
                <div class="card " id="addquize">
                    <div class="card-header ">
                        <h3 class="card-title"> Add QUize</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <div id='tableContainer_quizzes'></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<!-- Modal -->
<div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <img src="../upload_image/65aec31de7d76.png"  id="modalImage" style="width: 100%;">
      </div>
    </div>
  </div>
</div>




    <script src="../js/script_subjects.js"></script>
    
    <script src="../js/script_courses.js"></script>
    
    <script src="../js/script_contentuploads.js"></script>
    <script src="../js/validateInput.js"></script>
    <script src="../js/toast.js"></script>
    <script src="../assets/js/dashboard.js"></script>
    <script src="../js/script_quize.js"></script>
   
</body>

</html>