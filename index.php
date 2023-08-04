<?php
include "include/database.php";
if(isset($_POST['add-to-cart'])){
  header("location:login.php");
}

?>

<?php require "include/navbar.html"; ?>

<marquee class="bg-primary"><h4>Christmas Sales - Live Now!</h4></marquee>
<div class="products">
<div class="main-container">
 <?php
include "include/database.php";
$select = mysqli_query($connection, "SELECT * FROM products LIMIT 6");
 
if( mysqli_num_rows($select) >0){
while($fetch = mysqli_fetch_array($select)){
?>

<!-- product box -->
<form method="post" class="display-form" action=""> 
<div class="display-container">
<a href="book-details.php?id=<?php echo $fetch['product_id'];?>"><img src="admin/uploaded_img/<?php echo $fetch['image'];?>"></a>
<div class="item_name"><?php echo $fetch['title']; ?></div>
<div class="price"><?php echo  "GH"."&#x20B5; ".$fetch['unit'].".00"; ?></div>
<div class="discount">-<?php echo $fetch['discount']."%"; ?></div>
<input type="number" min="1" name="quantity" class="quantity" value="1"><br>
<input type="hidden" name="title" value="<?php echo $fetch['title']; ?>">  
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
