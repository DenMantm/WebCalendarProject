<div class="modal fade" id="newteamtask" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">New meeting</h4>
      </div>
    
      <form id="team_mf" role="form" data-disable="true" data-toggle="validator">  
        <div class="modal-body">
          <div class="form-group">
            <div class="row">
              <label class="col-sm-2" control-label>Task Name</label>
              <div class="col-sm-10">
                <input type="text" name="title_text"id="tt_name" class="form-control" placeholder="Enter The Task Title here" required/>
              </div>
            </div>
          </div>
          
          <div class="form-group">
            <div class="row">
              <label class="col-sm-2" control-label>Team</label>
              <div class="col-sm-10">
                <select id="tt_team" class="js-example-basic-single js-states form-control" multiple="multiple" style="width: 100%;">
                  <?php include '../modules/getteams.php'?>
                </select>
              </div>
            </div>
          </div>
              
          <div class="form-group">
            <div class="row">
              <label htmlFor="inputName" class="col-sm-2" control-label>Details</label>
              <div class="col-sm-10">
                <textarea class="form-control" id="tt_details" placeholder="Enter meeting details here" rows="7"></textarea>
              </div>
            </div>
          </div>
              
          <div class="form-group">
            <div class="row">
              <label class="col-sm-2" control-label>To be compleeted by:</label>
              <div class="col-sm-10" >
                <div class="btn-group pull-left" data-toggle="buttons">
                  <label class="btn btn-primary active">
                    <input type="radio" name="compleeted" value="everyone" autocomplete="off" checked> Everyone
                  </label>
                  <label class="btn btn-primary">
                    <input type="radio" name="compleeted" value="single" autocomplete="off"> Only one person
                  </label>
                </div>
              </div>
            </div>  
          </div>
          
          <div class="form-group">
            <div class="row">
              <label htmlFor="inputDate" class="col-sm-2" control-label>Due date</label>
              <div class="col-sm-10">
                <input type="text" id="tt_to" name="date_text"class="form-control" placeholder="Choose date" required/>
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
 
        </div>
        <div class="modal-footer form-group">
          <button id="btnSaveNewTeamTask" type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>