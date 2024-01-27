<div id="save-contentuploads-Modal" class="modal fade" value="" tabindex="- 1" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title col-md-10 offset-md-1">Add Books</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form id="save_contentuploads_form">

                    <div class="form-row" hidden>
                        <div class="form-group col-md-10 offset-md-1  mb-2 ">
                            <label for="s-upload_id">Upload ID</label>
                            <input type="number" class="form-control" id="s-upload_id" name="upload_id" value="0">
                        </div>
                    </div>


                    <div class="form-row">
                        <div class="form-group col-md-10 offset-md-1  mb-2 ">
                            <label for="s-title">Book Title</label>
                            <input type="text" class="form-control" id="s-title" name="title" data-validation="required">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-10 offset-md-1 mb-2">
                            <label for="s-content">Book Description</label>
                            <textarea class="form-control" id="s-content" name="content" data-validation="required"></textarea>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-10 offset-md-1  mb-2 ">
                            <label for="s-image" class="custom-file-upload">  <i class="uil uil-cloud-upload"> </i> Book Cover </label>
                            <input type="file" id="s-image" name="image" accept="image/*" data-validation="required" style="display: none;">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-10 offset-md-1  mb-2 ">
                        <label for="s-book" class="custom-file-upload">  <i class="uil uil-cloud-upload"> </i> Book File  </label>
                            <input class="file-upload" id="s-book" type="file" name="path[]" accept=".pdf, video/*" required multiple style="display: none;">
                            <div id="progress-bar">
                                <div class="fill"></div>
                                <div class="text"></div>
                            </div>
                        </div>
                    </div>



                    <div class="form-row">
                        <div class="form-group col-md-10 offset-md-1  mb-2 ">
                            <label for="s-subject_id" class="control-label">Departement</label>
                            <select name="subject_id" id="s-subject_id_2" class="form-control" data-validation="required">

                                <?php $queryselect = $conn->query("SELECT subject_id, CONCAT(`subject_id`,'-', `subject_name`) AS 'subject_name' FROM subjects"); ?>
                                <?php while ($row = $queryselect->fetch_assoc()) { ?>
                                    <option value="<?php echo $row['subject_id'] ?>"><?php echo $row['subject_name'] ?></option>
                                <?php
                                } ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-row" hidden>
                        <div class="form-group col-md-10 offset-md-1 mb-2">
                            <label for="s-course_id_2" class="control-label">Course Name</label>
                            <select name="course_id" id="s-course_id_2" class="form-control" required>
                                <option value="NULL"></option>
                                <?php $queryselect = $conn->query("SELECT course_id, CONCAT(`course_id`,'-', `course_code`,'-', `course_name`) AS 'course_code' FROM courses"); ?>
                                <?php while ($row = $queryselect->fetch_assoc()) { ?>
                                    <option value="<?php echo $row['course_id'] ?>"><?php echo $row['course_code'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-row" hidden>
                        <div class="form-group col-md-10 offset-md-1  mb-2 ">
                            <label for="s-content_type">content_type:</label>
                            <input type="text" class="form-control" id="s-content_type" name="content_type" data-validation="required" value="1">
                        </div>
                    </div>


                    <!-- <div class="form-row">
                        <div class="form-group col-md-10 offset-md-1  mb-2 ">
                            <label for="s-is_approved">is_approved:</label>
                            <input type="number" class="form-control" id="s-is_approved" name="is_approved" data-validation="required">
                        </div>
                    </div> -->

                </form>
            </div>
            <div class="modal-footer  justify-content-center">
                <button type="button" class="btn btn-primary SaveButton col-5 m-2" id="save-contentuploads">Save</button>
                <button type="button" class="btn btn-secondary CloseButton col-5 m-2" data-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>
<div id="update-contentuploads-Modal" class="modal fade" value="" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title col-md-10 offset-md-1 text-center">Update Book </h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form id="update_contentuploads_form">

                    <div class="form-row" hidden>
                        <div class="form-group col-md-10 offset-md-1 mb-2">
                            <label for="m-upload_id">Upload Id</label>
                            <input type="number" class="form-control" id="m-upload_id" name="upload_id" required>
                        </div>
                    </div>


                    <div class="form-row">
                        <div class="form-group col-md-10 offset-md-1 mb-2">
                            <label for="m-title">Book Title</label>
                            <input type="text" class="form-control" id="m-title" name="title" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-10 offset-md-1 mb-2">
                            <label for="m-content">content:</label>
                            <input type="text" class="form-control" id="m-content" accept="image/*" name="content" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-10 offset-md-1 mb-2">
                            <label for="m-image" class="custom-file-upload">   <i class="uil uil-cloud-upload"> </i> Book Cover Image</label>
                            <input type="file" class="form-control" id="m-image" name="image" required style="display: none;">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-10 offset-md-1 mb-2">
                        <label for="m-file" class="custom-file-upload">   <i class="uil uil-cloud-upload"> </i> Book File</label>
                            <input class="file-upload" id="m-file" type="file" name="path[]" accept=".pdf, video/*" required multiple style="display: none;">
                            <div class="progress-bar">
                                <div class="fill"></div>
                                <div class="text"></div>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-10 offset-md-1  mb-2 ">
                            <label for="m-subject_id" class="control-label">Departement</label>
                            <select name="subject_id" id="m-subject_id_2" class="form-control" data-validation="required">

                                <?php $queryselect = $conn->query("SELECT subject_id, CONCAT(`subject_id`,'-', `subject_name`) AS 'subject_name' FROM subjects"); ?>
                                <?php while ($row = $queryselect->fetch_assoc()) { ?>
                                    <option value="<?php echo $row['subject_id'] ?>"><?php echo $row['subject_name'] ?></option>
                                <?php
                                } ?>
                            </select>
                        </div>
                    </div>


                    <!-- <div class="form-row">
                        <div class="form-group col-md-10 offset-md-1 mb-2">
                            <label for="m-subject_id">subject_id:</label>
                            <input type="number" class="form-control" id="m-subject_id" name="subject_id" required>
                        </div>
                    </div> -->

                    <!-- <div class="form-row">
                        <div class="form-group col-md-10 offset-md-1 mb-2">
                            <label for="m-course_id_2" class="control-label">Cource Name</label>
                            <select name="course_id" id="m-course_id_2" class="form-control" required>
                                <?php $queryselect = $conn->query("SELECT course_id, CONCAT(`course_id`,'-', `course_code`,'-', `course_name`) AS 'course_code' FROM courses"); ?>
                                <?php while ($row = $queryselect->fetch_assoc()) { ?>
                                    <option value="<?php echo $row['course_id'] ?>"><?php echo $row['course_code'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div> -->

                    <div class="form-row" hidden>
                        <div class="form-group col-md-10 offset-md-1 mb-2">
                            <label for="m-content_type">content_type:</label>
                            <input type="text" class="form-control" id="m-content_type" name="content_type" value="1">
                        </div>
                    </div>




                </form>
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-primary SaveButton  col-5 m-2 " id="update-contentuploads">Save</button>
                <button type="button" class="btn btn-secondary CloseButton col-5 m-2 " data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<div class="modal" id="confirm-delete-contentuploads">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirm Deletion</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body mb-2 ">
                Are you sure you want to delete the content upload data?
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-secondary CloseButton col-5 m-2 " data-dismiss="modal">No</button>
                <button type="button" class="btn btn-primary CloseButton col-6 m-2 " id="btn-delete-contentuploads-yes">Yes</button>
            </div>
        </div>
    </div>
</div>