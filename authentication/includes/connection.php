<?php
$servername="localhost";
$username="root";
$password="";
$database="authentication";
//create connection
$connection=mysqli_connect("localhost","root","","authentication");
//check connection
if (!$connection) {
	die("connection failed:".mysqli_connect_error());
}
//echo "connection successfully";

?>