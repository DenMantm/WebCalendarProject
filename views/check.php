      
         <?php  
include_once("../modules/db.php");  
  
  $sth = $db->prepare(" SELECT * FROM Meetings ORDER BY meetingID desc");  
  $result = $sth->fetch();
  
 ?>  

     

<!DOCTYPE html>

<html lang="en">

<head>

<?php include('partials/head.php') ?>
 
            
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>  
           <link rel="stylesheet" href="https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">  
            <link rel="stylesheet" href="css/check.css"> 
           
</head>

<body>
  <?php
include('partials/navbar.php');

?>


       
      
           <br /><br />  
           <div class="container" style="width:900px;">  
                <h2 align="center">Here you can check by 'DATE' all your Meetings !</h2>  
                <h3 align="center" Style=" color:red "><b>My Meetings with Paul Hayes Humm!!!!</b></h3><br />  
                
                <form id = "aform">
                        <div class="col-md-3">  
                             <input type="text" name="from_date" id="from_date" class="form-control" placeholder="From Date" />  
                        </div>  
                        <div class="col-md-3">  
                             <input type="text" name="to_date" id="to_date" class="form-control" placeholder="To Date" />  
                        </div>  
                        <div class="col-md-5">  
                             
                              <button class="btn btn-primary" type="button" name="filter" id="filter" value="Filter"> Filter</button>
                        </div>  
                        
                </form>
                
                
                <div style="clear:both"></div>                 
                <br />  
                <div id="order_table">  
                     <table class="table table-bordered">  
                          <tr>  
                               <th width="15%">Meeting No̲</th>  
                               <th width="5%">Title</th>  
                               <th width="30%">Subject</th>  
                               <th width="43%">Date</th>  
                           
                               <th width="12%">Location</th>    
                          </tr>  
                          
                     <?php  
                     while ($row = $result)
                     
                      $sth->execute();
              
                     {  
                     ?>  
                          <tr> 
                          
                               <td><?php echo $row["meetingID"]; ?></td> 
                               <td><?php echo $row["title"]; ?></td>  
                               <td><?php echo $row["subject"]; ?></td>  
                               <td><?php echo $row["date"]; ?></td>  
                               
                               <td><?php echo $row["location"]; ?></td>  
                               <td>
                                  
                <a class="delete_product" data-id="<?php echo $row["meetingID"]; ?>" href="javascript:void(0)">
                <i class="glyphicon glyphicon-trash"></i>
                </a></td>
                               
                          </tr>  
                          
                        
                     <?php  
                     
                     }  
                     
                     ?>  
                     </table>  
                </div>  
           </div>  
      </body>  
 </html>  
 
  
<script src="js/check.js"></script>
<script>
	$(document).ready(function(){
		
		$('.delete_product').click(function(e){
			alert("hello there");
			e.preventDefault();
		
			var pid = $(this).attr('data-id');
			var parent = $(this).parent("td").parent("tr");
			
			bootbox.dialog({
			  message: "Are you sure you want to Delete ?",
			  title: "<i class='glyphicon glyphicon-trash'></i> Delete !",
			  buttons: {
				success: {
				  label: "No",
				  className: "btn-success",
				  callback: function() {
					 $('.bootbox').modal('hide');
				  }
				},
				danger: {
				  label: "Delete!",
				  className: "btn-danger",
				  callback: function() {
				
					  
					  $.post('filter.php', { 'delete':pid })
					  .done(function(response){
						  bootbox.alert(response);
						  parent.fadeOut('slow');
					  })
					  .fail(function(){
						  bootbox.alert('Something Went Wrog ....');
					  })
					  					  
				  }
				}
			  }
			});
			
			
		});
		
	});
</script>