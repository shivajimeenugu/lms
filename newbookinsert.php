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
if(isset($_POST['new']) && $_POST['new']==1)
{

//$cat_temp= !empty($_POST['value']) ? $_POST['value'] : '';
//$no=$_REQUEST['no'];
$name=$_REQUEST['name'];
$author=$_REQUEST['author'];
$bookcategory=$_REQUEST['bookcategory'];
$publisher=$_REQUEST['publisher'];
$pyear=$_REQUEST['pyear'];
$edition=$_REQUEST['edition'];
$pages=$_REQUEST['pages'];
$price=$_REQUEST['price'];
$rack=$_REQUEST['rack'];
$branch=$_REQUEST['branch'];

$cglcode=101;
$chkc1='BookBank -ST';
$chkc2='BookBank -SC';
$cat_temp= $_REQUEST['bookcategory'];




if($cat_temp==$chkc1)
{
	$cat='BBST';
}
elseif($cat_temp==$chkc2)
{
	$cat='BBSC';
}
else{
	$cat='GENL';
}

$accnon=$_REQUEST['no'];
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
else{
	$conno=$accnon;
}

$no=$cglcode.$cat.$conno;


$q="insert into bookdb(no,name,author,bookcategory,publisher,pyear,edition,pages,price,rack,branch) values
('$no',
'$name',
'$author',
'$bookcategory',
'$publisher',
'$pyear',
'$edition',
'$pages',
'$price',
'$rack','$branch');";



$st=mysqli_query($con,$q) or die(mysqli_error($con));
//header('Location: suss_newinsert.php');

if($st)
{

echo '<div id="id01" class="w3-modal  w3-animate-zoom">
    <div class="w3-modal-content w3-padding-16 w3-card">
      <div class="w3-container"><p class="w3-panel w3-green w3-round" >BOOK ADDED<p></div></div></div>'; 
	  echo'<script>document.getElementById("id01").style.display="block"</script>';
}
else{
	echo '<div id="id01" class="w3-modal  w3-animate-zoom">
    <div class="w3-modal-content w3-padding-16 w3-card">
      <div class="w3-container"><p class="w3-panel w3-green w3-round" >ERROR! CAN NOT ADD BOOK<p></div></div></div>'; 
	  echo'<script>document.getElementById("id01").style.display="block"</script>';
}	
	
	

}



?>









<br/>



<form action="" class=" w3-card w3-padding-16" method="post" align="center">
<center><p class="w3-blue">ADD BOOK</p></center>

<input type="hidden" name="new" value="1" />


<table class="w3-table-all">
<tr>
<td><lable>Enter ACC NO: </lable> </td>
<td><input type="text" name="no" placeholder="Enter ACC NO" required /></td>
</tr>				

<tr>
<td><lable> Enter Book Title:</lable> </td>
<td><input  type="text" name="name"  placeholder="Enter Book Title" required  /></td>
</tr>

<tr>
<td><lable>Enter Author: </lable> </td>
<td><input  type="text" name="author"  placeholder="Enter Author" required  /></td>
</tr>



<tr>
<td><lable>Select Book Category</lable> </td>
<td><select name="bookcategory" required>
<option value="BookBank -ST">BookBank -ST</option> 
<option value="BookBank -SC">BookBank -SC</option> 
<option value="General">General</option> 

</select> </td>
</tr>


<tr>
<td><lable>Enter Publisher: </lable> </td>
<td><input  type="text" name="publisher"  placeholder="Enter Publisher" required  /> </td>
</tr>

<tr>
<td><lable>Enter Published Year: </lable> </td>
<td> <input  type="text" name="pyear"  placeholder="Enter Published Year" required  /></td>
</tr>

<tr>
<td><lable>Enter Edition: </lable> </td>
<td><input  type="text" name="edition"  placeholder="Enter Edition" required  /> </td>
</tr>

<tr>
<td><lable>Enter NO.OF Pages: </lable> </td>
<td><input  type="text" name="pages"  placeholder="Enter NO.OF Pages" required  /></td>
</tr>

<tr>
<td><lable> Enter Price:</lable> </td>
<td> <input  type="text" name="price"  placeholder="Enter Price" required  /></td>
</tr>

<tr>
<td><lable>Enter Rack: </lable> </td>
<td><input  type="text" name="rack"  placeholder="Enter Rack" required  /> </td>
</tr>

<tr>
<td><lable>BOOK BELONGS TO</lable> </td>


<td><select name="branch" style="width:205px;">
<option value="COMPUTER ENGINEERING">COMPUTERS</option> 
<option value="ELECTRONICS & COMMUNICATION ENGG">ELECTRONICS</option> 
<option value="ELECTRICAL & ELECTRONICS ENGG">ELECTRICAL</option> 
<option value="MECHANICAL ENGINEERING">MECHANICAL</option> 
<option value="CIVIL ENGINEERING">CIVIL</option> 
<option value="GENERAL">GENERAL</option> 
</select> </td>
</tr>




</table>
<br/>

<center><input  type="submit" class="w3-btn w3-blue" name="" placeholder="enter your msg"> </center>

</form>
<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>


<br/>

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
 </body>



</html>
