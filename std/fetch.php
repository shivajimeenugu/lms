<?php
include 'db.php';

//$con = mysqli_connect("localhost", "root", "", "lib");
$output = '';
if(isset($_POST["query"]))
{
	$search = mysqli_real_escape_string($con, $_POST["query"]);
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
}
else
{
	$query = "
	SELECT * FROM bookdb where status='1' ORDER BY id";
}
$result = mysqli_query( $con, $query);
if(mysqli_num_rows($result) > 0)
{
	$output .= '<div class="data-tabletwo">
					<table class="table table bordered">
						<tr>
							
							<th style="color:red;">ACC NO</th>
							
<th style="color:red;">BOOK NAME</th>
<th style="color:red;">AUTHOR</th>
<th style="color:red;">BOOK CATEGORY</th>
<th style="color:red;">PUBLISHER</th>
<th style="color:red;">PUBLISHED YEAR</th>
<th style="color:red;">EDITION</th>
<th style="color:red;">NO.OF PAGES</th>
<th style="color:red;">PRICE</th>
<th style="color:red;">RACK</th>
<th style="color:red;">STATUS</th>
				</tr>';
	while($row = mysqli_fetch_array($result))
	{
		$output .= '
			<tr>
			
	
	
<td align="center" style="font-weight:bold;"> '.$row["no"].'</td>
<td align="center" style="font-weight:bold;">'.$row["name"].' </td>
<td align="center" style="font-weight:bold;">'.$row["author"].' </td>
<td align="center" style="font-weight:bold;">'. $row["bookcategory"].'</td>
<td align="center" style="font-weight:bold;">'. $row["publisher"].'</td>
<td align="center" style="font-weight:bold;">'. $row["pyear"].'</td>
<td align="center" style="font-weight:bold;">'.$row["edition"].'</td>
<td align="center" style="font-weight:bold;">'. $row["pages"].'</td>
<td align="center" style="font-weight:bold;">'. $row["price"].'</td>
<td align="center" style="font-weight:bold;">'. $row["rack"].'</td>
<td align="center" style="font-weight:bold;">'.$row["status"].' </td>
	
	
		</tr>
		';
	}
	echo $output;
}
else
{
	echo 'Data Not Found';
}
?>