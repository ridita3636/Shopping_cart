<?php
$host="localhost";
$u_id="root";
$pass="";
$conn=mysqli_connect($host,$u_id,$pass) or die(mysql_error());
mysqli_select_db($conn,"cart") or die("Database Not Found...! ");

?>