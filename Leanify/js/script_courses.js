
var row_select_courses;
var tableselect_courses;
$(document).ready(function () {

    loadCourses();
    $('#save-courses').on('click', function () {
        if (validateForm('save_courses_form')) {
            var form = $('#save_courses_form')[0];
            var formData = new FormData(form);
            formData.append('function_name', 'add_courses');
            $.ajax({
                url: '../php/coursesOpertion.php',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function (data) {
                    loadCourses();
                    console.log(data);
                    // Your success code here
                    $('#save-courses-Modal').modal("hide");
                }
            });
        }
    });
    $('#update-courses').on('click', function () {

        if (validateForm('update_courses_form')) {
            var form = $('#update_courses_form')[0];
            var formData = new FormData(form);
            formData.append('function_name', 'update_courses');
            $.ajax({
                url: '../php/coursesOpertion.php',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function (data) {
                    console.log(data);
                    loadCourses();
                    $('#update-courses-Modal').modal("hide");
                }
            });
        }
    });
    $('#btn-delete-courses-yes').on('click', function () {

        var course_id = $(this).data('id');
        $.ajax({
            url: '../php/coursesOpertion.php',
            type: 'POST',
            data: {
                function_name: "delete_courses",
                course_id: course_id
            },
            success: function (data) {
                $('#confirm-delete-courses').modal('hide');
                // Your success code here
                if (data.trim() == "1") {
                    row_select_courses.remove();
                } else {
                    console.error("Failed to find selected row");
                }
            }
        });
        $('#confirm-delete-vendors').modal('hide');
    });

    var button = document.getElementById("btn-delete-courses-yes");

    // Assign a click event handler to the button
    button.addEventListener("click", function () {
        // Perform other actions here
    });
    $('#add-courses').on('click', function () {
        $('#save-courses-Modal').modal("show");
    });

    //$('#table-courses').on('click', '.edit-courses', function() {
    //       $('#update-courses-Modal').modal("show");
    //    });

});



// function loadCourses() {
//     $.ajax({
//         url: '../php/coursesOpertion.php',
//         type: 'post',
//         data: {
//             function_name: "select_data"
//         },
//         dataType: 'json',
//         success: function(data) {
//             var table = '<table id="table-courses" class="table">';
//             table += '<tr><th class="table-header">course_id</th><th class="table-header">course_code</th><th class="table-header">course_name</th><th class="table-header">course_description</th><th class="table-header">course_price</th><th class="table-header">create_date</th><th class="table-header">course_banner_image</th><th class="table-header">subject_id</th><th class="table-header">operation</th></tr>';
//             for (var i = 0; i < data.length; i++) {
//                 table += '<tr>';

//                 table += '<td class="table-data">' + data[i].course_id + '</td>';
//                 table += '<td class="table-data">' + data[i].course_code + '</td>';
//                 table += '<td class="table-data">' + data[i].course_name + '</td>';
//                 table += '<td class="table-data">' + data[i].course_description + '</td>';
//                 table += '<td class="table-data">' + data[i].course_price + '</td>';
//                 table += '<td class="table-data">' + data[i].create_date + '</td>';
//                 table += '<td class="table-data"><img src="../upload_image/' + data[i].course_banner_image + '" height="100" width="100"></td>';

//                 table += '<td class="table-data">' + data[i].subject_id + '</td>';
//                 table += '<td><center>' +
//                     '<button class="btn px-3 btn-sm btn-info edit-courses" data-id="' + data[i].course_id + '"> <i class="fa fa-edit"></i> edit </button>' +
//                     '<button class="btn px-3 btn-sm btn-danger remove-courses" data-id="' + data[i].course_id + '"> <i class="fa fa-trash"></i> delete </button></center></td>';
//                 table += '</tr>';
//             }
//             table += '</table>';
//             $('#tableContainer_courses').html(table);
//             tableselect_courses = $('#table-courses');
//             $('#table-courses').on('click', '.remove-courses', function() {
//                 var course_id = $(this).data('id');
//                 row_select_courses = $(this).closest('tr');
//                 $('#btn-delete-courses-yes').data('id', course_id);
//                 $('#confirm-delete-courses').modal('show');

//             });
//             $('#table-courses').on('click', '.edit-courses', function() {

//                 row_select_courses = $(this).closest('tr');

//                 var course_id = row_select_courses.find('td:nth-child(1)').text()
//                 var course_code = row_select_courses.find('td:nth-child(2)').text()
//                 var course_name = row_select_courses.find('td:nth-child(3)').text()
//                 var course_description = row_select_courses.find('td:nth-child(4)').text()
//                 var course_price = row_select_courses.find('td:nth-child(5)').text()
//                 var create_date = row_select_courses.find('td:nth-child(6)').text()
//                 var course_banner_image = row_select_courses.find('td:nth-child(7)').text()
//                 var subject_id = row_select_courses.find('td:nth-child(8)').text()
//                 console.log(course_id);
//                 //assignment td value to input in modal

//                 $('#m-course_id_1').val(course_id);
//                 $('#m-course_code').val(course_code);
//                 $('#m-course_name').val(course_name);
//                 $('#m-course_description').val(course_description);
//                 $('#m-course_price').val(course_price);
//                 $('#m-create_date').val(create_date);
//                 $('#m-course_banner_image').val(course_banner_image);
//                 $('#m-subject_id option:contains(' + subject_id + ')').prop('selected', true);
//                 $('#update-courses-Modal').modal("show");
//             });
//         }
//     });
// }
var form = $("#uploadForm");

// Attach a submit event listener to the form
form.on("submit", function (event) {
    event.preventDefault(); // Prevent form submission
    if (validateForm("uploadForm")) {



        var formData = new FormData(form[0]);
        formData.append('function_name', 'uploadcontent');

        // Send the AJAX request
        $.ajax({
            url: '../php/contentuploadsOpertion.php', // Replace with the URL of your PHP file
            type: 'POST',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            xhr: function () {
                var xhr = new window.XMLHttpRequest();

                // Add an event listener to track the progress
                xhr.upload.addEventListener('progress', function (e) {
                    if (e.lengthComputable) {
                        var percent = Math.round((e.loaded / e.total) * 100);
                        $('#progress-bar .text').text(percent + '%');
                        // Update the progress bar or display the progress percentage
                        $('#progress-bar .fill').css('width', percent + '%');


                    }
                });

                xhr.upload.addEventListener('load', function (e) {
                    alert_toast('The file has been uploaded successfully', 'success');

                });

                return xhr;
            },
            success: function (response) {
                // Handle the response after the upload is complete
                console.log('Upload complete:', response);
            },
            error: function (xhr, status, error) {
                // Handle any errors during the upload process
                console.error('Upload error:', error);
            }
        });
    }
});

$('#save-contentuploads').on('click', function () {
    if (validateForm('save_contentuploads_form')) {
        var form = $('#save_contentuploads_form')[0];
        var formData = new FormData(form);
        formData.append('function_name', 'uploadcontent');
        $.ajax({
            url: '../php/contentuploadsOpertion.php',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            xhr: function () {
                var xhr = new window.XMLHttpRequest();

                // Add an event listener to track the progress
                xhr.upload.addEventListener('progress', function (e) {
                    if (e.lengthComputable) {
                        var percent = Math.round((e.loaded / e.total) * 100);
                        $('#progress-bar .text').text(percent + '%');
                        // Update the progress bar or display the progress percentage
                        $('#progress-bar .fill').css('width', percent + '%');
                        console.log(percent);
                    }
                });

                xhr.upload.addEventListener('load', function (e) {
                    alert_toast('succesfull upload', 'success');
                });

                return xhr;
            },
            success: function (data) {
                console.log(data);

                // Your success code here
                //   $('#save-contentuploads-Modal').modal("hide");
            },
            error: function (xhr, status, error) {
                // Handle the error response
                console.log('Error:', error);

                // Optionally, you can display an error message or perform other error handling tasks
            }
        });
    }
});
function loadCourses() {
    $.ajax({
        url: '../php/coursesOpertion.php',
        type: 'post',
        data: { function_name: "select_data" },
        dataType: 'json',

        success: function (data) {
            var table = '<table id="table-courses" class="table  table table-striped table-rounded table-hover table-shadow text-center table-bordered  table-colored">';
            table += '<thead>';
            table += '  <tr>';
            table += '    <th class="table-header">Cource ID</th>';
            table += '    <th class="table-header">Cource Code</th>';
            table += '    <th class="table-header">Cource Name</th>';
            table += '    <th class="table-header">Description</th>';
            table += '    <th class="table-header">Cource Price</th>';
            table += '    <th class="table-header">Date</th>';
            table += '    <th class="table-header">Cover Image</th>';
            table += '    <th class="table-header">Department</th>';
            table += '    <th class="table-header">Operation</th>';
            table += '  </tr>';
            table += '</thead>';
            table += '<tbody>';
            
            for (var i = 0; i < data.length; i++) {
              table += '  <tr>';
            
              table += '    <td class="table-data">' + data[i].course_id + '</td>';
              table += '    <td class="table-data">' + data[i].course_code + '</td>';
              table += '    <td class="table-data">' + data[i].course_name + '</td>';
              table += '    <td class="table-data">' + data[i].course_description + '</td>';
              table += '    <td class="table-data">' + data[i].course_price + '</td>';
              table += '    <td class="table-data">' + data[i].create_date + '</td>';
              table += '    <td class="table-data"> <a href="#" data-toggle="modal" data-target="#imageModal"> <img src="../upload_image/' + data[i].course_banner_image + '" class="rounded" width="50px"></td>';
              table += '   <td class="table-data">' + data[i].subject_id + '</td>';
              
              table += '    <td>';
              table += '   <center>';
              table += '      <button class="open-modal-button btn px-3 btn-sm btn-info edit-branches " data-row="' + data[i].course_id + '" data-id="' + data[i].course_id + '" data-subject_id="' + data[i].subject_id + '"><i class="uil uil-cloud-upload"></i></button>';

              table += '   <button id="show-video" class="toggle-button btn px-3 btn-sm btn-info edit-branches " data-row="' + data[i].course_id + '" data-id="' + data[i].course_id + '"><i class="uil uil-eye"></i></button>';

              table += '   <button class="btn px-3 btn-sm btn-info edit-courses" data-id="' + data[i].course_id + '"><i class="uil uil-edit"></i></button>';
              table += '   <button class="btn px-3 btn-sm btn-danger remove-courses" data-id="' + data[i].course_id + '"><i class="uil uil-trash-alt"></i></button>';
              table += '    </td>';
              table += '   </center>';
            
              table += '  </tr>';
              table += '  <tr class="details-row" id="' + data[i].course_id + '" style="display:none;">';
              table += '    <td colspan="9" id="tdshowVideo' + data[i].course_id + '">  </td> ';
              table += '  </tr>';
            }
            
            table += '</tbody>';
            table += '</table>';
            $('#tableContainer_courses').html(table);
            tableselect_courses = $('#table-courses');
            $('#table-courses').on('click', '.remove-courses', function () {
                var course_id = $(this).data('id');
                row_select_courses = $(this).closest('tr');
                $('#btn-delete-courses-yes').data('id', course_id);
                $('#confirm-delete-courses').modal('show');

            });
            $('#table-courses').on('click', '.edit-courses', function () {

                row_select_courses = $(this).closest('tr');

                var course_id = row_select_courses.find('td:nth-child(1)').text()
                var course_code = row_select_courses.find('td:nth-child(2)').text()
                var course_name = row_select_courses.find('td:nth-child(3)').text()
                var course_description = row_select_courses.find('td:nth-child(4)').text()
                var course_price = row_select_courses.find('td:nth-child(5)').text()
                var course_banner_image = row_select_courses.find('td:nth-child(6)').text()

                var department_id_course = row_select_courses.find('td:nth-child(8)').text()
                //assignment td value to input in modal

                $('#m-course_id_1').val(course_id);
                $('#m-course_code').val(course_code);
                $('#m-course_name').val(course_name);
                $('#m-course_description').val(course_description);
                $('#m-course_price').val(course_price);

                $('#m-subject_id').val(department_id_course);
                $('#update-courses-Modal').modal("show");
            });
            // Get a reference to the modal element

            var modal = document.getElementById("uploadModal");
            $('#table-courses').on('click', '.open-modal-button', function () {
                var course_id = $(this).data('id');
                var subject_id = $(this).data('subject_id');
                const formupload1 = document.getElementById("uploadForm");
                var fileidd = 0;
                $("#file_id").val(0);
                $("#courseId").val(course_id);
                $("#videoDescription").val("");
                $("#videoTitle").val("");
                $("#subject_id_courses").val(subject_id);
                $(modal).modal("show");
            });
            const toggleButtons = document.querySelectorAll('.toggle-button');
            toggleButtons.forEach((button) => {
                button.addEventListener('click', () => {
                    const entity_idVideo = button.getAttribute('data-id');
                    const rowId = button.dataset.row;

                    const detailsRow = document.getElementById(rowId);
                    const videosRow = document.getElementById('tdshowVideo' + entity_idVideo);

                    if (detailsRow.style.display === 'none') {
                        // Video details row is hidden, show it
                        detailsRow.style.display = '';
                        button.innerHTML = '<i class="uil uil-eye-slash"></i> ';

                        // Make an AJAX request to load the video details
                        var url = "../php/coursesOpertion.php";
                        $.ajax({
                            url: url,
                            method: "post",
                            data: { function_name: 'showVideoDetails', 'id': entity_idVideo },
                            cache: false,
                            success: function (data) {

                                if (data.length > 1) {
                                    videosRow.innerHTML = data;

                                    const deleteVideos = document.querySelectorAll('.delete-video-btn');

                                    deleteVideos.forEach((deleteVideo) => {
                                        deleteVideo.addEventListener('click', () => {

                                            const videoId = deleteVideo.getAttribute('data-id').trim();
                                            var url = "../php/contentuploadsOpertion.php";
                                            $.ajax({
                                                type: "post",
                                                url: url,
                                                data: { function_name: 'delete_contentuploads', upload_id: videoId },
                                                cache: false,
                                                success: function (response) {
                                                    console.log(videoId);
                                                    const imageElement = document.getElementById('video-' + videoId);
                                                    imageElement.parentNode.remove();
                                                    // Handle success response here
                                                },
                                                error: function (xhr, status, error) {
                                                    // Handle error response here
                                                }
                                            });
                                        });
                                    });
                                    const editVideos = document.querySelectorAll('.edit-video-btn');
                                    editVideos.forEach(editVideo => {
                                        editVideo.addEventListener('click', () => {
                                            var course_id = $(this).data('course_id');
                                            var file_name = $(this).data('file_name');
                                            var desription = $(this).data('description_video');
                                            const videoId = editVideo.getAttribute('data-id').trim();
                                            const formupload = document.getElementById("uploadForm");
                                            $("#upload_id_course").val(videoId);
                                            const modalTitle = document.querySelector('.modal-title');
                                            modalTitle.innerText = 'edit video';


                                            const courseId = editVideo.dataset.course_id;
                                            const descriptionVideo = editVideo.dataset.description_video;
                                            const fileName = editVideo.dataset.file_name;
                                            $("#courseId").val(courseId);
                                            $("#videoDescription").val(descriptionVideo);
                                            $("#videoTitle").val(fileName);
                                            $(modal).modal("show");

                                            // const imageId = browserImage.id.split('-')[1];
                                            // const inputFile = document.createElement('input');
                                            // inputFile.type = 'file';
                                            // inputFile.accept = 'image/*';
                                            // inputFile.addEventListener('change', function (event) {
                                            //     const file = event.target.files[0];
                                            //     if (file) {
                                            //         const reader = new FileReader();
                                            //         reader.onload = function (e) {
                                            //             browserImage.src = e.target.result;
                                            //         };
                                            //         reader.readAsDataURL(file);
                                            //     }
                                            // });
                                            // inputFile.click();
                                        });
                                    });
                                }

                                else {
                                    videosRow.innerHTML = '<div class="ro mr-2">  Ther is no added Video For this  cources   </div>';
                                }
                            }
                        });
                    } else {
                        // Video details row is visible, hide it
                        detailsRow.style.display = 'none';
                        button.innerHTML = '<i class="uil uil-eye"></i>';
                    }
                });


            });

        }

    });
}