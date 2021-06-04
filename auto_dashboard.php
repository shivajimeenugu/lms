<?php


include("auth.php");
include("db.php"); //include auth.php file on all secure pages ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="w3.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>AUTO DASHBOARD </title>

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


if(isset($_GET['accno']))
{
$count=1;


$pno=$_GET['accno'];

echo $pno;
$sel_query="Select * from bookdb WHERE no='$pno';";
$result = mysqli_query($con,$sel_query);
$row = mysqli_fetch_assoc($result) ?>

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

<?php $booksts_fetch=$row["status"]; ?>
<?php if($row){
	$data_found=1;
	echo '<h3 style="color:#ff0066;"><span class="blink_text">DATA FOUND<span></h3>';
}
else{$data_found=0; echo '<h3 style="color:#ff0066;"><span class="blink_text">NO DATA FOUND<span></h3>';}
 ?>









<?php  }?>

</tr>

</tbody></table>
<br/>
<br/>     
	 
<div class="w3-container w3-padding w3-card-4 ">
<center>
<?php 
if($booksts_fetch=='1' && $data_found==1){
echo '<a class="w3-button w3-blue" href="auto_issue.php?no='.$pno.'"'.'> ISSUE ABOVE BOOK </a>';

}
else if($data_found==1){
echo '<a class="w3-button w3-blue" href="auto_recover.php?no='.$pno.'"'.'> RETURN ABOVE BOOK </a>';
}
else{
	echo '<a class="w3-button w3-blue" href="#"'.'> ERROR-->NO DATA FOUND  </a>';
    echo'<script>alert("NO DATA FOUND--->QR CODE IS NOT CONTAIN  VALID ACC NO");</script>';
	echo'<script>window.close();</script>';
}
?>
</center>

</div>
<br/><br/>

<?php include 'footer.php';?>

</div>
 </body>
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


</html>
