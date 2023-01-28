<?php
include 'session.php';
include "include/database.php";
  $user_id = $_SESSION['user_id'];
$select = mysqli_query($connection, "SELECT * FROM orders WHERE user_id ='$user_id' and status ='confirmed' ORDER BY order_date;") or die("Query Failed");
?>


<!DOCTYPE html>
<html>
<head>
	<title>Inbox</title>
	<style type="text/css">	
.inbox{
border:2px solid red;
padding: 10px;
padding-left: 20px;
color: blue;
cursor: pointer;
gap:15px;

}

	</style>
</head>
<body>

	<?php
if(mysqli_num_rows($select)>0) {
	while($group = mysqli_fetch_array($select)){
	?>
	<div class="inbox" id="inbox">	
Hey, <?php echo $group['fname'];?>! 
<p>Your order with an ID of <?php echo $group['order_id'];?> has been shipped.</p> You've got five working Days to pick it up. Thank you.

	</div>
<?php }}
else{
	echo "No Message Here";
}

?>


<script type="text/javascript">	

function myfunction() {

var inbox = document.getElementById('inbox');
inbox.style.color ="black";


}
var effected = inbox.addEventListener("click", myfunction,true);
window.onload

</script>
</body>
</html>