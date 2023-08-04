<?php
session_start();
if(!isset($_SESSION['username'])){
	header("location:index.php");

}
$username = $_SESSION['username'];

?>
