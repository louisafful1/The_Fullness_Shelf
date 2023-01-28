<?php
 session_start();
include 'include/database.php';
if(isset($_POST['submit'])){;
	$username = $_POST['username'];
	$password = $_POST['password'];


	
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
  
//    } else if($password!= '' && $confirm != ''){
// 		 	echo "<script>alert('The fields are empty')</script>";
// 			} else if($password != $confirm){
// echo "<script>Sorry, The Passwords do not match</script>";
// 		} else echo "<script>Successfully Signed up</script>";

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
	 <center><h1>User Login</h1></center>
	<label class="adjust">Username</label><br>
	<input class="adjust" type="text" name="username"><br><br>

	<label class="adjust" id="password">Password</label><br>
	<input class="adjust" type="password" name="password" required><br><br>

	<input class="adjust" type="submit" name="submit" onclick="test(signup)"><br>

	<p align="center">Don't have an account, signup now? <a href="signup.php">Signup Here</a></p>

</form><br><br>
<script type="text/javascript">
</script>
</body>
</html>