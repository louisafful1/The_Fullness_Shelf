<?php
include "include/database.php";
require "include/admin-navbar.html";
if(
// if(isset($_POST['title']) and isset($_POST['author']) and isset($_POST['quantity']) and isset($_POST['unit']) and isset($_POST['total']) and isset($_POST['image']) and 
isset($_POST['add-item'])){

	$title =mysqli_real_escape_string($connection, $_POST['title']);
	$author =strtoupper($_POST['author']);
	$quantity = $_POST['quantity'];
	$discount = $_POST['discount'];
	$unit =$_POST['unit'];
	$image =$_FILES['image']['name'];
    $image_size = $_FILES['image']['size'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_folder = 'uploaded_img/'.$image;



$total = $quantity * $unit;
	$select_title = mysqli_query($connection, "SELECT title FROM products WHERE title='$title'") or die('Query faild');
   
// var_dump($select_title);
		  if(mysqli_num_rows($select_title) > 0){
		$message[] = 'Sorry, This Book already exists!';
	} else{

		$insert = mysqli_query($connection, "INSERT INTO products VALUES(DEFAULT, '$title', '$author', '$quantity', '$discount', '$unit', '$total', '$image')") or die("query failed");


		if($insert){
			if($image_size > 2000000){
				$message[] = 'Sorry, This file is too large!';
			}else{
				 move_uploaded_file($image_tmp_name, $image_folder);
           
				  $message[] = 'Book has been successfully added to the shelf!';
			}
		}else{
			 $message[] = 'Sorry, This Book Could not be Added!';
		}
	}
	
}

?>
<?php

if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message" id = "msg" data-aos="zoom-out">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Add Stock</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
     <link rel="stylesheet" href='https://api.mapbox.com/mapbox-gl-js/v2.1.1/mapbox-gl.css'> 
<style type="text/css">

		            body{
  margin-top: 90px;

}
	<link rel="stylesheet" href	

#add-item{

  border: 2px solid black;
  /*margin-top: 40px;*/
  margin: 20px;
  margin-right: 70%;
}

table{
	width: 100%;
	border-collapse: collapse;
	margin-left: 5%;
}

td{
	padding: 8px;
	text-align: center;

}



	</style>
	<link rel="stylesheet" type="text/css" href="index.css">

</head>
<body>


<div id="add-item">
<form method="post" enctype="multipart/form-data" class="container">
  <div class="form-group">
    <label for="title">Title</label>
    <input type="text" name="title" id="title" class="form-control" required>
  </div>

  <div class="form-group">
    <label for="author">Author</label>
    <input type="text" name="author" id="author" class="form-control">
  </div>

  <div class="form-group">
    <label for="quantity">Quantity</label>
    <input type="number" name="quantity" id="quantity" class="form-control" required>
  </div>

  <div class="form-group">
    <label for="unit">Unit Price</label>
    <input type="number" name="unit" id="unit" class="form-control" required>
  </div>

  <div class="form-group">
    <label for="discount">Discount</label>
    <input type="number" name="discount" id="discount" class="form-control" required>
  </div>

  <div class="form-group">
    <label for="image">Image</label>
    <input type="file" name="image" id="image" class="form-control-file" accept="image/jpg, image/jpeg, image/png">
  </div>

  <input type="submit" name="add-item" value="Submit" class="btn btn-primary">
</form>

</div>


<br><br>
<?php
if(isset($_POST['add-item'])){
$insert = mysqli_query($connection, "INSERT INTO products VALUES(DEFAULT, '$title', '$author', '$quantity', '$unit', '$total', '$image')") ;
$select =mysqli_query($connection, "SELECT * FROM products ORDER BY title");
// $row = mysqli_fetch_row($select);

$i=1;
echo "<table border='0'> 
<tr>
    <th>S/N</th>
	<th style='text-align: center;'>Title</th>
	<th style='text-align: center;'>Author</th>
    <th style='text-align: center;'>Quantity</th>
    <th style='text-align: center;'>Unit Price</th>
    <th style='text-align: center;'>Total Price</th>
	<th style='text-align: center;'>Discount</th>
    <th style='text-align: center;'>Image</th>


</tr>";


while ($row=mysqli_fetch_row($select)) {
	# code...

echo "<tr>
	<td>".$i++."</td>
	<td>".$row[1]."</td>
	<td>".$row[2]."</td>
	<td>".$row[3]."</td>
	<td>".$row[5]."</td>
	<td>".$row[6]."</td>
	<td>".$row[4]."</td>
	<td>".$row[7]."</td>
	</tr>";

}
echo "</table>";
}

?>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

	<script type="text/javascript" src="index.js"></script>
</body>
</html>
