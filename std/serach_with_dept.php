
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
                                       <a class="w3-bar-item w3-button" href="std_index.php">HOME</a>

                                       <a class="w3-bar-item w3-button" href="std_dashboard.php">DASHBOARD</a>
		
		

                                       

                                       <a class="w3-bar-item w3-button" href="std_logout.php">LOGOUT</a>
                             
            </div> 


<div class="w3-container w3-animate-right" id="main">
             <div class="w3-container w3-blue">

   <button id="openNav" class="w3-button w3-teal w3-xlarge" onclick="w3_open()">&#9776;</button>

        <center><img src="logo.png"  class="logo" alt="LOGO GOSE HEAR" ></img></center>
        <center><h2>Dr.YC JAMES YEN GOVT POLYTECHNIC,KUPPAM </h2></center>
        <center><h3>LIBRARY MANAGEMENT SYSTEM</h3></center>
        

</div>



     
<br/>
<div class="w3-container" >
<form class="w3-card w3-padding-16 w3-yellow" action=""  method="post" align="center" >

<input type="hidden" name="new" value="1" /></input>
<div class="selectcat">
<select name="branch" style="width:200px;">
<option value="COMPUTER ENGINEERING">COMPUTERS</option> 
<option value="ELECTRONICS & COMMUNICATION ENGG">ELECTRONICS</option> 
<option value="ELECTRICAL & ELECTRONICS ENGG">ELECTRICAL</option> 
<option value="MECHANICAL ENGINEERING">MECHANICAL</option> 
<option value="CIVIL ENGINEERING">CIVIL</option> 
<option value="GENERAL">GENERAL</option> 
</select></div><br/>
<div class="submitbtn">
<input type="submit" class="w3-btn w3-blue" name="" placeholder="enter your msg">
</div>
</form>

<br/>
<table class="w3-table-all w3-card w3-responsive">
<thead>
<tr class="w3-hover-grey w3-red">
<th>SI.NO</th>
<th>ACC NO</th>
<th>BOOK NAME</th>
<th>AUTHOR</th>
<th>PUBLISHER</th>
<th>BOOK CATEGORY</th>
<th>PUBLISHED YEAR</th>
<th>EDITION</th>
<th>NO.OF PAGES</th>
<th>PRICE</th>
<th>RACK</th>
<th>STATUS</th>

</tr>
</thead>
<tbody>
<?php
include("db.php");
include("auth.php");

 if(isset($_POST['new']) && $_POST['new']==1)
{
	$br=$_REQUEST['branch'];


$count=1;
$sel_query="Select * from bookdb  WHERE branch='$br' ;";
$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr class="w3-hover-grey ">
<td align="center"><?php echo $count; ?></td>
<td align="center"><?php echo $row["no"]; ?></td>
<td align="center"><?php echo $row["name"]; ?></td>
<td align="center"><?php echo $row["author"]; ?></td>
<td align="center"><?php echo $row["bookcategory"]; ?></td>
<td align="center"><?php echo $row["publisher"]; ?></td>
<td align="center"><?php echo $row["pyear"]; ?></td>
<td align="center"><?php echo $row["edition"]; ?></td>
<td align="center"><?php echo $row["pages"]; ?></td>
<td align="center"><?php echo $row["price"]; ?></td>
<td align="center"><?php echo $row["rack"]; ?></td>
<td align="center"><?php echo $row["status"]; ?></td>



</tr>

<?php $count++; }}?>
</table>

<br/>
<div class="w3-container w3-blue">
<p>COPYRIGHT©SHIVAJI MEENUGU</p>
       </div></div>
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
