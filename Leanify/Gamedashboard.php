<!DOCTYPE html>
<html>
<head>
  <title>Sidebar Menu</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <style>
    .sidebar {
      width: 20%;
      height: 100vh;
      position: fixed;
      left: 0;
      top: 0;
      background-color: #f8f9fa;
    }

    .content {
      margin-left: 20%;
      padding: 20px;
    }

    .nav-link {
      display: flex;
      align-items: center;
      gap: 10px;
    }
  </style>
  <style>
    .sidebar {
      width: 20%;
      height: 100vh;
      position: fixed;
      left: 0;
      top: 0;
      background-color: #f8f9fa;
      overflow-y: auto;
      transition: width 0.3s ease;
    }

    .sidebar:hover {
      width: 21%;
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
  </style>

</head>
<body>
<!-- Sidebar -->
<div class="sidebar" style="z-index: 5;">
  <ul class="nav flex-column">
    <li class="nav-item">
      <a class="nav-link" href="#" data-page="cources.php">
        <i class="bi bi-house"></i> Home
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#" data-page="about.html">
        <i class="bi bi-info-circle"></i> About
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#" data-page="contact.html">
        <i class="bi bi-envelope"></i> Contact
      </a>
    </li>
  </ul>
</div>

<!-- Content -->
<div class="content">
  <div id="page-content">
    <div class="h4 text-center p-5 bg-dark text-light ">
      Hi Welcom to My Channle 
    </div>
  </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
  $(document).ready(function() {
    // Load initial page
    loadPage('home.html');

    // Handle menu item click
    $('.nav-link').click(function(e) {
      e.preventDefault();
      var page = $(this).data('page');
      loadPage(page);
    });

    // Function to load page content
    function loadPage(page) {
      $('#page-content').load(page);
    }
  });
</script>
</body>
</html>