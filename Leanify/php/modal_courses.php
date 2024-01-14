<div id="save-courses-Modal" class="modal fade" value="" tabindex="- 1" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title col-md-10 offset-md-1">add course</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form id="save_courses_form">

                    <div class="form-row" hidden>
                        <div class="form-group col-md-10 offset-md-1  mb-2 ">
                            <label for="s-course_id">course_id:</label>
                            <input type="number" class="form-control" id="s-course_id" name="course_id">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-10 offset-md-1  mb-2 ">
                            <label for="s-course_code">course code:</label>
                            <input type="text" class="form-control" id="s-course_code" name="course_code" data-validation="required">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-10 offset-md-1  mb-2 ">
                            <label for="s-course_name">course name:</label>
                            <input type="text" class="form-control" id="s-course_name" name="course_name" data-validation="required">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-10 offset-md-1  mb-2 ">
                            <label for="s-course_description">course description:</label>
                            <input type="text" class="form-control" id="s-course_description" name="course_description" data-validation="required">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-10 offset-md-1  mb-2 ">
                            <label for="s-course_price">course price:</label>
                            <input type="number" class="form-control" id="s-course_price" name="course_price" >
                        </div>
                    </div>



                    <div class="form-row">
                        <div class="form-group col-md-10 offset-md-1 mb-2">
                            <label for="s-course_banner_image">course_banner_image:</label>
                            <input type="file" class="form-control" id="s-course_banner_image" name="course_banner_image" accept="image/*" data-validation="required">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-10 offset-md-1  mb-2 ">
                            <label for="s-subject_id" class="control-label">subject_id</label>
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
            <div class="modal-footer  justify-content-start">
                <button type="button" class="btn btn-primary" id="save-courses">save</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">close</button>

            </div>
        </div>
    </div>
</div>
<div id="update-courses-Modal" class="modal fade" value="" tabindex="- 1" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title col-md-10 offset-md-1 text-center">update course</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form id="update_courses_form">

                    <div class="form-row" hidden>
                        <div class="form-group col-md-10 offset-md-1  mb-2 ">
                            <label for="m-course_id_1">course_id:</label>
                            <input type="number" class="form-control" id="m-course_id_1" name="course_id" data-validation="required">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-10 offset-md-1  mb-2 ">
                            <label for="m-course_code">course_code:</label>
                            <input type="text" class="form-control" id="m-course_code" name="course_code" data-validation="required">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-10 offset-md-1  mb-2 ">
                            <label for="m-course_name">course_name:</label>
                            <input type="text" class="form-control" id="m-course_name" name="course_name" data-validation="required">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-10 offset-md-1  mb-2 ">
                            <label for="m-course_description">course_description:</label>
                            <input type="text" class="form-control" id="m-course_description" name="course_description" data-validation="required">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-10 offset-md-1  mb-2 ">
                            <label for="m-course_price">course_price:</label>
                            <input type="number" class="form-control" id="m-course_price" name="course_price" >
                        </div>
                    </div>



                    <div class="form-row">
                        <div class="form-group col-md-10 offset-md-1 mb-2">
                            <label for="m-course_banner_image">course_banner_image:</label>
                            <input type="file" class="form-control" id="m-course_banner_image" name="course_banner_image" >
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-10 offset-md-1  mb-2 ">
                            <label for="m-subject_id" class="control - label">subject_id</label>
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
            <div class="modal-footer justify-content-start">
                <button type="button" class="btn btn-primary" id="update-courses">save</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">close</button>
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
                Are you sure you want to delete the course data?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                <button type="button" class="btn btn-primary" id="btn-delete-courses-yes">Yes</button>
            </div>
        </div>
    </div>
</div>