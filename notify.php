
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="w3.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Welcome Home</title>

</head>
<body  >
     <div class="w3-sidebar w3-bar-block w3-card w3-animate-left" style="display:none" id="mySidebar">
                             <button onclick="w3_close()" class="w3-bar-item w3-button w3-large">Close &times;</button>
                                       <a class="w3-bar-item w3-button" href="index.php">HOME</a>

                                       <a class="w3-bar-item w3-button" href="dashboard.php">DASHBOARD</a>
		
		

                                       

                                       <a class="w3-bar-item w3-button" href="logout.php">LOGOUT</a>
                             
            </div> 


<div class="w3-container w3-animate-right" id="main">
           <?php include 'header.php';?>


     

<div class="w3-container" >
<?php
include 'db.php';
include("auth.php");
if(isset($_POST['new']) && $_POST['new']==1)
{
$txt=$_REQUEST['txt'];
$trne_date =  date("Y-m-d ");
if($txt=="")
{
echo '<div id="id01" class="w3-modal  w3-animate-zoom">
    <div class="w3-modal-content w3-padding-16 w3-card">
      <div class="w3-container">';
$ermsg='<p class="w3-panel w3-green w3-round">PLEASE ENTER NOTIFICATION<p></div></div></div>';
	echo $ermsg;
	echo'<script>document.getElementById("id01").style.display="block"</script>';
}
else{
$q="insert into updates (text,date) values('$txt','$trne_date')";
$st=mysqli_query($con,$q) or die(mysqli_error($con));


if($st)
{
	
echo '<div id="id01" class="w3-modal  w3-animate-zoom">
    <div class="w3-modal-content w3-padding-16 w3-card">
      <div class="w3-container">';
$alt='<p class="w3-panel w3-green w3-round">NOTIFICATION SENT...<p></div></div></div>';
echo $alt;
echo'<script>document.getElementById("id01").style.display="block"</script>';

}
	
	
	}

}



?>

<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>









<br/>
<div class="w3-card w3-padding-16">
<form action=""  method="post" align="center">
<input  type="hidden" name="new" value="1" />
<center><textarea  class="w3-input w3-border"  name="txt"></textarea></center>
<br/>
<div class="submitbtn">
<center><input class="w3-btn w3-blue" type="submit" name="" ></input></center>
</div>

</form>
</div>
<br/>
<?php include 'footer.php';?>
	   
	   </div>
<script>
function w3_open() {
  document.getElementById("main").style.marginLeft = "25%";
  document.getElementById("mySidebar").style.width = "25%";
  document.getElementById("mySidebar").style.display = "block";
  document.getElementById("openNav").style.display = 'none';
}
function w3_close() {
  document.getElementById("main").style.marginLeft = "0%";
  document.getElementById("mySidebar").style.display = "none";
  document.getElementById("openNav").style.display = "inline-block";
}
</script>
</div>
 </body>



</html>
