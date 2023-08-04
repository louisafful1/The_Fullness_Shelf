<?php
 session_start();
include 'include/database.php';
if(isset($_POST['submit'])){;
	$username = test_input($_POST['username']);
	$password = test_input($_POST['password']);
	
$sql4 = mysqli_query($connection, "SELECT * FROM users WHERE username='$username' and password = '$password'");
 $row = mysqli_fetch_array($sql4);
   

   if($row>0){
   	 include 'include/session.php';
  session_start();
$_SESSION['username']=$row['username'];
$_SESSION['user_id']=$row['user_id'];
$_SESSION['password'] =$row['password'];
header("location:homepage.php");
   }else{
   	echo "<script> alert('Invalid username or Password');</script>";
   }
  

}
function test_input($data){
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	
	return $data;
	}
	


?>
<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
	<link rel="stylesheet" type="text/css" href="css/Login.css">

</head>
<body>

<form action="" method="post" name="signup">
	 <center><h1>User Login</h1></center>
	<label>Username</label><br>
	<input class="input" type="text" name="username"><br><br>

	<label id="password">Password</label><br>
	<input class="input" type="password" name="password" required><br><br>

	<input class="login" type="submit" name="submit" value="Login" onclick="test(signup)"><br>

	<p align="center">Don't have an account, signup now? <a href="signup.php">Signup Here</a></p>

</form><br><br>
<script type="text/javascript">
</script>
</body>
</html>
