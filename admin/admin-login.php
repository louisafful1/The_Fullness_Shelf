<?php

include 'include/database.php';

if(isset($_POST['submit']) and isset($_POST['email'])){
$email =$_POST['email'];
$password =$_POST['password'];

$sql5 = mysqli_query($connection, "SELECT * FROM admin WHERE email ='$email' and password ='$password';");
$arr = mysqli_fetch_array($sql5);

if($arr > 0){
	include 'admin-session.php';
	session_start();
	$_SESSION['id'] = $arr['id'];

	header("location:admin-page.php");
	}else
	{	echo "<script> alert('Invalid username or Password');</script>";}


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
	 <center><h1>Admin Login</h1></center>
	<label class="adjust">Email</label><br>
	<input class="adjust" type="text" name="email"><br><br>

	<label class="adjust" id="password">Password</label><br>
	<input class="adjust" type="password" name="password" required><br><br>

	<input class="adjust" type="submit" name="submit"><br>
&nbsp;
	</form><br><br>
<script type="text/javascript">
</script>
</body>
</html>