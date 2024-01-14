<div id="save-contentuploads-Modal" class="modal fade" value="" tabindex="- 1" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title col-md-10 offset-md-1">Modal Title</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form id="save_contentuploads_form">

                    <div class="form-row">
                        <div class="form-group col-md-10 offset-md-1  mb-2 ">
                            <label for="s-upload_id">upload_id:</label>
                            <input type="number" class="form-control" id="s-upload_id" name="upload_id" data-validation="required">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-10 offset-md-1  mb-2 ">
                            <label for="s-user_id">user_id:</label>
                            <input type="number" class="form-control" id="s-user_id" name="user_id" data-validation="required">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-10 offset-md-1  mb-2 ">
                            <label for="s-title">title:</label>
                            <input type="text" class="form-control" id="s-title" name="title" data-validation="required">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-10 offset-md-1  mb-2 ">
                            <label for="s-content">content:</label>
                            <input type="text" class="form-control" id="s-content" name="content" data-validation="required">
                        </div>
                    </div>

                    <div class="form-row">
                        <input class="file-upload" type="file" name="path[]" accept=".pdf, video/*" required multiple>
                        <div class="progress-bar">
                            <div class="fill"></div>
                            <div class="text"></div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-10 offset-md-1  mb-2 ">
                            <label for="s-image">image:</label>
                            <input type="file" class="form-control" id="s-image" name="image" accept="image/*" data-validation="required">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-10 offset-md-1  mb-2 ">
                            <label for="s-subject_id">subject_id:</label>
                            <input type="number" class="form-control" id="s-subject_id" name="subject_id" data-validation="required">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-10 offset-md-1  mb-2 ">
                            <label for="s-course_id" class="control-label">course_id</label>
                            <select name="course_id" id="s-course_id" class="form-control" data-validation="required">

                                <?php $queryselect = $conn->query("SELECT course_id, CONCAT(`course_id`,'-', `course_code`,'-', `course_name`) AS 'course_code' FROM courses"); ?>
                                <?php while ($row = $queryselect->fetch_assoc()) { ?>
                                    <option value="<?php echo $row['course_id'] ?>"><?php echo $row['course_code'] ?></option>
                                <?php
                                } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-10 offset-md-1  mb-2 ">
                            <label for="s-content_type">content_type:</label>
                            <input type="text" class="form-control" id="s-content_type" name="content_type" data-validation="required">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-10 offset-md-1  mb-2 ">
                            <label for="s-upload_time">upload_time:</label>
                            <input type="date" class="form-control" id="s-upload_time" name="upload_time" data-validation="required">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-10 offset-md-1  mb-2 ">
                            <label for="s-is_approved">is_approved:</label>
                            <input type="number" class="form-control" id="s-is_approved" name="is_approved" data-validation="required">
                        </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer  justify-content-start">
                <button type="button" class="btn btn-primary" id="save-contentuploads">save</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">close</button>

            </div>
        </div>
    </div>
</div>
<div id="update-contentuploads-Modal" class="modal fade" value="" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title col-md-10 offset-md-1 text-center">Modal Title</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form id="update_contentuploads_form">

                    <div class="form-row">
                        <div class="form-group col-md-10 offset-md-1 mb-2">
                            <label for="m-upload_id">upload_id:</label>
                            <input type="number" class="form-control" id="m-upload_id" name="upload_id" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-10 offset-md-1 mb-2">
                            <label for="m-user_id">user_id:</label>
                            <input type="number" class="form-control" id="m-user_id" name="user_id" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-10 offset-md-1 mb-2">
                            <label for="m-title">title:</label>
                            <input type="text" class="form-control" id="m-title" name="title" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-10 offset-md-1 mb-2">
                            <label for="m-content">content:</label>
                            <input type="text" class="form-control" id="m-content" name="content" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <input class="file-upload" type="file" name="path[]" accept=".pdf, video/*" required multiple>
                        <div class="progress-bar">
                            <div class="fill"></div>
                            <div class="text"></div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-10 offset-md-1 mb-2">
                            <label for="m-image">image:</label>
                            <input type="file" class="form-control" id="m-image" name="image" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-10 offset-md-1 mb-2">
                            <label for="m-subject_id">subject_id:</label>
                            <input type="number" class="form-control" id="m-subject_id" name="subject_id" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-10 offset-md-1 mb-2">
                            <label for="m-course_id" class="control-label">course_id:</label>
                            <select name="course_id" id="m-course_id" class="form-control" required>
                                <?php $queryselect = $conn->query("SELECT course_id, CONCAT(`course_id`,'-', `course_code`,'-', `course_name`) AS 'course_code' FROM courses"); ?>
                                <?php while ($row = $queryselect->fetch_assoc()) { ?>
                                    <option value="<?php echo $row['course_id'] ?>"><?php echo $row['course_code'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-10 offset-md-1 mb-2">
                            <label for="m-content_type">content_type:</label>
                            <input type="text" class="form-control" id="m-content_type" name="content_type" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-10 offset-md-1 mb-2">
                            <label for="m-upload_time">upload_time:</label>
                            <input type="date" class="form-control" id="m-upload_time" name="upload_time" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-10 offset-md-1 mb-2">
                            <label for="m-is_approved">is_approved:</label>
                            <input type="number" class="form-control" id="m-is_approved" name="is_approved" required>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer justify-content-start">
                <button type="button" class="btn btn-primary" id="update-contentuploads">Save</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                <button type="button" class="btn btn-primary" id="btn-delete-contentuploads-yes">Yes</button>
            </div>
        </div>
    </div>
</div>