<?php
//require("modules/db.php"); 
     
    if ($_POST['submit']) {
        mysql_connect ("127.0.0.1", "arezki", "") or die ('Error: ' . mysql_error());
        mysql_select_db("calendar") or die ('Data error:' . mysql_error());
        $text = mysql_real_escape_string($_POST['comments']); 
        $query="INSERT INTO tasks (user_note) VALUES ('$text')";
        mysql_query($query) or die ('Error updating database' . mysql_error());
    }
?>


<form method="post" action='arezki'>
    <textarea name="comments">Example Comment</textarea>
    <input name="submit" type="submit" value="submit" />
</form>
