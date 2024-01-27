<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>صفحة القائمة الجانبية</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <style>
    body {
      background-color: #f5f5f5;
    }

    #sidebar {
      width: 220px;
      background-color: #343a40;
      padding: 20px;
      color: #fff;
      min-height: 100vh;
    }

    #content {
      padding: 20px;
    }

    #sidebar .list-group-item {
      background-color: transparent;
      color: #fff;
      border: none;
      cursor: pointer;
      display: flex;
      align-items: center;
    }

    #sidebar .list-group-item i {
      margin-right: 10px;
    }

    #sidebar .list-group-item.active {
      background-color: #212529;
    }

    #content h3 {
      color: #212529;
    }
  </style>
</head>

<body>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-3 bg-dark" id="sidebar">
        <ul class="list-group">
            <li class="list-group-item" data-content="محتوى العنصر الأول" >
                <i class="fas fa-pencil-alt"></i>
                Quizes
            </li>
            <li class="list-group-item" data-content="محتوى العنصر الأول">
                <i class="fas fa-file-alt"></i>
               Create New Quiz
            </li>
          <li class="list-group-item" data-content="محتوى العنصر الأول">
            <i class="fas fa-home"></i>
            الصفحة الرئيسية
          </li>
          <li class="list-group-item" data-content="محتوى العنصر الثاني">
            <i class="fas fa-user"></i>
            الملف الشخصي
          </li>
          <li class="list-group-item" data-content="محتوى العنصر الثالث">
            <i class="fas fa-cogs"></i>
            الإعدادات
          </li>
        </ul>
      </div>
      <div class="col-md-9" id="content">
        <h3>مرحبًا بك في صفحتك الشخصية</h3>
        <p>هنا يمكنك الوصول إلى محتوى مختلف وتخصيص إعداداتك الشخصية.</p>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    var sidebarItems = document.querySelectorAll("#sidebar li");

    sidebarItems.forEach(function(item) {
      item.addEventListener("click", function() {
        var activeItem = document.querySelector("#sidebar .active");
        if (activeItem) {
          activeItem.classList.remove("active");
        }
        
        this.classList.add("active");
        
        var content = document.querySelector("#content");
        content.innerHTML = "<h3>" + this.textContent + "</h3><p>" + this.getAttribute("data-content") + "</p>";
      });
    });
  </script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
  $(document).ready(function() {
    var url = "index.php"; // استبدله بعنوان URL الفعلي للصفحة الخارجية التي ترغب في جلب محتواها
    $.ajax({
      url: url,
      success: function(response) {
        var content = $(response).find("body").html();
        $("#content").html(content);
      },
      error: function() {
        $("#content").html("<h3>خطأ في جلب المحتوى</h3>");
      }
    });
  });
</script>
</body>

</html>