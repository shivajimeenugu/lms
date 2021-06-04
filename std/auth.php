

<?php
session_start();
if(!isset($_SESSION["stdusername"])){
header("Location: std_login.php");
exit(); }
?>
