<?php


require('cone.php');
$id=$_REQUEST['id'];
$query = "DELETE FROM libt WHERE id=$id"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());
header("Location: search.php"); 
?>