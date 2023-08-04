<?php
include 'include/session.php';
include "include/database.php";

if(isset($_POST['add-to-cart'])){
  $title = test_input($_POST['title']);
  $author = test_input($_POST['author']);
  $price = test_input($_POST['price']);
  $image =test_input($_POST['image']);
  $quantity = test_input($_POST['quantity']);
  $user_id = $_SESSION['user_id'];

$select_from_cart = mysqli_query($connection, "SELECT * FROM cart where title = '$title' and user_id ='$user_id';");


if(mysqli_num_rows($select_from_cart) > 0){
  echo "<script> alert('You\'ve already added this item to the cart');</script>";

}else{
 $insert = mysqli_query($connection, "INSERT INTO cart VALUES (DEFAULT, '$user_id', '$title','$author', '$quantity','$price', '$image');") or die("query failed");
  if($insert){
    echo "<script> alert('You added this item to the cart');</script>";
  }
  
}

}

function test_input($data){
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  
  return $data;
  }
  

?>	

<head>
<link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/shopping.css">
</head>
<body>

<!-- include the session navbar -->
<?php require "include/session-navbar.php"; ?>

<h1>Featured Books</h1>
<div class="products">
<div class="main-container">
 <?php
include "include/database.php";
$select = mysqli_query($connection, "SELECT * FROM products order by author");
 
if( mysqli_num_rows($select) >0){
while($fetch = mysqli_fetch_array($select)){
?>

<form method="post" class="display-form" action=""> 
<div class="display-container">
<a href="book-details.php?id=<?php echo $fetch['product_id'];?>"><img src="admin/uploaded_img/<?php echo $fetch['image'];?>"></a>
<div class="name"><?php echo $fetch['title']; ?></div>
<div class="price">GH&#x20B5; <?php echo number_format($fetch['unit']); ?>.00</div>
<div class="discount">-<?php echo $fetch['discount']."%"; ?></div>
<input type="number" min="1" name="quantity" class="qty" value="1"><br>
<input type="hidden" name="title" value="<?php echo $fetch['title']; ?>"> 
<input type="hidden" name="author" value="<?php echo $fetch['author']; ?>"> 
<input type="hidden" name="price" value="<?php echo $fetch['unit']; ?>">
<input type="hidden" name="image" value="<?php echo $fetch['image']; ?>">
<input type="submit" name="add-to-cart" class="btn bg-primary" value="Add To Cart">
</div>
</form>

 <?php
}
     }else{
   echo "No Product added yet";

     }

?>
</div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>
