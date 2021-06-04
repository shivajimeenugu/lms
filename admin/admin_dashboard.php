<?php


include("admin_auth.php");
include("db.php"); //include auth.php file on all secure pages ?>
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

                                       <a class="w3-bar-item w3-button" href="admin_dashboard.php">DASHBOARD</a>
		
		

                                       

                                       <a class="w3-bar-item w3-button" href="admin_logout.php">LOGOUT</a>
                             
            </div> 


<div class="w3-container w3-animate-right" id="main">
             <?php include 'header.php';?>



     
<br/>
<br/>
<br/>
<br/>


<table>
<tr>


<td>

<div class="w3-card w3-hover-yellow w3-margin " style="background-color:#0d8bb9; ">
<h3  class=" w3-red w3-hover-blue">NO.OF BOOKS ISSUED</h3>
<?php 
$noofbook_query="Select * from bookdb  where status='0' ORDER BY date ;";
$result = mysqli_query($con,$noofbook_query);
$nofbook_result=mysqli_num_rows($result);
echo '<center><h1 style="color:#ffffff;

	text-shadow: 0 1px 0 #ccc,
               0 2px 0 #c9c9c9,
               0 3px 0 #bbb,
               0 4px 0 #b9b9b9,
               0 5px 0 #aaa,
               0 6px 1px rgba(0,0,0,.1),
               0 0 5px rgba(0,0,0,.1),
               0 1px 3px rgba(0,0,0,.3),
               0 3px 5px rgba(0,0,0,.2),
               0 5px 10px rgba(0,0,0,.25),
               0 10px 10px rgba(0,0,0,.2),
               0 20px 20px rgba(0,0,0,.15);
">'.$nofbook_result.'</h1></center>';
?>

</div>
</td>



<td>

<div class="w3-card w3-hover-yellow w3-margin " style="background-color:#0d8bb9; ">
<h3  class=" w3-red w3-hover-blue">NO.OF BOOKS IN LIBRARY</h3>
<?php 
$noofbook_query="Select * from bookdb  where status='1' ORDER BY date ;";
$result = mysqli_query($con,$noofbook_query);
$nofbook_result=mysqli_num_rows($result);
echo '<center><h1 style="color:#ffffff;

	text-shadow: 0 1px 0 #ccc,
               0 2px 0 #c9c9c9,
               0 3px 0 #bbb,
               0 4px 0 #b9b9b9,
               0 5px 0 #aaa,
               0 6px 1px rgba(0,0,0,.1),
               0 0 5px rgba(0,0,0,.1),
               0 1px 3px rgba(0,0,0,.3),
               0 3px 5px rgba(0,0,0,.2),
               0 5px 10px rgba(0,0,0,.25),
               0 10px 10px rgba(0,0,0,.2),
               0 20px 20px rgba(0,0,0,.15);
">'.$nofbook_result.'</h1></center>';
?>

</div>
</td>
<td>
<div class="w3-card w3-hover-yellow w3-margin " style="background-color:#0d8bb9; ">
<h3  class="w3-red w3-hover-blue">TOTAL NO.OF BOOKS IN LIBRARY</h3>
<?php 
$noofbook_query="Select * from bookdb   ORDER BY date ;";
$result = mysqli_query($con,$noofbook_query);
$nofbook_result=mysqli_num_rows($result);
echo '<center><h1 style="color:#ffffff;

	text-shadow: 0 1px 0 #ccc,
               0 2px 0 #c9c9c9,
               0 3px 0 #bbb,
               0 4px 0 #b9b9b9,
               0 5px 0 #aaa,
               0 6px 1px rgba(0,0,0,.1),
               0 0 5px rgba(0,0,0,.1),
               0 1px 3px rgba(0,0,0,.3),
               0 3px 5px rgba(0,0,0,.2),
               0 5px 10px rgba(0,0,0,.25),
               0 10px 10px rgba(0,0,0,.2),
               0 20px 20px rgba(0,0,0,.15);
">'.$nofbook_result.'</h1></center>';
?>

</div>
</td>
</tr>
<tr>
<td>


<div class="w3-card w3-hover-yellow w3-margin " style="background-color:#0d8bb9; ">
<h3 class="w3-red w3-hover-blue">TOTAL NO.OF BOOKS ISSUED TODAY</h3>
<?php 
date_default_timezone_set('Asia/Kolkata'); 

 $trn_date=date("Y-m-d ");
$noofbook_query="Select * from issue_reports where date='$trn_date'   ORDER BY date ;";
$result = mysqli_query($con,$noofbook_query);
$nofbook_result=mysqli_num_rows($result);
echo '<center><h1 style="color:#ffffff;

	text-shadow: 0 1px 0 #ccc,
               0 2px 0 #c9c9c9,
               0 3px 0 #bbb,
               0 4px 0 #b9b9b9,
               0 5px 0 #aaa,
               0 6px 1px rgba(0,0,0,.1),
               0 0 5px rgba(0,0,0,.1),
               0 1px 3px rgba(0,0,0,.3),
               0 3px 5px rgba(0,0,0,.2),
               0 5px 10px rgba(0,0,0,.25),
               0 10px 10px rgba(0,0,0,.2),
               0 20px 20px rgba(0,0,0,.15);
">'.$nofbook_result.'</h1></center>';
?>

</div>
</td>


<td>


<div class="w3-card w3-hover-yellow w3-margin " style="background-color:#0d8bb9; ">
<h3  class="w3-red w3-hover-blue">NO.OF STUDENTS REGISTER STUDENT ACCOUNT</h3>
<?php 
date_default_timezone_set('Asia/Kolkata'); 

 $trn_date=date("Y-m-d ");
$noofbook_query="Select * from std_users ;";
$result = mysqli_query($con,$noofbook_query);
$nofbook_result=mysqli_num_rows($result);
echo '<center><h1 style="color:#ffffff;

	text-shadow: 0 1px 0 #ccc,
               0 2px 0 #c9c9c9,
               0 3px 0 #bbb,
               0 4px 0 #b9b9b9,
               0 5px 0 #aaa,
               0 6px 1px rgba(0,0,0,.1),
               0 0 5px rgba(0,0,0,.1),
               0 1px 3px rgba(0,0,0,.3),
               0 3px 5px rgba(0,0,0,.2),
               0 5px 10px rgba(0,0,0,.25),
               0 10px 10px rgba(0,0,0,.2),
               0 20px 20px rgba(0,0,0,.15);
">'.$nofbook_result.'</h1></center>';
?>

</div>
</td>
<td>


<div class="w3-card w3-hover-yellow w3-margin " style="background-color:#0d8bb9; ">
<h3  class="w3-red w3-hover-blue">NO.OF STUDENTS NOT VERIFIED MAIL</h3>
<?php 
date_default_timezone_set('Asia/Kolkata'); 

 $trn_date=date("Y-m-d ");
$noofbook_query="Select * from std_users where active='0' ;";
$result = mysqli_query($con,$noofbook_query);
$nofbook_result=mysqli_num_rows($result);
echo '<center><h1 style="color:#ffffff;

	text-shadow: 0 1px 0 #ccc,
               0 2px 0 #c9c9c9,
               0 3px 0 #bbb,
               0 4px 0 #b9b9b9,
               0 5px 0 #aaa,
               0 6px 1px rgba(0,0,0,.1),
               0 0 5px rgba(0,0,0,.1),
               0 1px 3px rgba(0,0,0,.3),
               0 3px 5px rgba(0,0,0,.2),
               0 5px 10px rgba(0,0,0,.25),
               0 10px 10px rgba(0,0,0,.2),
               0 20px 20px rgba(0,0,0,.15);
">'.$nofbook_result.'</h1></center>';
?>

</div>
</td>
</tr>
<tr>
<td colspan="3">

<div class="w3-card " style=" height:500px;">
<table class="w3-table-all  ">
<thead>
<tr class="w3-hover-grey w3-red">
<th>SI.NO</th>
<th>STUDENT PIN</th>
<th>BOOK NAME</th>
<th>AUTHOR</th>
<th>OTHERS</th>
</tr>
<tr colspan="6"><h3  class="w3-red w3-hover-white">STUDENT SUGGESTIONS</h3></tr>

</thead>
</table>

<div class="   w3-responsive" style=" height:400px;">
<table  class="w3-table-all  " >

<tbody>
<?php

$count=1;
$sel_query="Select * from reqbook ORDER BY id ;";
$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr class="w3-hover-grey ">
<td align="center"><?php echo $count; ?></td>
<td align="center"><?php echo $row["pin"]; ?></td>
<td align="center"><?php echo $row["name"]; ?></td>
<td align="center"><?php echo $row["author"]; ?></td>
<td align="center"><?php echo $row["others"]; ?></td>
</tr>

<?php $count++; }?>
</tbody>
</table>

</div></div>


</td>
</tr>





<tr>
<td colspan="3">





<div class="w3-card " style=" height:500px;">
<table class="w3-table-all  ">
<thead>
<tr class="w3-hover-grey w3-red">
<th align="center">SI.NO</th>
<th align="center">EMAIL</th>
<th align="center">STUDENT USERNAME</th>
<th align="center">TIME STAMP</th>
<th align="center">STATUS</th>
<th align="center">OPTIONS</th>
</tr>
<tr colspan="6"><h3  class="w3-red w3-hover-white">STUDENT ACCOUNTS</h3></tr>
</thead>
</table>

<div class="   w3-responsive" style="background-color:#0d8bb9; height:400px;">
<table  class="w3-table-all  " >

<tbody>
<?php

$count=1;
$sel_query="Select * from std_users ORDER BY id ;";
$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr class="w3-hover-grey ">
<td align="center"><?php echo $count; ?></td>
<td align="center"><?php echo $row["email"]; ?></td>
<td align="center"><?php echo $row["username"]; ?></td>
<td align="center"><?php echo $row["trn_date"]; ?></td>
<td align="center"><?php echo $row["active"]; ?></td>
<td><button onclick="window.location.href ='std_user_delete.php?id=<?php echo $row["id"]; ?>';"> DEELTE </button><br></td>
</tr>

<?php $count++; }?>
</tbody></table>

</div></div>
</td>
</tr>




</table>


<br/>
<br/>


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
