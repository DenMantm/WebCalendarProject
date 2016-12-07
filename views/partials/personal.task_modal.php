<div class="modal fade" id="newpersonaltask" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">

            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">New meeting</h4>
            </div>
            
            
            <div class="modal-body">
                <div class="row">
                <label class="col-sm-2" control-label>Task Name</label>
                <div class="col-sm-10">
                  <input type="text" name="title_text"id="pt_name" class="form-control" placeholder="Enter the task display name here" required/>
                  

                </div>
              </div>
              
             <div class="row">
                <label htmlFor="inputName" class="col-sm-2" control-label>Details</label>
                <div class="col-sm-10">
                  <textarea class="form-control" id="pt_details" placeholder="Enter your tak details here" rows="7"></textarea>
                </div>
              </div>
              
              
            <div class="row">
                <label htmlFor="inputDate" class="col-sm-2" control-label>Due date</label>
                <div class="col-sm-10">
                  <input type="text" id="pt_to" name="date_text"class="form-control" placeholder="Choose due date" required/>
                  <script type="text/javascript">
                    $(function() {
                      $('#tt_to').datetimepicker({
                      format: 'DD/MM/YYYY'
                      });
                    });
                    
                  </script>
                  
                </div>
              </div>
              <!-- end of toggle -->
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button id="btnSaveNewPersonalTask" class="btn btn-primary">Save</button>
            </div>

          </div>
        </div>
        </div>