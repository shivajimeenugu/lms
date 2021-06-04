
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
      <?php include 'header.php';
	 include("auth.php");
	  ?>


<br/>
     

<div class="w3-container" >
<table class="w3-table-all w3-responsive">
<thead>

<tr class="w3-hover-grey w3-red">
<th>SI.NO</th>
<th>ACC NO</th>
<th>BOOK NAME</th>
<th>AUTHOR</th>
<th>BOOK CATEGORY</th>
<th>PUBLISHER</th>
<th>PUBLISHED YEAR</th>
<th>EDITION</th>
<th>NO.OF PAGES</th>
<th>PRICE</th>
<th>RACK</th>
<th>STUDENT PIN</th>
<th>TAKEN DATE & TIME</th>


</tr>
</thead>
<tbody>
<?php
include("db.php");



$count=1;
$sel_query="Select * from bookdb  where status='0' ORDER BY id ;";
$sqfl=$sel_query;
$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr class="w3-hover-grey">
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
<td align="center"><?php echo $row["pin"]; ?></td>
<td align="center"><?php echo $row["date"]; ?></td>
<!--<td align="center"><a href="delete.php?id=<?php echo $row["id"]; ?>">a</td>-->


</tr>

<?php $count++; }


?>
<?php $export_link='/export.php?sql='.$sel_query;

$enc=new encryption(array('key'=>'s0m3v3ryr4nshivaji'));
$payload=$enc->encrypt($sel_query);

$export_to_excel_url='export.php?sql='.$payload;







?>
<tr><th><a name="export_to_excel" href="<?php echo $export_to_excel_url; ?>" class="w3-btn w3-yellow w3-border" >EXPORT TO EXCEL</a></th></tr>

</table>
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
