
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="w3.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>RETUN BOOK</title>

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

<?php
include 'db.php';
include("auth.php");
$no="";
$chkq="select no from bookdb where status='0';";
$chkr=mysqli_query($con,$chkq) or die(mysqli_error($con));

if(mysqli_num_rows($chkr)>0)
{


if(isset($_POST['new']) && $_POST['new']==1)
{
$trn_date=date("Y-m-d H:i:s");
$accno=$_REQUEST['no'];
$mamsay=$_REQUEST['mamsay'];
date_default_timezone_set('Asia/Kolkata'); 

$sel_query_pin="Select * from bookdb where no='".$accno."';";
 
$result_pin = mysqli_query($con,$sel_query_pin);
$pin_row = mysqli_fetch_assoc($result_pin);

$sdpin=$pin_row["pin"];

if($mamsay=='YES'){




$q="UPDATE bookdb SET status='1',pin='0' WHERE no='$accno';";
$q2="UPDATE booksts SET pin='0' WHERE no='$accno';";







$recover_reports_q="insert into recover_reports (no,pin,date) values('$accno','$sdpin','$trn_date');";
$st=mysqli_query($con,$q) or die(mysqli_error($con));
$st2=mysqli_query($con,$q2) or die(mysqli_error($con));

if($st && $q2)
{
mysqli_query($con,$recover_reports_q) or die(mysqli_error($con));
$alt='<div id="id01" class="w3-modal  w3-animate-zoom">
    <div class="w3-modal-content w3-padding-16 w3-card">
      <div class="w3-container"><p class="w3-panel w3-green w3-round">
	      
	  BOOK RETURNED <p></div></div></div>';
echo $alt;
echo'<script>document.getElementById("id01").style.display="block"</script>';
}
}	
else{echo '<div id="id01" class="w3-modal  w3-animate-zoom">
    <div class="w3-modal-content w3-padding-16 w3-card">
      <div class="w3-container"><p class="w3-panel w3-green w3-round" >CANCLED..<p></div></div></div>'; 
	  echo'<script>document.getElementById("id01").style.display="block"</script>';
	  }	
	}


}

else{
	
echo '<script>alert("NO BOOKS ARE ISSUED PLEASE GO BACK...");
//document.write("<a href="dashboard.php">CLICK HEAR TO GO BACK</a>");
</script>';

echo '<div id="id01" class="w3-modal  w3-animate-zoom">
    <div class="w3-modal-content w3-padding-16 w3-card">
      <div class="w3-container"><p class="w3-panel w3-green w3-round" >NO BOOKS ARE ISSUED PLEASE GO BACK...<p></div></div></div>'; 
	  echo'<script>document.getElementById("id01").style.display="block"</script>';

}

?>


<br/>
<form action="" class="w3-container w3-card-4 w3-light-grey w3-text-blue w3-margin w3-padding-16" method="post" align="center" >
<input type="hidden" name="new" value="1" />
<div class="selectcat">
<lable>ENTER BOOK ACC.NO  :</lable>
<input id="inputno" class="w3-input w3-border "  list="brow" name="no"  autocomplete="off" >
<datalist id="brow">
 <?php
$sel_query="Select * from bookdb where status='0';";
$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<option value="<?php echo $row["no"]; ?>" > <?php echo '-' .$row["name"]; ?> </option><?php  }?>
</datalist> 
 </input>

</div>
<br> 
<div class="mamsay"> 
<label align="justify">DO YOU WANT TO RECOVER</label>
<select class="w3-select" name="mamsay" align="center">
<option class="w3-xlarge"  value="NO">NO</option>
<option class="w3-xlarge" value="YES">YES</option>

</select></div>
<div class="submitbtn">
<br>
<input type="submit" class="w3-btn w3-blue" name="submit" id="submit01" >
<br><br><br><br>





</form>
<br/>
</div>
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

     









<?php include 'footer.php';?>
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
