<!DOCTYPE html>
<html lang="en">

<head>
    
    <meta charset="UTF-8">
    <title>Asseign Tasks</title>
 

   
       
   <?php  include('../views/partials/head.php')   ?>
<script src='calendarLib/lib/moment.min.js'></script>
    <link rel="stylesheet" href="/css/calendar.css">
    <link href='css/main.css' rel='stylesheet' media='print' />
    <link href='calendarLib/fullcalendar.css' rel='stylesheet' />
    <link href='calendarLib/fullcalendar.print.css' rel='stylesheet' media='print' />
    <script src='calendarLib/lib/jquery.min.js'></script>
    <script src='calendarLib/lib/jquery-ui.min.js'></script>
    <script src='calendarLib/fullcalendar.min.js'></script>
    <script type="text/javascript" src="/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
    <link rel="stylesheet" href="/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/target.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
    <script type="text/javascript" src="js/select2.full.min.js"></script>
   
</head>
 
<body>
    
  <?php
 include('../views/partials/navbar.php');

?>
    
    
    

    
    <!-- Content Section -->
<div class="container">
    <div class="row"></br>
        <div class="col-md-12">
            <h1 style="margin: auto;
    width: 50%;">Manage your Meetings </h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="pull-right">
                <!--<button class="btn btn-success" data-toggle="modal" data-target="#add_new_record_modal">Add New Meeting</button>-->
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h3>List of meetings:</h3></br>
 
            <div class="records_content"></div>
        </div>
    </div>
</div>
<!-- /Content Section -->

<!-- Bootstrap Modals -->
<!-- Modal - Add New Record/User -->
<div class="modal fade" id="add_new_record_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-description" id="myModalLabel">Add New Meeting</h4>
            </div>
            
            
            <div class="modal-body">
 
               
 
                <div class="form-group">
                    <label for="subject">subject</label>
                    <input type="text" id="subject" placeholder="subject" class="form-control"/>
                </div>
                
               
                  <div class="form-group">
                    <label for="location">location</label>
                    <input type="text" id="location" placeholder="location" class="form-control"/>
                </div>
                
                 <div class="form-group">
                    <label htmlFor="inputDate" class="col-sm-2" control-label> Start</label>
                   
                        <input type="text" id="start" name="date_text" class="form-control" placeholder="Choose date" required/>
                        <script type="text/javascript">
                            $(function() {
                                $('#start').datetimepicker();
                                dateFormat: 'yy-mm-dd'
                            });
                        </script>
                  
                </div>
                
                
                   <div class="form-group">
                    <label htmlFor="inputDate" class="col-sm-2" control-label> end date</label>
                   
                        <input type="text" id="end" name="date_text" class="form-control" placeholder="Choose date" required/>
                        <script type="text/javascript">
                            $(function() {
                                $('#end').datetimepicker();
                                dateFormat: 'yy-mm-dd'
                            });
                        </script>
                    
                </div>
                
                
              
 
 
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea type="text" id="description" placeholder="Description" class="form-control"/></textarea>
                </div>
 
            </div>
            
            
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="addRecord()">Save</button>
            </div>
        </div>
    </div>
</div>
<!-- // Modal -->

<!-- Modal - Update User details -->
<div class="modal fade" id="update_user_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-description" id="myModalLabel">Update</h4>
            </div>
            <div class="modal-body">
 
 
                <div class="form-group">
                    <label for="update_subject">subject</label>
                    <input type="text" id="update_subject" placeholder="subject" class="form-control"/>
                </div>
                
                 <div class="row">
                <label class="col-sm-2" control-label>Participants</label>
                
                    <select id="tm_participants" class="js-example-basic-single js-states form-control" multiple="multiple" style="width: 100%;">
                        <?php include("../modules/getemails.php") ?>
                    </select>
                  
                
              </div>
              
              
                 <div class="form-group">
                    <label for="update_location">location</label>
                    <input type="text" id="update_location" placeholder="location" class="form-control"/>
                </div>
                  <div class="form-group">
                    <label for="update_start">start</label>
                    <input type="text" id="update_start" placeholder="start" class="form-control"/>
                </div>
                  <div class="form-group">
                    <label for="update_end">end</label>
                    <input type="text" id="update_end" placeholder="end" class="form-control"/>
                </div>
 
 
 
                <div class="form-group">
                    <label for="update_description">Description</label>
                    <input type="text" id="update_description" placeholder="Description" class="form-control"/>
                </div>
 
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="UpdateUserDetails()" >Save Changes</button>
                <input type="hidden" id="hidden_user_id">
            </div>
        </div>
    </div>
</div>
<!-- // Modal -->


<script src ="js/search.js">

</script>


 

 
</body>


</html>