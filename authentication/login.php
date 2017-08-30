<?php
session_start();
include ('includes/connection.php');
?>
<?php
if (isset($_POST['btn_login'])) {
   $email=ucfirst(mysqli_real_escape_string($conn,$_POST['username']));
   $password=ucfirst(mysqli_real_escape_string($conn,$_POST['Password']));
    $password=md5($password); //remeber we hashed password before storing last time
   $sql ="SELECT * FROM user WHERE username='$username'AND password='$password'";
   $result=mysqli_query($conn, $sql);
   if (mysqli_num_rows($result) == 1){
    $_SESSION['message'] = "your are now logged in";
    $_SESSION['username'] = "username";
 
   }else{
    $_SESSION['message']= "username/password combination incorrect";
   }
     header("location:home.php"); //redirect to index page
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Login App</title>
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

    <?php
    if (isset($_SESSION['message'])) {
      echo "<div id='error_msg'>".$_SESSION['message']."</div>";
      unset($_SESSION['message']);
    }
    ?>
<form action="login.php" method="post" name="Login_form" onsubmit="return validate()">
<table>
<tr>
  <td>Username:</td>
  <td><input type="text" name="username" class="text-input"></td>
    </tr>
    <tr>
    <td>password: </td>
    <td><input type="password" name="password" class="text-input"></td>
      </tr>
     <td><input type="submit" name="btn_login" class="btn btn-warning"/> </td>
     <td><a href="register.php">Not a member?</a></td>
  
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