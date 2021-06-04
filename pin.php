
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
<form action=""  method="post" align="center">
<input type="hidden" name="new" value="1" />
<div class="w3-table-all w3-responsive">
<table>
<tr><th><lable>PIN:</lable></th>

<th><input type="textbox" style="width:100px;"  name="cglcode"  required ></input></th><th><b>-</b></th>
<th><select name="br" style="width:100px;" >

<option value="CM">CM</option> 
<option value="EC">EC</option> 
<option value="EE">EE</option> 
<option value="M">M</option> 

</select></th><th><b>-</b></th>
<th><input type="textbox"  style="width:100px;"  name="stdno"  required ></th>
</tr></table>
</div>
<br \><br \>

<div class="submitbtn">
<input class="w3-btn w3-blue" type="submit" name="" >
</div>
</form>


<table class="w3-table-all w3-responsive w3-card">
<thead>
<tr class="w3-hover-grey w3-red">
<center><th>SI.NO</th></center>
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

$cglcode=$_REQUEST['cglcode'];
$br=strtoupper($_REQUEST['br']);
$stdno=$_REQUEST['stdno'];
$pno=$cglcode."-".$br."-".$stdno;

$sel_query="Select * from bookdb WHERE pin='$pno';";
$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>

<tr align="center" class="w3-hover-grey ">
<td align="center"><?php echo $count;?></td>
<td align="center"><?php echo $row["no"];?></td>
<td align="center"><?php echo $row["name"];?></td>
<td align="center"><?php echo $row["author"];?></td>
<td align="center"><?php echo $row["bookcategory"]; ?></td>
<td align="center"><?php echo $row["publisher"]; ?></td>
<td align="center"><?php echo $row["pyear"]; ?></td>
<td align="center"><?php echo $row["edition"]; ?></td>
<td align="center"><?php echo $row["pages"]; ?></td>
<td align="center"><?php echo $row["price"]; ?></td>
<td align="center"><?php echo $row["rack"]; ?></td>
<td align="center"><?php echo $row["date"];?></td>

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
