<?php

include("include/database.php");

if(isset($_POST['confirm'])){


$status =$_POST['status'];
$id =  $_POST['hidden'];
 $update = mysqli_query($connection, "UPDATE orders SET status='$status' WHERE order_id='$id';");

 if($update){
 	$message[] = 'The order has successfully been confirmed!';
 }
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin Orders</title>
	<link rel="stylesheet" type="text/css" href="css/admin-orders.css">	

</head>
<body>


<div class="main-container">
<?php 

$sel = mysqli_query($connection, "SELECT * FROM orders WHERE status='pending';");
if(mysqli_num_rows($sel) >0){
while($array = mysqli_fetch_array($sel)){


?>

<div id="admin-orders">
	    <div>Order Id :<?php echo $array['order_id'] ; ?></div>
	<!-- <img src="">Image -->
	<div>Number of Items: <?php echo $array['num_of_items']  ?></div>
	<div>Amount:GH&#x20B5; <?php echo number_format($array['amount']);?>.00</div>
    <div>payment mode:<?php echo $array['payment'] ;  ?></div>
    <div>Address:<?php echo $array['address'] ;  ?></div>
    <div>Phone:<?php echo $array['phone'] ;  ?></div>
    <div>Date: <?php echo $array['order_date'] ;  ?></div>
    <form action="" method="POST">
    	<select name="status">
        	<option value="Pending">Pending</option>
        	<option value="Confirmed">Confirmed</option>
        </select>
<input type="hidden" name="hidden" value="<?php echo $array['order_id'];?>">
        <br><br>
        <input class="button" type="submit" name="confirm" value="Confirm Order">
    </form>
</div>

<?php
}
}else{
	?>
	<div class="empty">No Order has been placed yet!</div>
<?php
}

?>
</div>


</body>
</html>
