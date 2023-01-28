<?php
include 'include/database.php';
if(isset($_POST['submit'])){
	$name = $_POST['name'];
	$email = $_POST['email'];
	$username = $_POST['username'];
	$password = $_POST['password'];
    $confirm = $_POST['confirm'];

	$sql1 = mysqli_query($connection, "INSERT INTO users VALUES(DEFAULT, '$name', '$email', '$username', '$password')");
   $sql2 = mysqli_query($connection, "SELECT * FROM users WHERE email='$email'");
  $row = mysqli_num_rows($sql2);
   

   if($sql1){
   		echo "<script>alert('Successfully Signed up');
   		document.location='login.php';
</script>";
   }
   else{
   	echo "<script>alert('Sorry, this email already exist')</script>";
//    } else if($password!= '' && $confirm != ''){
// 		 	echo "<script>alert('The fields are empty')</script>";
// 			} else if($password != $confirm){
// echo "<script>Sorry, The Passwords do not match</script>";
// 		} else echo "<script>Successfully Signed up</script>";

}
   } 





?>



<!DOCTYPE html>
<html>
<head>
	<title></title>

	<style type="text/css">
		form{
			margin-top: 120px; 
			margin-left:500px; 
			width: 25%;
			border: 2px solid black;
		}

		.adjust{
			margin-left: 20px;
		}
	</style>
</head>
<body>

<form action="" method="post" name="signup">
	 <center><h1>Signup</h1></center>
	<label class="adjust">Name</label><br>
	<input class="adjust" type="text" name="name"><br><br>

	<label class="adjust">Email</label><br>
	<input class="adjust" type="email" name="email"><br><br>

	<label class="adjust">Username</label><br>
	<input class="adjust" type="text" name="username"><br><br>

	<label class="adjust" id="password">Password</label><br>
	<input class="adjust" type="password" name="password" required><br><br>

	<label class="adjust" id="confirm">Confirm Password</label><br>
	<input class="adjust" type="password" name="confirm" required><br><br>

	<input class="adjust" type="submit" name="submit" onclick="test(signup)"><br>
	<p align="center">already have an account, login now? <a href="login.php">Login now</a></p>

</form><br><br>
<script type="text/javascript">
	function test(signup){
		if(signup.password.value!=signup.confirm.value){
			alert("Please check the password very well!");
		 }else{
		 	signup.submit();
		 }
	}
</script>
</body>
</html>