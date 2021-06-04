
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

<div class="w3-card w3-padding-32 w3-padding-left-16 w3-padding-right-16 ">
<form method="POST" action="">
<input type="text" class="w3-input w3-border" placeholder="search with any details"  name="key">
<br/>
<center><button class="w3-btn w3-blue" name="submit"  >SEARCH</button></center>
</form>
</div>
<?php
include 'db.php';
$query='';
$count=1;
//$con = mysqli_connect("localhost", "root", "", "lib");
$output = '';
if(isset($_POST["submit"]))
{
	$search = mysqli_real_escape_string($con, $_POST["key"]);
	$query = "
	SELECT * FROM bookdb 
	WHERE no LIKE '%".$search."%'
	OR name LIKE '%".$search."%' 
	OR author LIKE '%".$search."%' 
	OR bookcategory LIKE '%".$search."%' 
	OR publisher LIKE '%".$search."%' 
	OR pyear LIKE '%".$search."%' 
	OR edition LIKE '%".$search."%' 
	OR rack LIKE '%".$search."%' 
	
	
	";


$result = mysqli_query( $con, $query);
if(mysqli_num_rows($result) > 0)
{
	echo '<br/><table class="w3-table-all w3-responsive">
						<tr class="w3-hover-grey w3-red">
<th>SI.NO</th>							
<th>ACC NO</th>
							
<th>BOOK NAME</th>
<th >AUTHOR</th>
<th >PUBLISHER</th>
<th >PUBLISHED YEAR</th>
<th >EDITION</th>
<th >NO.OF PAGES</th>
<th >PRICE</th>
<th >RACK</th>
<th >STATUS</th>
<th  >DEELTE</th>
<th  >EDIT</th>

				</tr>';
while($row = mysqli_fetch_array($result))
	{
		//echo'?>
			<tr class="w3-hover-grey ">
			
	
	
<td align="center"><?php echo $count; ?></td>
<td align="center"><?php echo $row["no"]; ?></td>
<td align="center"><?php echo $row["name"]; ?></td>
<td align="center"><?php echo $row["author"]; ?></td>

<td align="center"><?php echo $row["publisher"]; ?></td>
<td align="center"><?php echo $row["pyear"]; ?></td>
<td align="center"><?php echo $row["edition"]; ?></td>
<td align="center"><?php echo $row["pages"]; ?></td>
<td align="center"><?php echo $row["price"]; ?></td>
<td align="center"><?php echo $row["rack"]; ?></td>
<td align="center"><?php echo $row["status"]; ?></td>

<!--<td align="center"><a href="delete.php?id=<?php echo $row["id"]; ?>">a</td>-->

<td><button onclick="window.location.href ='delete.php?id=<?php echo $row["id"]; ?>';"> DEELTE </button><br></td>
<td><button onclick="window.location.href ='edit.php?id=<?php echo $row["id"]; ?>';"> EDIT </button><br></td>
	
		</tr>
		<?php
		$count++;
		//';
	}
	
}
else
{
	echo '<h1 class="w3-panel w3-green w3-round">NO DATA FOUND</h1>';
}
}

?>

</table>
<?php include 'footer.php';?>
	   
	   </div>
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
