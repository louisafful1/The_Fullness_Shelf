<?php
include 'include/session.php';
include "include/database.php";

if(isset($_POST['place-order']) and isset($_POST['payment'])){
$order_id = rand(10000000, 99999999);
$user_id = $_SESSION['user_id'];
$fname = test_input($_POST['fname']);
$sname = test_input($_POST['sname']);
$phone = test_input($_POST['phone']);
$region = test_input($_POST['region']);
$address = test_input($_POST['address']);
$amount = test_input($_GET['amount']);
$num_of_items = test_input($_GET['num']);
$payment = test_input($_POST['payment']);
$cart_id = test_input($_GET['cart_id']);
$order_date = test_input(date("y-m-d"));
$status = "pending";
$insert_into_orders = mysqli_query($connection, "INSERT INTO orders VALUES('$order_id', '$user_id', '$fname', '$sname', '$phone', '$region', '$address', '$amount', '$num_of_items', '$payment', '$cart_id', '$order_date', '$status');") or die("Query failed");

$user_id = $_SESSION['user_id'];

if($insert_into_orders and !empty($fname) and !empty($sname) and !empty($phone) and !empty($region) and !empty($address)  ){
	echo "<script>alert('submitted');</script>";
	$empty_cart =mysqli_query($connection, "DELETE FROM cart WHERE user_id = '$user_id'") or die("query failed");
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
	<title>Checkout Page</title>
<link rel="stylesheet" type="text/css" href="css/checkout.css">
</head>
<body>

<!-- checkout form -->
<form method="post" name="order">
<center><h1>Checkout Now</h1></center>
	&nbsp;&nbsp;&nbsp;&nbsp;<label>First Name</label><br>
	&nbsp;&nbsp;&nbsp;&nbsp;<input class="input" type="text" name="fname" required><br>

	&nbsp;&nbsp;&nbsp;&nbsp;<label>Last Name</label><br>
	&nbsp;&nbsp;&nbsp;&nbsp;<input class="input" type="text" name="sname" required><br>

	&nbsp;&nbsp;&nbsp;&nbsp;<label>Phone Number</label><br>
	&nbsp;&nbsp;&nbsp;&nbsp;<input class="input" type="number" name="phone" required><br>

	&nbsp;&nbsp;&nbsp;&nbsp;<label>Region</label><br>
	&nbsp;&nbsp;&nbsp;&nbsp;<input class="input" type="text" name="region" required><br>

	&nbsp;&nbsp;&nbsp;&nbsp;<label>Current Address</label><br>
	&nbsp;&nbsp;&nbsp;&nbsp;<input class="input" type="text" name="address" required><br>

	&nbsp;&nbsp;&nbsp;&nbsp;<label>Mode of payment</label><br>
	&nbsp;&nbsp;&nbsp;&nbsp;<select name="payment">
		<option value="Cash on delivery" selected>Cash on delivery</option>
		<option value="Mobile Money">Mobile Money</option>
		<option value="Bank Account">Bank Account</option>
	</select><br><br>
	<input class="place-order" type="submit" name="place-order" value="place-order">
</form>

</body>
</html>
