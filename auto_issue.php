
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
$accno=$_GET['no'];

if(isset($_GET['no'])&&isset($_REQUEST['submit']) )
{
$cglcode=$_REQUEST['cglcode'];
$br=strtoupper($_REQUEST['br']);
$stdno=$_REQUEST['stdno'];
$sdpin = $cglcode."-".$br."-".$stdno;
date_default_timezone_set('Asia/Kolkata'); 

 $trn_date=date("Y-m-d H:i:s");
 $accno=$_GET['no'];
 echo $accno;
$sel_query_verify="Select * from bookdb where no='$accno' ;";
$result_t = mysqli_query($con,$sel_query_verify);

while($row_t = mysqli_fetch_assoc($result_t)) {
	echo '<br/><br/> <div id="id01" class="w3-modal  w3-animate-zoom">
    <div class="w3-modal-content w3-padding-16 w3-card">
      <div class="w3-container">
        <span onclick="document.getElementById("id01").style.display="none"" class="w3-button w3-display-topright">&times;</span><div class="w3-responsive w3-card"><table  class="w3-table-all w3-hoverable">
<thead>
<tr class="w3-hover-grey w3-red">

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

</tr>
</thead>
';

echo '<tr>
			
	
	
<td align="center" style="font-weight:bold;"> '.$row_t["no"].'</td>
<td align="center" style="font-weight:bold;">'.$row_t["name"].' </td>
<td align="center" style="font-weight:bold;">'.$row_t["author"].' </td>
<td align="center" style="font-weight:bold;">'. $row_t["bookcategory"].'</td>
<td align="center" style="font-weight:bold;">'. $row_t["publisher"].'</td>
<td align="center" style="font-weight:bold;">'. $row_t["pyear"].'</td>
<td align="center" style="font-weight:bold;">'.$row_t["edition"].'</td>
<td align="center" style="font-weight:bold;">'. $row_t["pages"].'</td>
<td align="center" style="font-weight:bold;">'. $row_t["price"].'</td>
<td align="center" style="font-weight:bold;">'. $row_t["rack"].'</td>


	
		</tr></table></div>';

}








	
$q="UPDATE bookdb SET status='0',pin='$sdpin',date='$trn_date' WHERE no='$accno';";
$q2="insert into booksts (no,pin) values('$accno','$sdpin') ";
$sts=mysqli_query($con,$q) or die(mysqli_error($con));
$sts2=mysqli_query($con,$q2) or die(mysqli_error($con));
$report_q="insert into issue_reports (no,pin,date) values('$accno','$sdpin','$trn_date');";
if($sts && $sts2)
{
mysqli_query($con,$report_q) or die(mysqli_error($con));

echo'<script>document.getElementById("id01").style.display="block"</script>';
$alt='<center><p class="w3-panel w3-green w3-round">THE ABOVE BOOK ISSUED TO '.$sdpin.'<p></center><br/>';
echo $alt;
echo '<center><a class="w3-button w3-red" href="dashboard.php"><b>DONE</b></a></center></div>
    </div>
  </div>';
}
	
	


else{
	echo '<center><p style="
	color:red;
	font-size:2em;
	
	
	">TRANSATION IS CANCLED<p></center><br/>';
	
}

}





?>




<br/>


<br/>


<br/>
<br/>

<br/>
<br/>
<div class="w3-container w3-card-4 w3-light-grey w3-text-blue w3-margin w3-padding-16">

<form action=""  method="post" align="center">
<input type="hidden" name="new" value="1" /></input>
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

<br/>



<!--<lable><b>ENTER BOOK ACC.NO</lable></b>
<input value="<?php echo $accno; ?>" class="w3-input"  name="no" >-->
 
<br/><br/>
<br/>
<br/>




<div class="submitbtn">
<input type="submit"  name="submit" class="w3-button w3-blue" placeholder="enter your msg">
</div>

</form></div>



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
