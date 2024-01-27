
var row_select_contentuploads;
var tableselect_contentuploads;
$(document).ready(function () {

    loadContentuploads();
    loadartical();
    // $('#save-contentuploads').on('click', function() {
    //     if (validateForm('save_contentuploads_form')) {
    //       var form = $('#save_contentuploads_form')[0];
    //       var formData = new FormData(form);
    //       formData.append('function_name', 'uploadcontent');
    //       formData.append('course_id','');
    //       $.ajax({
    //         url: '../php/contentuploadsOpertion.php',
    //         type: 'POST',
    //         data: formData,
    //         processData: false,
    //         contentType: false,
    //         xhr: function() {
    //           var xhr = new window.XMLHttpRequest();
      
    //           // Add an event listener to track the progress
    //           xhr.upload.addEventListener('progress', function(e) {
    //             if (e.lengthComputable) {
    //               var percent = Math.round((e.loaded / e.total) * 100);
    //               $('#progress-bar .text').text(percent + '%');
    //               // Update the progress bar or display the progress percentage
    //               $('#progress-bar .fill').css('width', percent + '%');
    //               console.log(percent);
    //             }
    //           });
      
    //           xhr.upload.addEventListener('load', function(e) {
    //             alert_toast('succesfull upload', 'success');
    //           });
      
    //           return xhr;
    //         },
    //         success: function(data) {
    //             loadContentuploads();
    //             console.log(data);
          
    //           // Your success code here
    //         //   $('#save-contentuploads-Modal').modal("hide");
    //         },
    //         error: function(xhr, status, error) {
    //           // Handle the error response
    //           console.log('Error:', error);
              
    //           // Optionally, you can display an error message or perform other error handling tasks
    //         }
    //       });
    //     }
    //   });
      $('#save-contentAtrical').on('click', function() {
        if (validateForm('save_contentArtical_form')) {
            var articleId = $('#article-id').val();
          var form = $('#save_contentArtical_form')[0];
          var formData = new FormData(form);
          console.log(articleId);
          formData.append('function_name', articleId ? 'updateArticle' : 'addArticle');
          if (articleId) {
            $("#titleArtical").html("Update article");
          } else {
            $("#titleArtical").html("Add article");
          }
          console.log(formData);
          $.ajax({
            url: '../php/contentuploadsOpertion.php',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
      
            success: function(data) {
              loadartical();
              console.log(data);
              // Your success code here
              $('#save-contentArtical-Modal').modal("hide");
            },
            error: function(xhr, status, error) {
              // Handle the error response
              loadartical();
              console.log('Error:', error);
      
              // Optionally, you can display an error message or perform other error handling tasks
            }
          });
        }
      });
    $('#update-contentuploads').on('click', function () {
        if (validateForm('update_contentuploads_form')) {
            var form = $('#update_contentuploads_form')[0];
            var formData = new FormData(form);
            formData.append('function_name', 'uploadcontent');
            formData.append('course_id'," ");
    
            formData.append("content_type",1);
            $.ajax({
                url: '../php/contentuploadsOpertion.php',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function (data) {
                  console.log(data);
                    loadContentuploads();
                    $('#update-contentuploads-Modal').modal("hide");
                }
            });
        }
    });
    $('#btn-delete-contentuploads-yes').on('click', function () {

        var upload_id = $(this).data('id');
        $.ajax({
            url: '../php/contentuploadsOpertion.php',
            type: 'POST',
            data: {
                function_name: "delete_contentuploads",
                upload_id: upload_id
            },
            success: function (data) {
                $('#confirm-delete-contentuploads').modal('hide');
                // Your success code here
                if (data.trim() == "1") {
                    row_select_contentuploads.remove();
                } else {
                    console.error("Failed to find selected row");
                }
            }
        });
        $('#confirm-delete-vendors').modal('hide');
    });

    var button = document.getElementById("btn-delete-contentuploads-yes");

    // Assign a click event handler to the button
    button.addEventListener("click", function () {
        // Perform other actions here
    });
    $('#add-contentuploads').on('click', function () {
      $("#titleArtical2").text("Update article");

    
      
 
        $('#save-contentuploads-Modal').modal("show");
    });
    $('#add-artical').on('click', function () {
      
      var titleArticalContainer = document.getElementById("titleArtical2");
      titleArticalContainer.textContent = "Add article";
        $('#save-contentArtical-Modal').modal("show");
    });
    //$('#table-contentuploads').on('click', '.edit-contentuploads', function() {
    //       $('#update-contentuploads-Modal').modal("show");
    //    });

    
});



function loadContentuploads() {
    $.ajax({
        url: '../php/contentuploadsOpertion.php',
        type: 'post',
        data: {
            function_name: "select_data",content_type:1
        },
        dataType: 'json',
        success: function (data) {
            var table = '<table id="table-contentuploads" class="table table-striped table-rounded table-hover table-shadow text-center table-bordered  table-colored ">';
            table += '<tr>';
            table += '<th class="table-header">Book ID</th>';
            table += '<th class="table-header">Title</th>';
            table += '<th class="table-header">Content</th>';
            table += '<th class="table-header">Image</th>';
            table += '<th class="table-header">Department</th>';
     
            table += '<th class="table-header">Date</th>';
            table += '<th class="table-header">Operation</th>';
            table += '</tr>';
            
            for (var i = 0; i < data.length; i++) {
              table += '<tr>';
              table += '<td class="table-data">' + data[i].upload_id + '</td>';
              table += '<td class="table-data">' + data[i].title + '</td>';
              table += '<td class="table-data">' + data[i].content + '</td>';
              table += '<td class="table-data"><a href="#" data-toggle="modal" data-target="#imageModal"><img src="../upload_image/' + data[i].image + '" class="rounded" width="50"></a></td>';
              table += '<td class="table-data">' + data[i].subject_id + '</td>';
    
              table += '<td class="table-data">' + data[i].upload_time + '</td>';
              table += '<td>';
              table += '<center>';
              table += '<button class="btn px-3 btn-sm btn-info edit-contentuploads" data-id="' + data[i].upload_id + '"> <i class="uil uil-edit"></i></button>';
              table += '<button class="btn px-3 btn-sm btn-danger remove-contentuploads" data-id="' + data[i].upload_id + '"> <i class="uil uil-trash-alt"></i></button>';
              table += '</center>';
              table += '</td>';
              table += '</tr>';
            }
            
            table += '</table>';
            $('#tableContainer_contentuploads').html(table);
            tableselect_contentuploads = $('#table-contentuploads');
            $('#table-contentuploads').on('click', '.remove-contentuploads', function () {
                var upload_id = $(this).data('id');
                row_select_contentuploads = $(this).closest('tr');
                $('#btn-delete-contentuploads-yes').data('id', upload_id);
                $('#confirm-delete-contentuploads').modal('show');

            });
            $('#table-contentuploads').on('click', '.edit-contentuploads', function () {

                row_select_contentuploads = $(this).closest('tr');

                var upload_id = row_select_contentuploads.find('td:nth-child(1)').text()
   
                var title = row_select_contentuploads.find('td:nth-child(2)').text()
                var content = row_select_contentuploads.find('td:nth-child(3)').text()
                var path = row_select_contentuploads.find('td:nth-child(4)').text()
                var image = row_select_contentuploads.find('td:nth-child(5)').text()
                var subject_id = row_select_contentuploads.find('td:nth-child(7)').text()
        
                var content_type = row_select_contentuploads.find('td:nth-child(8)').text()
            
                //assignment td value to input in modal

                $('#m-upload_id').val(upload_id);
           
                $('#m-title').val(title);
                $('#m-content').val(content);
                $('#m-path').val(path);
            
                $('#m-subject_id_2 option:contains(' + subject_id + ')').prop('selected', true)
          
                $('#update-contentuploads-Modal').modal("show");
            });
        }
    });
}

function loadartical() {
    $.ajax({
        url: '../php/contentuploadsOpertion.php',
        type: 'post',
        data: {
            function_name: "select_data",content_type:"2"
        },
        dataType: 'json',
        success: function (data) {
            console.log(data.length);
            var table = '<table id="table-contenArtical" class="table table-striped table-rounded table-hover table-shadow text-center table-bordered  table-colored ">';
            table += '<tr>';
            table += '<th class="table-header">#</th>';
            table += '<th class="table-header">Title</th>';
            table += '<th class="table-header">Content</th>';
            table += '<th class="table-header">Image</th>';
            table += '<th class="table-header">Department Name</th>';
            table += '<th class="table-header">Date</th>';
            table += '<th class="table-header">Operation</th>';
            table += '</tr>';
            
            for (var i = 0; i < data.length; i++) {
              table += '<tr>';
              table += '<td class="table-data">' + data[i].upload_id + '</td>';
              table += '<td class="table-data">' + data[i].title + '</td>';
              table += '<td class="table-data table-content text-muted" title="' + data[i].content + '" data-content="'+data[i].content+'">' + truncateText(data[i].content, 3) + '</td>';
              table += '<td class="table-data"><a href="#" data-toggle="modal" data-target="#imageModal"><img src="../upload_image/' + data[i].image + '" class="rounded" width="50"></a></td>';
              table += '<td class="table-data">' + data[i].subject_name + '</td>';
              table += '<td class="table-data">' + data[i].upload_time + '</td>';
              table += '<td>';
              table += '<center>';
              table += '<button class="btn px-3 btn-sm btn-info edit-contentuploads" data-id="' + data[i].upload_id + '"> <i class="uil uil-edit"></i></button>';
              table += '<button class="btn px-3 btn-sm btn-danger remove-contentuploads" data-id="' + data[i].upload_id + '"> <i class="uil uil-trash-alt"></i> </button>';
              table += '</center>';
              table += '</td>';
              table += '</tr>';
            }
            
            table += '</table>';
            $('#tableContainer_contentAtrtical').html(table);
            tableselect_contentuploads = $('#table-contenArtical');
            $('#table-contenArtical').on('click', '.remove-contentuploads', function () {
                var upload_id = $(this).data('id');
                row_select_contentuploads = $(this).closest('tr');
                $('#btn-delete-contentuploads-yes').data('id', upload_id);
                $('#confirm-delete-contentuploads').modal('show');

            });
            $('#table-contenArtical').on('click', '.edit-contentuploads', function () {
              var titleArticalContainer = document.getElementById("titleArtical2");
              titleArticalContainer.textContent = "Update article";
          
                row_select_contentuploads = $(this).closest('tr');

                var upload_id = row_select_contentuploads.find('td:nth-child(1)').text();
            
                var title = row_select_contentuploads.find('td:nth-child(2)').text();
                var content = row_select_contentuploads.find('td:nth-child(3)').data("content");

            
                var image = row_select_contentuploads.find('td:nth-child(4)').text();
                var subject_id = row_select_contentuploads.find('td:nth-child(5)').text();
              
                //assignment td value to input in modal

                $('#article-id').val(upload_id);
            
                $('#s-title_artical').val(title);
                $('#s-content-artical').val(content);
              
                // $('#m-image').val(image);
                $('#s-subject_id_artical option:contains(' + subject_id + ')').prop('selected', true);
             
                $('#save-contentArtical-Modal').modal("show");
            });
        }
    });
}

function truncateText(text, numWords) {
    var words = text.split(' ');
    if (words.length > numWords) {
      var truncatedText = words.slice(0, numWords).join(' ');
      return truncatedText + '...';
    }
    return text;
  }

  $(document).ready(function() {
    $('a[data-toggle="modal"]').on('click', function() {
      var imageSrc = $(this).find('img').attr('src');
      $('#modalImage').attr('src', imageSrc);
    });
  });