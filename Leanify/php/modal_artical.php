<div id="save-contentArtical-Modal" class="modal fade" value="" tabindex="- 1" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title col-md-10 offset-md-1" id="titleArtical2">Add artical </h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form id="save_contentArtical_form">

                 
                <input type="hidden" name="articleId" id="article-id" value="">

                    <div class="form-row">
                        <div class="form-group col-md-10 offset-md-1  mb-2 ">
                            <label for="s-title_artical">Title:</label>
                            <input type="text" class="form-control" id="s-title_artical" name="title" data-validation="required">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-10 offset-md-1 mb-2">
                            <label for="s-content">Content </label>
                            <textarea class="form-control"  name="content" id="s-content-artical" data-validation="required"></textarea>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-10 offset-md-1  mb-2 ">
                            <label for="s-image_artical">Image:</label>
                            <input type="file"  name="image" id="s-image_artical" accept="image/*" data-validation="required">
                        </div>
                    </div>
                 
                 

                    <div class="form-row">
                        <div class="form-group col-md-10 offset-md-1  mb-2 ">
                            <label for="s-subject_id_artical" class="control-label">Subject ID</label>
                            <select name="subject_id" id="s-subject_id_artical" class="form-control" data-validation="required">

                                <?php $queryselect = $conn->query("SELECT subject_id, CONCAT(`subject_id`,'-', `subject_name`) AS 'subject_name' FROM subjects"); ?>
                                <?php while ($row = $queryselect->fetch_assoc()) { ?>
                                    <option value="<?php echo $row['subject_id'] ?>"><?php echo $row['subject_name'] ?></option>
                                <?php
                                } ?>
                            </select>
                        </div>
                    </div>

              
                    <div class="form-row" hidden>
                        <div class="form-group col-md-10 offset-md-1  mb-2 ">
                            <label for="s-content_type_artical">Content Type:</label>
                            <input type="text" class="form-control" id="s-content_type_artical"  name="content_type" data-validation="required" value="2">
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
            <div class="modal-footer  justify-content-start">
                <button type="button" class="btn btn-primary" id="save-contentAtrical">save</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">close</button>

            </div>
        </div>
    </div>
</div>
