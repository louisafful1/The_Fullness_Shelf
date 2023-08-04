<?php
include 'include/session.php';
include "include/database.php";

//Remove button
$user_id = $_SESSION['user_id'];
$select_from_cart = mysqli_query($connection, "SELECT * FROM cart WHERE user_id = '$user_id';") or die("query failed");

	$fetch = mysqli_fetch_array($select_from_cart);
if(isset($_GET['delete'])){
	$id = $_GET['delete'];
	$del = mysqli_query($connection, "DELETE FROM cart where id = '$id'; ") or die('query failed');
	 header('location:cart.php');
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Cart Page</title>
	<link rel="stylesheet" type="text/css" href="css/cart.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<style type="text/css">
	
body{
	background: lightgrey;
	margin-top: 70px;
}
</style>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
     <link rel="stylesheet" href='https://api.mapbox.com/mapbox-gl-js/v2.1.1/mapbox-gl.css'> 

</head>
<body>
<div class="upper-fluid">
<div class="free">
	<div class="get-free-delivery">GET FREE DELIVERY</div>
	<div class="fullness-express">
		<p>FULLNESS <em>EXPRESS</em></p>
		<p>Missing GHC 28.09 to reach free delivery</p>

	</div>

</div>
</div>


<div id="main-contaner">
<form method="post">
<?php 

$user_id = $_SESSION['user_id'];
$select_from_cart = mysqli_query($connection, "SELECT * FROM cart WHERE user_id = '$user_id';") or die("query failed");
$count = mysqli_num_rows($select_from_cart);
// session_start();
$_SESSION['count'] = $count;
if (mysqli_num_rows($select_from_cart) == 0){

?>
<div class="empty-cart">No Item Added Yet</div>

<?php

}else{

$total= 0;
$num_of_items = mysqli_num_rows($select_from_cart);
if($arrange = mysqli_num_rows($select_from_cart) >0){
	while($fetch = mysqli_fetch_array($select_from_cart)){
$title = $fetch['title'];

	$pro = mysqli_query($connection, " SELECT * from products where title ='$title'");
while($arr = mysqli_fetch_array($pro)){

?>
	<div id="cart_container">
	<a href="book-details.php"><img src="admin/uploaded_img/<?php echo $fetch['image'];?>" alt="<?php echo $fetch['title']?>"></a>
      <div id="item_details">
		<div class="item_title"><?php echo "<b>Title:</b> ". $fetch['title']?></div>
		<div class="item_author"><?php echo "<b>Author:</b> ". $arr['author']?></div>
		<del><div class="item_price"><?php echo "GH"."&#x20B5; ". number_format($fetch['price']).".00";?></div></del>
		<strong><div class="item_price"><?php echo "GH"."&#x20B5; ".number_format($fetch['price'])-(number_format($fetch['price']) * ($arr['discount']/100));?></div></strong>
		<a class="button" href="cart.php?delete=<?php echo $fetch['id']; ?>" onclick=" return confirm('Do you want to remove this item')">REMOVE</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input class="quantity" type="number" name="" value="<?php echo $fetch['quantity'];?>">
	</div>
</div>
	<input type="hidden" name="item_title">
	<input type="hidden" name="item_price">
</form>
	<?php	
	$sub = $fetch['quantity']*$fetch['price'];	
	$total += $sub;

	}
}

?>
</div>


<?php

}
$select_from_cart = mysqli_query($connection, "SELECT * FROM cart WHERE user_id = '$user_id';") or die("query failed"); $fetch = mysqli_fetch_array($select_from_cart);
?>


<br>
<div class="fluid">
<div class="checkout"><a class="checkout-link" href="checkout.php?cart_id=<?php echo $fetch['id'];?>&amount=<?php echo $total;?>&num=<?php echo $num_of_items;?> ">CHECKOUT (GH&#x20B5; <?php echo number_format($total);?>.00)</a></div></div><br><br>
<?php 
}?>

</body>
</html>
