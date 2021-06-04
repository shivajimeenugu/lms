
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
             <div class="w3-container w3-responsive w3-blue">

   <button id="openNav" class="w3-button w3-teal w3-xlarge" onclick="w3_open()">&#9776;</button>

        <center><img src="logo.png"  class="logo" alt="LOGO GOSE HEAR" ></img></center>
        <center><h2>Dr.YC JAMES YEN GOVT POLYTECHNIC,KUPPAM </h2></center>
        <center><h3>LIBRARY MANAGEMENT SYSTEM</h3></center>
        

</div>

<br />


<div class="w3-container" >
<div class="w3-responsive w3-card">
<table class="w3-table-all  w3-hoverable">
<thead>
<tr class="w3-hover-grey w3-red">
<th>SI.NO</th>
<th>DATE</th>
<th>NOTIFICATION</th>


</tr>
</thead>
<tbody>
<?php
include("db.php");
include("auth.php");
$count=1;
$sel_query="Select * from updates ORDER BY id ;";
$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr class="w3-hover-grey ">
<td align="center"><?php echo $count; ?></td>
<td align="center"><?php echo $row["date"]; ?></td>
<td align="center"><?php echo $row["text"]; ?></td>

</tr>

<?php $count++; }?>
</table>
</div>








<br />



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


























