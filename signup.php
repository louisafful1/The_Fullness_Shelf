<?php
include 'include/database.php';
if(isset($_POST['submit'])){
	$name = test_input($_POST['name']);
	$email = test_input($_POST['email']);
	$username = test_input($_POST['username']);
	$password = test_input($_POST['password']);
    $confirm = test_input($_POST['confirm']);

	$sql1 = mysqli_query($connection, "INSERT INTO users VALUES(DEFAULT, '$name', '$email', '$username', '$password')");
   $sql2 = mysqli_query($connection, "SELECT * FROM users WHERE email='$email'");
  $row = mysqli_num_rows($sql2);
   


if(!$name){
	echo "<p style='color:red;'>This filled is required</p>";
} elseif($sql1){
   		echo "<p style='color:green;'>Successfully Signed up</p>";
   		// sleep(3000);
   		// echo "<script> document.location='login.php';</script>";
   }
   else{
   	echo "<p style='color:red;'>Sorry, this email already exist</p>";

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
	<title>Signup</title>
<link rel="stylesheet" type="text/css" href="css/signup.css">

</head>
<body>

<form action="" method="post" name="signup">
	 <center><h1>Signup</h1></center>
	<label>Name</label><br>
	<input class="input" type="text" name="name"><br><br>

	<label>Email</label><br>
	<input class="input" type="email" name="email"><br><br>

	<label>Username</label><br>
	<input class="input" type="text" name="username"><br><br>

	<label id="password">Password</label><br>
	<input class="input" type="password" name="password"><br><br>

	<label id="confirm">Confirm Password</label><br>
	<input class="input" type="password" name="confirm"><br><br>

	<input class=" register adjust" type="submit" name="submit" value="Signup" onclick="test(signup)"><br>
	<p align="center">already have an account, login now? <a href="login.php">login now</a></p>

</form><br><br>
<script type="text/javascript">

</script>
</body>
</html
