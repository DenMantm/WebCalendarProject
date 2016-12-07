<!DOCTYPE html>
<html lang="en">

<head>
    
    <meta charset="UTF-8">
    <title>Asseign Tasks</title>
 

   
       
   <?php
   
  include('../views/partials/head.php')
   
   ?>
  <!--<script src="ajax/search.js"></script>-->
   <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>-->
   
</head>
 
<body>
    
  <?php
 include('../views/partials/navbar.php');

?>
    
    
    

    
    <!-- Content Section -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Manage your Meetings </h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="pull-right">
                <button class="btn btn-success" data-toggle="modal" data-target="#add_new_record_modal">Add New Meeting</button>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h3>Tasks:</h3>
 
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
                    <label for="start">start</label>
                    <input type="text" id="start" placeholder="start" class="form-control"/>
                </div>
                
                <div class="form-group">
                    <label for="end">end</label>
                    <input type="text" id="end" placeholder="end" class="form-control"/>
                </div>
 
 
 
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea type="text" id="description" placeholder="Description" class="form-control"/></textarea>
                </div>
 
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="addRecord()">Save This Task</button>
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