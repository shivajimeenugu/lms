<?php


require('db.php');
$id=$_REQUEST['id'];

//$prompt_msg = "Please type your name.";
  //  $name = prompt($prompt_msg);


$query = "DELETE FROM bookdb WHERE id=$id"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());
header("Location: book_view.php"); 
?>