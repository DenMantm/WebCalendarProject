<div class="modal fade" id="newteammeeting" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
              <label class="col-sm-2" control-label>Subject</label>
              <div class="col-sm-10">
                <input type="text" name="title_text"id="tm_subject" class="form-control" placeholder="Enter The Task Title here" required/>
              </div>
            </div>
          </div>
          
          <div class="form-group">
            <div class="row">
              <label class="col-sm-2" control-label>Participants</label>
              <div class="col-sm-10">
                <select id="tm_participants" class="js-example-basic-single js-states form-control" multiple="multiple" style="width: 100%;">
                  <?php include '../modules/getteams.php'?>
                </select>
              </div>
            </div>
          </div>
          
          <div class="form-group">
            <div class="row">
              <label htmlFor="inputCode" class="col-sm-2" control-label>Location</label>
              <div class="col-sm-10">
                <input type="text"name="location_text" id="tm_location" class="form-control" placeholder="Enter meeting location here" required/>
              </div>
            </div>
          </div>
          
          <div class="form-group">
            <div class="row">
              <label htmlFor="inputName" class="col-sm-2" control-label>Details</label>
              <div class="col-sm-10">
                <textarea class="form-control" id="tm_details" placeholder="Enter meeting details here" rows="7" required></textarea>
              </div>
            </div>
          </div>
              
          <div class="form-group">
            <div class="row">
              <label htmlFor="inputDate" class="col-sm-2" control-label>Start date</label>
              <div class="col-sm-10">
                <input type="text" id="tm_from" name="date_text"class="form-control" placeholder="Choose date"  required/>
              </div>
            </div>
          </div>
          
          <div class="form-group">
            <div class="row">
              <label htmlFor="inputDate" class="col-sm-2" control-label>End date</label>
              <div class="col-sm-10">
                <input type="text" id="tm_to" name="date_text"class="form-control" placeholder="Choose date" required/>
                <script type="text/javascript">
                            $(function () {
                                $('#tm_from').datetimepicker({
                                    format: "DD/MM/YYYY h:mm a",
                                    stepping: 10,
                                    sideBySide: true
                                });
                                $('#tm_to').datetimepicker({
                                    format: "DD/MM/YYYY h:mm a",
                                    stepping: 10,
                                    sideBySide: true,
                                    useCurrent: false //Important! See issue #1075
                                });
                                $("#tm_from").on("dp.change", function (e) {
                                    $('#tm_to').data("DateTimePicker").minDate(e.date);
                                });
                                $("#tm_to").on("dp.change", function (e) {
                                    $('#tm_from').data("DateTimePicker").maxDate(e.date);
                                });
                            });
                        </script>
              </div>
            </div>
          </div>
        </div>
        
        <div class="modal-footer form-group">
          <button id="btnSaveNewTeamMeeting" type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>