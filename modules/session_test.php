
<?php 
session_start();
if( $_SESSION['user'] != null){
    echo "logged in";
}
else{
    echo "not logged in";
    echo $_SESSION['user'] ;
}

?> 