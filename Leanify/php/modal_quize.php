<div id="save-quize-Modal" class="modal fade" value="" tabindex="- 1" role="dialog" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h5 class="modal-title col-md-10 offset-md-1"> Add quize</h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <form id="add_quize">
          <div class="container my-3">

            <div class="form-group">
              <label for="quiz-title">Test Title:</label>
              <input type="text" class="form-control" id="quiz-title">
            </div>

            <div id="question-container"></div>

            <button class="btn btn-primary m-2 col-5" onclick="addQuestion()">Add Question</button>
            <button type="submit" id="btnAddQuize"> save </button>
        </form>
      </div>
    </div>
  </div>
</div>
</div>