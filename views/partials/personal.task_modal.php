<div class="modal fade" id="newpersonaltask" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">New personal task</h4>
      </div>
            
      <div class="modal-body">
        <form id="personal_tf" role="form" data-disable="true" data-toggle="validator">
          <div class="form-group">
            <div class="row">
              <label for="pt_name" class="col-sm-2 control-label">Task Name</label>
              <div class="col-sm-10">
                <input type="text" id="pt_name" class="form-control" placeholder="Enter the task display name here" required>
                <div class="help-block with-errors"></div>
              </div>
            </div>
          </div>
            
          <div class="form-group">
            <div class="row">
              <label for="pt_details" class="col-sm-2 control-label">Details</label>
              <div class="col-sm-10">
                <textarea class="form-control" id="pt_details" placeholder="Enter your tak details here" rows="7" required></textarea>
                <div class="help-block with-errors"></div>
              </div>
            </div>
          </div>
            
          <div class="form-group">
            <div class="row">
              <label for="pt_to" class="col-sm-2 control-label">Due date</label>
              <div class="col-sm-10">
                <input type="text" id="pt_to" class="form-control" placeholder="Choose due date" required>
                <div class="help-block with-errors"></div>
                <script type="text/javascript">
                  $(function() {
                    $('#tt_to').datetimepicker({
                    format: 'DD/MM/YYYY'
                    });
                  });
                </script>
              </div>
            </div>
          </div>

          <div class="form-group modal-footer">
            <button id="btnSaveNewPersonalTask" type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>