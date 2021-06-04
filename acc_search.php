
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


<br/>
     

<div class="w3-container" >


<form action="" class="w3-card  w3-padding-16 " method="post" align="center">
<input type="hidden" name="new" value="1" />


<select  class=" w3-border" name="cat" >

<option value="BBSC">BOOKBANK SC </option> 
<option value="BBST">BOOKBANK ST</option> 
<option value="GENL">GENERAL</option> 

</select>
<br/><br/>

<input class="w3-input w3-border" type="number" name="accnon" required placeholder="ENTER ACC NO:" ><br \><br \>

<div class="submitbtn">

<input type="submit" class="w3-btn w3-blue" name="" >
</div>
</form>
<br/>

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
include 'db.php';
include("auth.php");
$accno="";
if(isset($_POST['new']) && $_POST['new']==1)
{
$count=1;
$cglcode=101;
$cat=$_REQUEST['cat'];
$accnon=$_REQUEST['accnon'];
$numcount=strlen($accnon);

if($numcount==1)
{
	$conno='00000'.$accnon;
}
elseif($numcount==2)
{
	$conno='0000'.$accnon;
}
elseif($numcount==3){
	$conno='000'.$accnon;
}
elseif($numcount==4){
	$conno='00'.$accnon;
}
elseif($numcount==5){
	$conno='0'.$accnon;
}

$pno=$cglcode.$cat.$conno;

echo $pno;
$sel_query="Select * from bookdb WHERE no='$pno';";
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
<br/>
 <?php include 'footer.php';?></div>
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
