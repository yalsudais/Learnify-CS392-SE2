<div id="save-courses-Modal" class="modal fade" value="" tabindex="- 1" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title col-md-10 offset-md-1">Add Course</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form id="save_courses_form">

                    <div class="form-row" hidden>
                        <div class="form-group col-md-10 offset-md-1  mb-2 ">
                            <label for="s-course_id">Cource ID</label>
                            <input type="number" class="form-control" id="s-course_id" name="course_id">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-10 offset-md-1  mb-2 ">
                            <label for="s-course_code">Cource Code</label>
                            <input type="text" class="form-control" id="s-course_code" name="course_code" data-validation="required">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-10 offset-md-1  mb-2 ">
                            <label for="s-course_name">Cource Name</label>
                            <input type="text" class="form-control" id="s-course_name" name="course_name" data-validation="required">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-10 offset-md-1  mb-2 ">
                            <label for="s-course_description">Description</label>
                            <input type="text" class="form-control" id="s-course_description" name="course_description" data-validation="required">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-10 offset-md-1  mb-2 ">
                            <label for="s-course_price">Cource Price</label>
                            <input type="number" class="form-control" id="s-course_price" name="course_price">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-10 offset-md-1 mb-2">
                        <label for="s-course_banner_image" class="custom-file-upload">   <i class="uil uil-cloud-upload"> </i> Choose Cover Image </label>
                            <input type="file" class="form-control" id="s-course_banner_image" name="course_banner_image" accept="image/*" data-validation="required" style="display: none;">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-10 offset-md-1  mb-2 ">
                            <label for="s-subject_id" class="control-label">Departement</label>
                            <select name="subject_id" id="s-subject_id" class="form-control" data-validation="required">

                                <?php $queryselect = $conn->query("SELECT subject_id, CONCAT(`subject_id`,'-', `subject_name`) AS 'subject_name' FROM subjects"); ?>
                                <?php while ($row = $queryselect->fetch_assoc()) { ?>
                                    <option value="<?php echo $row['subject_id'] ?>"><?php echo $row['subject_name'] ?></option>
                                <?php
                                } ?>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer  justify-content-center">
                <button type="button" class="btn btn-primary SaveeButton col-5 m-2" id="save-courses">Save</button>
                <button type="button" class="btn btn-secondary CloseButton col-5 m-2" data-dismiss="modal">close</button>

            </div>
        </div>
    </div>
</div>
<div id="update-courses-Modal" class="modal fade" value="" tabindex="- 1" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title col-md-10 offset-md-1 text-center">Update Course</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form id="update_courses_form">

                    <div class="form-row" hidden >
                        <div class="form-group col-md-10 offset-md-1  mb-2 ">
                            <label for="m-course_id_1">Cource ID</label>
                            <input type="number" class="form-control" id="m-course_id_1" name="course_id" data-validation="required">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-10 offset-md-1  mb-2 ">
                            <label for="m-course_code">Cource Code</label>
                            <input type="text" class="form-control" id="m-course_code" name="course_code" data-validation="required">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-10 offset-md-1  mb-2 ">
                            <label for="m-course_name">Cource Name</label>
                            <input type="text" class="form-control" id="m-course_name" name="course_name" data-validation="required">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-10 offset-md-1  mb-2 ">
                            <label for="m-course_description">Description</label>
                            <input type="text" class="form-control" id="m-course_description" name="course_description" data-validation="required">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-10 offset-md-1  mb-2 ">
                            <label for="m-course_price">Cource Price</label>
                            <input type="number" class="form-control" id="m-course_price" name="course_price">
                        </div>
                    </div>



                    <div class="form-row">
                        <div class="form-group col-md-10 offset-md-1 mb-2">
                        <label for="m-course_banner_image" class="custom-file-upload">   <i class="uil uil-cloud-upload"> </i> Choose Cover Image </label>
                            <input type="file" class="form-control" id="m-course_banner_image" name="course_banner_image" style="display: none;">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-10 offset-md-1  mb-2 ">
                            <label for="m-subject_id" class="control - label">Department</label>
                            <select name="subject_id" id="m-subject_id" class="form-control" data-validation="required">


                                <?php $queryselect = $conn->query("SELECT subject_id, CONCAT(`subject_id`,'-', `subject_name`) AS 'subject_name' FROM subjects"); ?>
                                <?php while ($row = $queryselect->fetch_assoc()) { ?>
                                    <option value="<?php echo $row['subject_id'] ?>"><?php echo $row['subject_name'] ?></option>
                                <?php
                                } ?>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-primary SaveButton col-5 m-2" id="update-courses">Save</button>
                <button type="button" class="btn btn-secondary CloseButton col-5 m-2" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>


</div>


<div id="uploadModal" class="modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title col-md-10 offset-md-1 text-center w-100">Upload Video</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="upload-container">

                    <form class="video-upload-form" id="uploadForm" data-file_id="0" method="post" enctype="multipart/form-data">
                        <input type="text" name="course_id" id="courseId" hidden>
                        <div class="form-row" hidden>
                            <div class="form-group col-md-10 offset-md-1  mb-2 ">
                           
                                <input type="number" class="form-control" id="upload_id_course" name="upload_id" value="0">
                            </div>
                        </div>
                     
                        <input type="text" class="form-control" name="content_type" data-validation="required" value="3" hidden>
           
                        <input type="text" name="subject_id" id="subject_id_courses" hidden>

                        <div class="video-details-form justify-content-center ">
                            <div class="col">
                                <input type="text" class="form-control p-2 m-2 " name="title" id="videoTitle" placeholder="Title Video" data-validation="required">
                            </div>
                            <div class="col">
                            <textarea name="content" id="videoDescription"  class="form-control p-2 m-2 " placeholder="Description Video" data-validation="required"></textarea>
                            </div>
                        </div>
                        <label for="upload-file" class="custom-file-upload">   <i class="uil uil-cloud-upload"> </i> Choose File </label>
                        <input class="file-upload "  id="upload-file" type="file" name="path[]" accept="video/*" data-validation="required" multiple style="display: none;">
                        <div id="progress-bar">
                            <div class="fill"></div>
                            <div class="text">
                            </div>
                        </div>
                        <video class="video-preview w-100 m-2 rounded" controls></video>
                        <button class="btn btn-primary submit-button w-100 p-2" type="submit">Upload</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal" id="confirm-delete-courses">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirm Deletion</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body mb-2 ">
                Are you sure you want to delete the course data ,All data associated with this row will be deleted?
            </div>
            <div class="modal-footer  ">
                <button type="button" class="btn btn-secondary SaveButton col-5 m-2  " data-dismiss="modal">No</button>
                <button type="button" class="btn btn-primary CloseButton col-5 m-2 " id="btn-delete-courses-yes">Yes</button>
            </div>
        </div>
    </div>
</div>