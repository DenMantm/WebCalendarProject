<!DOCTYPE HTML>
<html>  
<body>

<form action="arezki3.php" method="GET">
    
Name: <input name="name"><br>

E-mail: <input type="text" name="email"><br>

<input type="submit">

</form>
Welcome <?php echo $_GET["name"]; ?><br>
Your email address is: <?php echo $_GET["email"]; ?>

</body>
</html>