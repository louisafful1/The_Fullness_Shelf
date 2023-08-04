<?php
include 'include/admin-session.php';

require 'include/admin-navbar.php';
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
	</style>
</head>
<body>


<div id="add-item">
&nbsp;&nbsp;<label>Title</label><br>
&nbsp;&nbsp;<input type="text" name="title"><br>

&nbsp;&nbsp;<label>Author</label><br>
&nbsp;&nbsp;<input type="text" name="author"><br>

&nbsp;&nbsp;<label>Quantity</label><br>
&nbsp;&nbsp;<input type="number" name="quantity"><br>

&nbsp;&nbsp;<label>Unit Price</label><br>
&nbsp;&nbsp;<input type="number" name="unit"><br>

&nbsp;&nbsp;<label>Total Price</label><br>
&nbsp;&nbsp;<input type="text" name="total"><br>

&nbsp;&nbsp;<label>Image</label><br>
&nbsp;&nbsp;<input type="file" name="image"><br><br>


&nbsp;&nbsp;<input type="submit" name="submit"><br>
</div>
</body>
</html>
