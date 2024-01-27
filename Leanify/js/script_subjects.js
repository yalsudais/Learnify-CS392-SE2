

var row_select_subjects;
var tableselect_subjects;
$(document).ready(function () {

    loadSubjects();
    $('#save-subjects').on('click', function () {
        if (validateForm('save_subjects_form')) {
            var form = $('#save_subjects_form')[0];
            var formData = new FormData(form);
            formData.append('function_name', 'add_subjects');
            $.ajax({
                url: '../php/subjectsOpertion.php',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function (data) {
                    console.log(data);
                     loadSubjects();
                    
                    // Your success code here
                    $('#save-subjects-Modal').modal("hide");
                    alert_toast("successfully",'success');
                }
            });
        }
    });
    $('#update-subjects').on('click', function () {
        if (validateForm('update_subjects_form')) {
            var form = $('#update_subjects_form')[0];
            var formData = new FormData(form);
            formData.append('function_name', 'update_subjects');
            $.ajax({
                url: '../php/subjectsOpertion.php',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function (data) {
                    console.log(data);
                    loadSubjects();
                    $('#update-subjects-Modal').modal("hide");
                }
            });
        }
    });
    $('#btn-delete-subjects-yes').on('click', function () {

        var subject_id = $(this).data('id');
        $.ajax({
            url: '../php/subjectsOpertion.php',
            type: 'POST',
            data: {
                function_name: "delete_subjects",
                subject_id: subject_id
            },
            success: function (data) {
              
                $('#confirm-delete-subjects').modal('hide');
                // Your success code here
                if (data.trim() == "1") {
                    row_select_subjects.remove();
                } else {
                    console.error("Failed to find selected row");
                }
            }
        });
        $('#confirm-delete-vendors').modal('hide');
    });

    var button = document.getElementById("btn-delete-subjects-yes");

    // Assign a click event handler to the button
    button.addEventListener("click", function () {
        // Perform other actions here
    });
    $('#add-subjects').on('click', function () {
        $('#save-subjects-Modal').modal("show");
    });

    //$('#table-subjects').on('click', '.edit-subjects', function() {
    //       $('#update-subjects-Modal').modal("show");
    //    });

});



function loadSubjects() {
    $.ajax({
        url: '../php/subjectsOpertion.php',
        type: 'post',
        data: {
            function_name: "select_data"
        },
        dataType: 'json',
        success: function (data) {
            
            var table = '<div class=" Responsive Table"> <table id="table-subjects" class="table table-striped table-rounded table-hover table-shadow text-center table-bordered  table-colored ">';
            table += '<thead>';
            table += '  <tr>';
            table += '    <th class="table-header">Subject ID</th>';
            table += '    <th class="table-header">Subject Name</th>';
            table += '    <th class="table-header">Image Banner</th>';
            table += '    <th class="table-header">Operation</th>';
            table += '  </tr>';
            table += '</thead>';
            table += '<tbody>';
            for (var i = 0; i < data.length; i++) {
              table += '  <tr>';
              table += '    <td class="table-data">' + data[i].subject_id + '</td>';
              table += '    <td class="table-data">' + data[i].subject_name + '</td>';
              table += '    <td class="table-data"> <a href="#" data-toggle="modal" data-target="#imageModal"> <img src="../upload_image/' + data[i].image_banner + '" class=" rounded" width="50" ></td>';
              table += '    <td>';
              table += '      <center>';
              table += '        <button class="btn px-3 btn-sm btn-info edit-subjects" data-id="' + data[i].subject_id + '"><i class="uil uil-edit"></i></button>';
              table += '        <button class="btn px-3 btn-sm btn-danger remove-subjects" data-id="' + data[i].subject_id + '"><i class="uil uil-trash-alt"></i></button>';
              table += '      </center>';
              table += '    </td>';
              table += '  </tr>';
            } 
            table += '</tbody>';

            table += '</table> </div>';

            $('#tableContainer_subjects').html(table);
            tableselect_subjects = $('#table-subjects');
            $('#table-subjects').on('click', '.remove-subjects', function () {
                var subject_id = $(this).data('id');
                row_select_subjects = $(this).closest('tr');
                $('#btn-delete-subjects-yes').data('id', subject_id);
                $('#confirm-delete-subjects').modal('show');

            });
            $('#table-subjects').on('click', '.edit-subjects', function () {

                row_select_subjects = $(this).closest('tr');

                var subject_id = row_select_subjects.find('td:nth-child(1)').text()
                var subject_name = row_select_subjects.find('td:nth-child(2)').text()
                var image_banner = row_select_subjects.find('td:nth-child(3)').text()
                //assignment td value to input in modal

                $('#m-subject_id').val(subject_id);
                $('#m-subject_name').val(subject_name);
                // $('#m-image_banner').val(image_banner);
                $('#update-subjects-Modal').modal("show");
            });
        }
    });
}
