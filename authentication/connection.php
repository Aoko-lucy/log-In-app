<?php
$servername="localhost";
$username="root";
$password="";
$database="authentication";
//create connection
$conn=mysqli_connect("localhost","root","","authentication");
//check connection
if (!$conn) {
	die("connection failed:".mysqli_connect_error());
}
echo "connection successfully";

?>