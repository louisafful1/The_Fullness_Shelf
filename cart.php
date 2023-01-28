<?php
include 'session.php';
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
	<title>CART</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

<style type="text/css">
body{

	background: lightgrey;
	margin-top: 70px;
}

.container a{
text-decoration: none;
color: white;
background: orange;
padding: 4px;
cursor: default;
border-radius: 50px;
font-size: 23px;
font-family: sans-serif;
font-style: italic;

	}

	.container{
		background: black;
		padding: 10px;
	}

	span{
		color: white;
		font-size: 23px;
font-family: sans-serif;
	}
#main-contaner{
	display: flex;
	flex-wrap: wrap;
	gap:13px;
	margin-top: 30px;
	padding-left: 65px;
}

	img{
		width: 100px;
		height: 150px;
	}

#cart_container{

		display: flex;
		border:1px solid white;
		padding: 5px;
        width: 340px;
        border-radius: 5px;
        background: white;

	
	}

	#cart_container #item_details{
		margin-top: 1rem;
		margin-left: 1rem

	}

	.button{
		 
		 /*border:none; */
		 color: orange;
border: 10px white;
text-decoration: none;
margin-top: 150px;
	}

	.button:hover{
		background:orange;
		padding: 5px;
		border-radius: 4px;
		color: white;

	}

	.quantity{
		width:40px;
		border:none;
		font-size: 15px;
		text-align: center; 
		height:20px;
		margin-bottom: 10px;
	}
.checkout-link{
text-decoration: none; 
color: white;
width: 40%;
}

.checkout-link:hover{
	color: white;
}
.checkout{
	color: white;
	background: orange;
	width: 40%;
	margin: 0 30%; 
	padding: 10px;
    border-radius: 5px; 
	font-family: sans-serif; 
	text-align: center;
	box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0,0,0, 0.19);
	font-size: 20px;

}
@media (max-width:480px){
 #cart_container{


		/*padding: 10px;*/
		margin: 0 35px;
        
       

	
	}
}
@media (max-width:768px){
 
#main-contaner{
	padding-left: 15px;
	margin-right: 15px;
}

    html{
        font-size: 50%;
    }



    	#cart_container #item_details{
		margin-top: 5rem;
		

	}

    .checkout{
    	 width: 70%;
    	 margin: 0 15%; 
    }


}
</style>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
     <link rel="stylesheet" href='https://api.mapbox.com/mapbox-gl-js/v2.1.1/mapbox-gl.css'> 

</head>
<body>
<div class="fluid" style="background: white; margin-left: 0;">
<div class="free" style="font-family: sans-serif; border:1px solid grey; border-radius: 3.5px; margin: 0 3%;">
	<div class="get-free-delivery" style=" background: lightgrey; border-radius: 3px; padding: 1rem; color: orange;">GET FREE DELIVERY</div>
	<div class="fullness-express" style="margin-top: 10px; background: white; padding-bottom: 0.1rem; border-radius: 12px;">
		<p>FULLNESS <em style="color: orange;">EXPRESS</em></p>
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


<!-- <div class="fluid" style="background: white; padding-bottom: 20px;"> -->
<div class="checkout" style="width: 100%; background: white; color: black; margin-top: 20%; margin-left: 50%; padding: 50px; width: 500px;">No Item Added Yet</div>
<!-- </div> -->
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
		<div style="margin-top: 7px; margin-bottom: 7px;" class="item_author"><?php echo "<b>Author:</b> ". $arr['author']?></div>
		<del><div class="item_price" style="font-size: 15px; font-style: italic;"><?php echo "GH"."&#x20B5; ". number_format($fetch['price']).".00";?></div></del>
		<strong><div style="font-size: 20px; margin-bottom: 10px" class="item_price"><?php echo "GH"."&#x20B5; ". number_format($fetch['price']) - ($fetch['price']/100);?></div></strong>
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

	// $it = 0;
	// echo array_sum($cart);

	}
}


?>
</div>




<?php

}
$select_from_cart = mysqli_query($connection, "SELECT * FROM cart WHERE user_id = '$user_id';") or die("query failed"); $fetch = mysqli_fetch_array($select_from_cart);
?>


<br>
<div class="fluid" style="background: white; padding: 20px 0;">
<div class="checkout"><a class="checkout-link" href="checkout.php?cart_id=<?php echo $fetch['id'];?>&amount=<?php echo $total;?>&num=<?php echo $num_of_items;?> ">CHECKOUT (GH&#x20B5; <?php echo number_format($total);?>.00)</a></div></div><br><br>
<?php 
}?>

</body>
</html>