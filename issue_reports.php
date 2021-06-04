
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="w3.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>IISUE LOG</title>

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
     
<center><h3 class="w3-red">BOOK ISSUE LOG</h3></center>
<br/>
<center><table class="w3-table-all w3-card  ">
<thead>
<tr class="w3-hover-grey w3-red">
<th>SI.NO</th>
<th>ACC NO</th>
<th>STUDENT PIN</th>
<th>DATE</th>



</tr>
</thead>
<tbody>
<?php
include("db.php");
include("auth.php");
$count=1;
$sel_query="Select * from issue_reports ORDER BY sno ;";
$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr class="w3-hover-grey">
<td align="center"><?php echo $count; ?></td>
<!--<td align="center"><?php echo $row["no"]; ?></td>-->




<td align="center"> <a href="acc_search_get.php?accno=<?php echo $row['no']; ?>" > <?php echo $row["no"]; ?> </a> </td>





<td align="center"><?php echo $row["pin"]; ?></td>
<td align="center"><?php echo $row["date"]; ?></td>

<!--<td align="center"><a href="delete.php?id=<?php echo $row["id"]; ?>">a</td>-->

<!--<td><button onclick="window.location.href ='delete.php?id=<?php //echo $row["id"]; ?>';"> DEELTE </button><br></td>
<td><button onclick="window.location.href ='edit.php?id=<?php //echo $row["id"]; ?>';"> EDIT </button><br></td>-->

</tr>

<?php $count++; }?>
</table></center>
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
