<div class="modal fade" id="newteammeeting" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">

            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">New meeting</h4>
            </div>
            
            
            <div class="modal-body">
                <div class="row">
                <label class="col-sm-2" control-label>Subject</label>
                <div class="col-sm-10">
                  <input type="text" name="title_text"id="tm_subject" class="form-control" placeholder="Enter The Task Title here" required/>
                  

                </div>
              </div>
              
              <div class="row">
                <label class="col-sm-2" control-label>Participants</label>
                <div class="col-sm-10">
                    <select id="tm_participants" class="js-example-basic-single js-states form-control" multiple="multiple" style="width: 100%;">
                        <?php include("../modules/getteams.php") ?>
                    </select>
                  
                </div>
              </div>
              
              <div class="row">
                <label htmlFor="inputCode" class="col-sm-2" control-label>Location</label>
                <div class="col-sm-10">
                  <input type="text"name="location_text" id="tm_location" class="form-control" placeholder="Enter meeting location here" required/>
                </div>
              </div>
              
             <div class="row">
                <label htmlFor="inputName" class="col-sm-2" control-label>Details</label>
                <div class="col-sm-10">
                  <textarea class="form-control" id="tm_details" placeholder="Enter meeting details here" rows="7"></textarea>
                </div>
              </div>
              
            <div class="row">
                <label htmlFor="inputDate" class="col-sm-2" control-label>Start date</label>
                <div class="col-sm-10">
                  <input type="text" id="tm_from" name="date_text"class="form-control" placeholder="Choose date"  required/>
                  <script type="text/javascript">
                    $(function() {
                      $('#m_from').datetimepicker();
                      dateFormat: 'yy-mm-dd'
                    });
                    
                  </script>
                  
                </div>
              </div>
            <div class="row">
                <label htmlFor="inputDate" class="col-sm-2" control-label>End date</label>
                <div class="col-sm-10">
                  <input type="text" id="tm_to" name="date_text"class="form-control" placeholder="Choose date" required/>
                  <script type="text/javascript">
                    $(function() {
                      $('#m_to').datetimepicker();
                      dateFormat: 'yy-mm-dd'
                      
                    });
                    
                  </script>
                  
                </div>
              </div>
              <!-- end of toggle -->
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button id="btnSaveNewTeamMeeting" class="btn btn-primary">Save</button>
            </div>

          </div>
        </div>
        </div>