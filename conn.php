<?php
$user_name = "u546923385_root";
$user_pass = "Happilearning";
$host_name = "127.0.0.1:3306";
$db_name = "u546923385_happilearning";

$con=mysqli_connect($host_name,$user_name,$user_pass,$db_name);
   if (mysqli_connect_errno())
   {
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
   }
 

?>