<div id="save-subjects-Modal" class="modal fade" value="" tabindex="- 1" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title col-md-10 offset-md-1">Add  Departements</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form id="save_subjects_form">
                    <div class="form-row" hidden>
                        <div class="form-group col-md-10 offset-md-1  mb-2 ">
                            <label for="s-subject_id">Subject ID</label>
                            <input type="number" class="form-control" id="s-subject_id" name="subject_id" >
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-10 offset-md-1  mb-2 ">
                            <label for="s-subject_name">Department Name</label>
                            <input type="text" class="form-control" id="s-subject_name" name="subject_name" data-validation="required">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-10 offset-md-1  mb-2 ">
                            <!-- <label for="s-image_banner">Cover Image</label>
                            <label for="s-image_banner" class="custom-file-upload"> -->
                            <label for="s-image_banner"  class="custom-file-upload">
                            <i class="uil uil-cloud-upload"> </i> Choose File
                            </label>
                            <input type="file" id="s-image_banner" name="image_banner" data-validation="required" accept="image/*" style="display: none;">
                        </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer  justify-content-center">
                <div class="row">
                    <div class="col-6  p-1"> 
                        <button type="button" class="btn btn-primary  SaveButton" id="save-subjects">save</button> 
                    </div>
                    <div class="col-6  p-1">  
                        <button type="button" class="btn btn-secondary CloseButton " data-dismiss="modal">close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="update-subjects-Modal" class="modal fade" value="" tabindex="- 1" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title col-md-10 offset-md-1 text-center">Update Departement</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form id="update_subjects_form">
                    <div class="form-row" hidden>
                        <div class="form-group col-md-10 offset-md-1  mb-2 ">
                            <label for="m-subject_id">Subject ID</label>
                            <input type="number" class="form-control" id="m-subject_id" name="subject_id" data-validation="required">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-10 offset-md-1  mb-2 ">
                            <label for="m-subject_name">Departement Name</label>
                            <input type="text" class="form-control" id="m-subject_name" name="subject_name" data-validation="required">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-10 offset-md-1  mb-2 ">
                            <label for="m-image_banner" class="custom-file-upload">Cover Image</label>
                            <input type="file" id="m-image_banner" name="image_banner"  accept="image/*" style="display: none;">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer justify-content-start">
                <button type="button" class="btn btn-primary SaveButton col-5 m-2 " id="update-subjects">Save</button>
                <button type="button" class="btn btn-secondary  CloseButton  col-5 m-2" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>


</div>
<div class="modal" id="confirm-delete-subjects">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header ">
                <h5 class="modal-title text-center ">Confirm Deletion</h5>
                <button type="button" class="close " data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body mb-2 text-center">
                Are you sure you want to delete the subject data ,All data associated with this row will be deleted ?
            </div>
            <div class="modal-footer">
                <div class="row">
                <button type="button" class="btn btn-secondary SaveButton col-5 m-2" data-dismiss="modal">No</button>
                <button type="button" class="btn btn-primary CloseButton col-5 m-2 " id="btn-delete-subjects-yes">Yes</button>
                </div>
            </div>
        </div>
    </div>
</div>

