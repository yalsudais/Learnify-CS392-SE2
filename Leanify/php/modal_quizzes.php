 <div id="save-quizzes-Modal" class="modal fade" value="" tabindex="- 1" role="dialog" aria-labelledby="" aria-hidden="true">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header text-center">
                 <h5 class="modal-title2 col-md-10 offset-md-1">Modal title2</h5>
                 <button type="button" class="close" data-dismiss="modal">&times;</button>
             </div>
             <div class="modal-body">


                 <div class="form - row">
                     <div class="form-group col-md-10 offset-md-1  mb-2 text-right">
                         <label for="s-quiz_id2">quiz_id2:</label>
                         <input type="number" class="form-control" id="s-quiz_id2" name="s-quiz_id2" required>
                     </div>
                 </div>


                 <div class="form - row">
                     <div class="form-group col-md-10 offset-md-1  mb-2 text-right">
                         <label for="s-user_id2">user_id2:</label>
                         <input type="number" class="form-control" id="s-user_id2" name="s-user_id2" required>
                     </div>
                 </div>


                 <div class="form - row">
                     <div class="form-group col-md-10 offset-md-1  mb-2 text-right">
                         <label for="s-title2">title2:</label>
                         <input type="text" class="form-control" id="s-title2" name="s-title2" required>
                     </div>
                 </div>


                 <div class="form - row">
                     <div class="form-group col-md-10 offset-md-1  mb-2 text-right">
                         <label for="s-description2">description2:</label>
                         <input type="text" class="form-control" id="s-description2" name="s-description2" required>
                     </div>
                 </div>

             </div>
             <div class="modal-footer  justify-content-start">
                 <button type="button" class="btn btn-primary" id="save-quizzes">حفظ</button>
                 <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>

             </div>
         </div>
     </div>
 </div>
 <div id="update-quizzes-Modal" class="modal fade" value="" tabindex="- 1" role="dialog" aria-labelledby="" aria-hidden="true">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title2 col-md-10 offset-md-1 text-center">Modal title2</h5>
                 <button type="button" class="close" data-dismiss="modal">&times;</button>
             </div>
             <div class="modal-body">



                 <div class="form-row" hidden>
                     <div class="form-group col-md-10 offset-md-1  mb-2 text-right">
                         <label for="m-quiz_id2">quiz_id2:</label>
                         <input type="number" class="form-control" id="m-quiz_id2" name="m-quiz_id2" required>
                     </div>
                 </div>



                 <div class="form-row" hidden>
                     <div class="form-group col-md-10 offset-md-1  mb-2 text-right">
                         <label for="m-user_id2">user_id2:</label>
                         <input type="number" class="form-control" id="m-user_id2" name="m-user_id2" required>
                     </div>
                 </div>



                 <div class="form-row">
                     <div class="form-group col-md-10 offset-md-1  mb-2 text-right">
                         <label for="m-title2">title2:</label>
                         <input type="text" class="form-control" id="m-title2" name="m-title2" required>
                     </div>
                 </div>



                 <div class="form-row">
                     <div class="form-group col-md-10 offset-md-1  mb-2 text-right">
                         <label for="m-description2">description2:</label>
                         <input type="text" class="form-control" id="m-description2" name="m-description2" required>
                     </div>
                 </div>

             </div>
             <div class="modal-footer justify-content-start">
                 <button type="button" class="btn btn-primary" id="update-quizzes">حفظ</button>
                 <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
             </div>
         </div>
     </div>


 </div>
 <div class="modal" id="confirm-delete-quizzes">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title2">تاكيد عملية الحذف</h5>
                 <button type="button" class="close" data-dismiss="modal">&times;</button>
             </div>
             <div class="modal-body mb-2 text-right">
                 هل انت تريد حذف بيانات الصف فعلا؟
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-dismiss="modal">لا</button>
                 <button type="button" class="btn btn-primary" id="btn-delete-quizzes-yes">نعم</button>
             </div>
         </div>
     </div>
 </div>
 
 </main>