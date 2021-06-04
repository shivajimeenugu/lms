
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


if(isset($_GET['no']) && isset($_POST['submit']))
{
$trn_date=date("Y-m-d H:i:s");
$accno=$_GET['no'];
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
	      
	  BOOK RETURNED <p><br/>
	  <center><a class="w3-button w3-red" href="dashboard.php"><b>DONE</b></a></center>
	  
	  
	  </div></div></div>';
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
      <div class="w3-container"><p class="w3-panel w3-green w3-round" >NO BOOKS ARE ISSUED PLEASE GO BACK...<p><a href="dashboard.php">CLICK HEAR TO GO BACK</a><br/></div></div></div>'; 
	  echo'<script>document.getElementById("id01").style.display="block"</script>';

}

?>


<br/>
<form action="" class="w3-container w3-card-4 w3-light-grey w3-text-blue w3-margin w3-padding-16" method="post" align="center" >
<input type="hidden" name="new" value="1" />
<!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
<table class="w3-table-all w3-responsive">
<thead>
<tr class="w3-hover-grey w3-red">
<center><th>SI.NO</th></center>
<center><th>STUDENT PIN</th><center>
<center><th>ACC NO</th></center>
<center><th>BOOK NAME</th></center>
<center><th>AUTHOR</th></center>
<center><th>BOOK CATEGORY</th></center>
<center><th>PUBLISHER</th></center>
<center><th>PUBLISHED YEAR</th></center>
<center><th>EDITION</th></center>
<center><th>NO.OF PAGES</th></center>
<center><th>PRICE</th></center>
<center><th>RACK</th></center>
<center><th>STATUS</th></center>
<center><th>TAKEN DATE&TIME</th></center>
</tr>
</thead>
<tbody>


<?php


if(isset($_GET['no']))
{
$count=1;


$accno=$_GET['no'];

echo $accno;
$sel_query="Select * from bookdb WHERE no='$accno' and status='0';";
$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>

<tr class="w3-hover-grey " align="center">
<td align="center"><b><?php echo $count;?></b></td>
<td align="center"><b><?php echo $row["pin"];?></b></td>
<td align="center"><b><?php echo $row["no"];?></b></td>
<td align="center"><b><?php echo $row["name"];?></b></td>
<td align="center"><b><?php echo $row["author"];?></b></td>
<td align="center"><b><?php echo $row["bookcategory"]; ?></b></td>
<td align="center"><b><?php echo $row["publisher"]; ?></b></td>
<td align="center"><b><?php echo $row["pyear"]; ?></b></td>
<td align="center"><b><?php echo $row["edition"]; ?></b></td>
<td align="center"><b><?php echo $row["pages"]; ?></b></td>
<td align="center"><b><?php echo $row["price"]; ?></b></td>
<td align="center"><b><?php echo $row["rack"]; ?></b></td>
<td align="center"><b><?php echo $row["status"]; ?></b></td>
<td align="center"><b><?php echo $row["date"];?></b></td>

<?php $count++; }?>
<?php if($count!=1){
	
	echo '<h3 style="color:#ff0066;"><span class="blink_text">DATA FOUND<span></h3>';
}
else{echo '<h3 style="color:#ff0066;"><span class="blink_text">NO DATA FOUND<span></h3>';}
 ?>









<?php  }?>
</tr>

</tbody></table>
<!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
<br> 
<div class="mamsay"> 
<label align="justify">DO YOU WANT TO RETUN ABOVE BOOK</label>
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
