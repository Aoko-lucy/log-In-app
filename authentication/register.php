<?php
session_start();
include ('includes/connection.php');
if (isset($_POST['register_btn'])) {
	$username=mysqli_real_escape_string($_POST['username']);
	$email=mysqli_real_escape_string($_POST['email']);
	$password=mysqli_real_escape_string($_POST['password']);
	$password_2=mysqli_real_escape_string($_POST['password_2']);
	if ($password == $password_2) {
		//create user
		$password =md5($password);//harsh password before storing
		$sql="INSERT INTO users('username, email, password') VALUES('$username','$email', 'password'";
		mysqli_query($conn,$sql);
		$_SESSION['message'] = "Your are now logged in";
		$_SESSION['username']= "$username";
		header("Location:login.php");
		}else{
			$_SESSION['message'] = "The two password do not match";
		}

	}
	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration users, log out and log in</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<div class="container">
<div class="row">
<div class="col-md-12">
<div class="header">
	<h1>Register users</h1>
</div>

	<form method="post" action="register.php">
	<table>
	<tr>
	<td>Username:</td>
	<td><input type="text" name="username" class="text-input"></td>
		</tr>
		
	    <tr>
		<td>Email:</td>
		<td><input type="text" name="email" class="text-input"></td>
          </tr><br>
		<tr>
		<td>password: </td>
		<td><input type="password" name="password" class="text-input"></td>
	    </tr>
		<tr>
		<td>confirm password: </td>
		<td><input type="password" name="password_2" class="text-input" ></td>
	      </tr>
			<td></td>
		<td> <input type="submit" name="register_btn" value="register"></td>
	
	</table>
</form>

</div>
</div>
</div>
<script>
    function validate() {
      var Username=document.Login_form.username.value;
      if (Username=="") 
      {
        alert('please Enter email');
        return false;
      }
      var Password=document.Login_form.password.value;
      if (Password=="") 
      {
        alert('please Enter password');
        return false;
      }
      return true;
    }
  </script>
<script src="js/jquery-3.2.1.slim.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>