<div id="save-subjects-Modal" class="modal fade" value="" tabindex="- 1" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title col-md-10 offset-md-1">add  departement</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form id="save_subjects_form">
                    <div class="form-row" hidden>
                        <div class="form-group col-md-10 offset-md-1  mb-2 ">
                            <label for="s-subject_id">subject_id:</label>
                            <input type="number" class="form-control" id="s-subject_id" name="subject_id" >
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-10 offset-md-1  mb-2 ">
                            <label for="s-subject_name">subject_name:</label>
                            <input type="text" class="form-control" id="s-subject_name" name="subject_name" data-validation="required">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-10 offset-md-1  mb-2 ">
                            <label for="s-image_banner">image_banner:</label>
                            <input type="file"  id="s-image_banner" name="image_banner" data-validation="required">
                        </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer  justify-content-start">
                <button type="button" class="btn btn-primary" id="save-subjects">save</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">close</button>
            </div>
        </div>
    </div>
</div>
<div id="update-subjects-Modal" class="modal fade" value="" tabindex="- 1" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title col-md-10 offset-md-1 text-center">update departement</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form id="update_subjects_form">
                    <div class="form-row" hidden>
                        <div class="form-group col-md-10 offset-md-1  mb-2 ">
                            <label for="m-subject_id">subject_id:</label>
                            <input type="number" class="form-control" id="m-subject_id" name="subject_id" data-validation="required">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-10 offset-md-1  mb-2 ">
                            <label for="m-subject_name">subject_name:</label>
                            <input type="text" class="form-control" id="m-subject_name" name="subject_name" data-validation="required">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-10 offset-md-1  mb-2 ">
                            <label for="m-image_banner">image_banner:</label>
                            <input type="file" id="m-image_banner" name="image_banner"  accept="image/*">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer justify-content-start">
                <button type="button" class="btn btn-primary" id="update-subjects">save</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">close</button>
            </div>
        </div>
    </div>


</div>
<div class="modal" id="confirm-delete-subjects">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirm Deletion</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body mb-2">
                Are you sure you want to delete the subject data?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                <button type="button" class="btn btn-primary" id="btn-delete-subjects-yes">Yes</button>
            </div>
        </div>
    </div>
</div>