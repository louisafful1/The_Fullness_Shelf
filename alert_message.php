<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style/style.css">
</head>
<body>
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


	<script type="text/javascript" src="js/index.js"></script>
</body>
</html>
