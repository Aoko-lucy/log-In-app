<?php
session_destroy();
unset($_SESSION['username']);
$_SESSION['echo']= "your now logged out";
header("Location:login.php");
?>