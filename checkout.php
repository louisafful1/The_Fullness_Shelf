<?php
include 'session.php';
include "include/database.php";

if(isset($_POST['place-order']) and isset($_POST['payment'])){
$order_id = rand(10000000, 99999999);
$user_id = $_SESSION['user_id'];
$fname = htmlspecialchars($_POST['fname']);
$sname = htmlspecialchars($_POST['sname']);
$phone = htmlspecialchars($_POST['phone']);
$region = htmlspecialchars($_POST['region']);
$address = htmlspecialchars($_POST['address']);
$amount = htmlspecialchars($_GET['amount']);
$num_of_items = htmlspecialchars($_GET['num']);
$payment = htmlspecialchars($_POST['payment']);
$cart_id = htmlspecialchars($_GET['cart_id']);
$order_date = htmlspecialchars(date("y-m-d"));
$status = "pending";
$insert_into_orders = mysqli_query($connection, "INSERT INTO orders VALUES('$order_id', '$user_id', '$fname', '$sname', '$phone', '$region', '$address', '$amount', '$num_of_items', '$payment', '$cart_id', '$order_date', '$status');") or die("Query failed");
var_dump($user_id);
// $empty_cart = mysqli_query($connection, "DELETE  FROM cart WHERE cart.id ='$cart_id'");
// if ($empty_cart) {
// echo "Record deleted successfully";
// }else{

// echo "Error deleting record: ".mysqli_error($connection);
// }
$user_id = $_SESSION['user_id'];
// $select_from_cart = mysqli_query($connection, "SELECT * FROM cart ")

if($insert_into_orders and !empty($fname) and !empty($sname) and !empty($phone) and !empty($region) and !empty($address)  ){
	echo "<script>alert('submitted');</script>";
	$empty_cart =mysqli_query($connection, "DELETE FROM cart WHERE user_id = '$user_id'") or die("query failed");
	
}

}


?>


<!DOCTYPE html>
<html>
<head>
	<title>Checkout</title>

	<style type="text/css">
		select{
			width: 14%;
			height: 26px;
		}
	</style>
</head>
<body>
<h1>Hey there! You are about to check out</h1>


<form method="post" name="order">

	<label>First Name</label><br>
	<input type="text" name="fname" required><br>

	<label>Last Name</label><br>
	<input type="text" name="sname" required><br>

	<label>Phone Number</label><br>
	<input type="number" name="phone" required><br>

	<label>Region</label><br>
	<input type="text" name="region" required><br>

	<label>Current Address</label><br>
	<input type="text" name="address" required><br>

	<label>Mode of payment</label><br>
	<select name="payment">
		<option value="Cash on delivery" selected>Cash on delivery</option>
		<option value="Mobile Money">Mobile Money</option>
		<option value="Bank Account">Bank Account</option>
	</select><br><br>

	<input type="submit" name="place-order" value="place-order">


</form>
</body>
</html>