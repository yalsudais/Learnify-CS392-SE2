<?php  session_start();?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
	<link type="text/css" href="./style.css" rel="stylesheet">
	<link rel="stylesheet" href="../assets/css/navbar.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	 <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    
    <title>Discussion App</title>
</head>

<style>
	  .search-icon {
      position: absolute;
      top: 20%;
      right: 10%;
      transform: translateY(-100%);
      color: #999; /* يمكنك تغيير اللون حسب الرغبة */
    }

    .search {
      position: relative;
      padding-right: 10px; 
    }
</style>
 <body>
	

    <header id="navbar" style="margin-bottom: 70px;" class="bg-light">
        <nav class="navbar-container container">
        <a href="index.php"> <img src="assets/img/logo.jpg" alt="" width="50px"> </a>
        <div class="dropdown">
          <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="uil uil-user user-icon px-3"></i> <?php echo isset($_SESSION["username"]) ? $_SESSION["username"] : ""; ?>
          </button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="z-index: 999;">
            <!-- قائمة العناصر المنسدلة -->
            <a class="dropdown-item" href="#"> Logout </a>
          </div>
      </div>


          <!-- <a href="index.php" class="home-link navbar-item navbar-link"> -->
            <a href="#" class="navbar-item navbar-link ">  
            
            </a>
          <button type="button" id="navbar-toggle" aria-controls="navbar-menu" aria-label="Toggle menu" aria-expanded="false">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <div id="navbar-menu" aria-labelledby="navbar-toggle" >
            <ul class="navbar-links bg-light ">
              <li class="navbar-item "><a class="navbar-link text-dark " href="../index.php">  <i class="uil uil-home home-icon mx-2 text-dark"></i>Home</a></li>
              <li class="navbar-item "><a class="navbar-link text-dark " href="../about.php"> <i class="uil uil-info-circle about-icon mx-2 text-dark"></i> About</a></li>
              <li class="navbar-item "><a class="navbar-link text-dark " href="../cources.php">  <i class="uil uil-book-open courses-icon mx-2 text-dark"></i> Cources</a></li>
              <li class="navbar-item "><a class="navbar-link text-dark " href="../discssion/index.php"><i class="uil uil-comments discussions-icon mx-2 text-dark"></i> Decssion</a></li>
              <li class="navbar-item "><a class="navbar-link text-dark " href="../Login/index.php">  <i class="uil uil-sign-in-alt login-icon mx-2 text-dark"></i> Login</a></li>

            </ul>
          </div>
        </nav>
      </header>
	<header>
		<h1>Discussion Portal</h1>
	</header>
	<div class="container">
		<div class="row">
		<div class="col-lg-4">
			<div class="button-wrapper">
				<button class="btn btn-primary ml-2 w-100" id="show-welcome"> <i class="uil uil-question-circle add-question-icon"></i> New Question form</button>
				<input type="text" name="search" id="search" class="search w-100 m-2" placeholder="search questions . . ."><span><i class="uil uil-search search-icon"></i></span>
				<!-- <button class="btn-add" id="show-favorites" style="margin-left:10px	">Favorites</button> -->
			</div>
			<div class="questions" id="questions">
				
			</div>
		</div>
		<div class="col-lg-8" id="right">
			<div id="welcome">
				<h1>Welcome to Discussion Portal !</h1>
				<p class="text">Enter a subjct and question to get started</p>
				<form id="formAdd" data-user_id=<?php echo isset($_SESSION["user_id"])? $_SESSION["user_id"]:" ";?>>
					<input type="text"   name="subject" class="subject w-100" placeholder="Subject" id="subject_text" required="true"><br>
					<textarea name="question" rows="6" placeholder="Question" id="quesion_text" required></textarea>
					<div class="btn-submit"><button id="add-que" type="submit" class="w-100">Add Question <i class="uil uil-question-circle add-question-icon"></i> </button></div>
				</form>
			</div>
			<div id="description">
				<h2 class="text rounded p-3">Question</h2>
				<div class="que-content">
					<h2 class="que-title" id="que-title">Web Development</h2>
					<p class="que-text" id="que-text">What is Web?</p>
					
				</div>
			
				<div class="response-wrapper">
					<h3 class="text">Response</h3>
					<div class="responses rounded p-3" id="responses">
					
					</div>
					<div class="response-form">
						<h2 class="text">Add Response</h2>
						<form id="resForm" data-user_id=<?php echo isset($_SESSION["user_id"])? $_SESSION["user_id"]:" ";?>>
							
							<textarea name="question" rows="4" placeholder="Enter Comment" name="textComment" maxlength="1000" required></textarea>
							<div class="btn-submit"><button id="add-res"  class="btn btn-primary w-100"><i class="uil uil-comment comment-icon"></i>  Send Comment </button></div>
						</form>
					</div>
				</div>
			</div>
		</div>
		</div>
	</div>
	<script src="./script.js"></script>


</body>
</html>