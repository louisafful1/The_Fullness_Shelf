<?php
include "include/database.php";
if(
// if(isset($_POST['title']) and isset($_POST['author']) and isset($_POST['quantity']) and isset($_POST['unit']) and isset($_POST['total']) and isset($_POST['image']) and 
isset($_POST['add-item'])){

	$title =mysqli_real_escape_string($connection, $_POST['title']);
	$author =strtoupper($_POST['author']);
	$quantity = $_POST['quantity'];
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

		$insert = mysqli_query($connection, "INSERT INTO products VALUES(DEFAULT, '$title', '$author', '$quantity', '$unit', '$total', '$image')") or die("query failed");


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
	<title></title>
	<style type="text/css">

		            body{
  margin-top: 90px;

}
		

		#add-item{

  border: 2px solid black;
  /*margin-top: 40px;*/
  margin: 20px;
  margin-right: 70%;
}

table{
	width: 90%;
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
<form method="post" enctype="multipart/form-data">	
&nbsp;&nbsp;<label>Title</label><br>
&nbsp;&nbsp;<input type="text" name="title" required><br>

&nbsp;&nbsp;<label>Author</label><br>
&nbsp;&nbsp;<input type="text" name="author"><br>

&nbsp;&nbsp;<label>Quantity</label><br>
&nbsp;&nbsp;<input type="number" name="quantity" required><br>

&nbsp;&nbsp;<label>Unit Price</label><br>
&nbsp;&nbsp;<input type="number" name="unit" required><br>

&nbsp;&nbsp;<label>Image</label><br>
&nbsp;&nbsp;<input type="file" name="image" accept="image/jpg, image/jpeg, image/png"><br><br>

&nbsp;&nbsp;<input type="submit" name="add-item"><br>
</form>
</div>


<br><br>
<?php
if(isset($_POST['add-item'])){
$insert = mysqli_query($connection, "INSERT INTO products VALUES(DEFAULT, '$title', '$author', '$quantity', '$unit', '$total', '$image')") ;
$select =mysqli_query($connection, "SELECT * FROM products ORDER BY title");
// $row = mysqli_fetch_row($select);

$i=1;
echo "<table border='2' > 
<tr>
    <th>S/N</th>
	<th>Title</th>
	<th>Author</th>
    <th>Quantity</th>
    <th>Unit Price</th>
    <th>Total Price</th>
    <th>Image</th>

</tr>";


while ($row=mysqli_fetch_row($select)) {
	# code...

echo "<tr>
	<td>".$i++."</td><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td><td>".$row[4]."</td><td>".$row[5]."</td><td>".$row[6]."</td></tr>";

}

echo "</table>";
}

?>

	<script type="text/javascript" src="index.js"></script>
</body>
</html>