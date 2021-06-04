<?php

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Login</title>
<link rel="stylesheet" href="w3.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>



<div class="w3-container w3-blue">

   <header> 

        <center><img src="logo.png" alt="LOGO GOSE HEAR" ></img></center>
        <center><h1>Dr.YC JAMES YEN GOVT POLYTECHNIC,KUPPAM</h1><center>
        <h2>LIBRARY MANAGEMENT SYSTEM</h2> 
         </header>

</div>
        








<?php
	require('db.php');
	session_start();
    // If form submitted, insert values into the database.
    if (isset($_POST['stdno'])){
		
		//$username = stripslashes($_REQUEST['stdusername']); // removes backslashes
		//$username = mysqli_real_escape_string($con,$username); //escapes special characters in a string
		
		
		
			$bname=$_REQUEST['br'];
	$cglcode=$_REQUEST['cglcode'];
$br=strtoupper($_REQUEST['br']);
$stdno=$_REQUEST['stdno'];
$stdpin=$cglcode."-".$br."-".$stdno;
$stdpin=stripslashes($stdpin);
$stdpin=mysqli_real_escape_string($con,$stdpin);
		
		$password = stripslashes($_REQUEST['password']);
		$password = mysqli_real_escape_string($con,$password);
		
	//Checking is user existing in the database or not
        $query = "SELECT * FROM `std_users` WHERE username='$stdpin' and password='".md5($password)."' and active='1'";
		$result = mysqli_query($con,$query) or die(mysqli_error());
		$rows = mysqli_num_rows($result);
        if($rows==1){
			$_SESSION['stdusername'] = $stdpin;
			header("Location: std_index.php"); // Redirect user to index.php
            }
			else{
				
				    if($rows['active']=='0'){echo '<h1 align="center" style="margin:10px;color:blue;"><span class="blink_text">YOU ARE NOT VERIFYED YOUR EMAIL ....</h1></span>';}
				
				else{ echo '<h1 align="center" style="margin:10px;color:blue;"><span class="blink_text">YOU ARE NOT REGISTRED..  </span></h1>';}
			
			
			}
    
	}
?>

<div class="form">


<body>
<!--<marquee>THE STUDENT LOGING IS AVAILABLE  SOON -Admin</marquee>-->
<div class="w3-container">
<center><h2>  Click Here To Login As Student...</h2></center>

<center><button align="center" onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-green w3-large" style="width:auto;">Student Login</button></center>

<br/><br/>
<center><div class="stdb"><a align="center" href="/LMS3" style="width:auto;">GO TO HOME</a></div></center>


<div id="id01" class="w3-modal w3-animate-opacity">
  <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
  
    <div class="w3-center">
      <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
      <img src="logo.png" style="height:200px;width:200px;" alt="Avatar" class="w3-circle w3-margin-top">
    </div>
	
	
	
<!-----////////////////////////////////////////////////////////////////////////////////////////-->	
 <form class="w3-container" action="" method="post" name="login" >
    
    
    

    <div class="w3-container">
      <label for="uname"><b>Username</b></label>
      
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


      <label class="w3-lable" for="psw"><b>Password</b></label>
      <input class="w3-input w3-border" type="password" placeholder="Enter Password" name="password" required>
        <br/>

      <center><button class="w3-button w3-blue w3-center" type="submit">Login</button></center>
      
    </div>  </form>
   <br/>
    <div class="w3-container w3-border-top w3-padding-16 w3-light-grey" >
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-red">Cancel</button>
	  <span class="w3-xlarge" align="right">  not register  <a href="std_registration.php">Click Here!</a></span>
    </div>
    </div>

<!-----////////////////////////////////////////////////////////////////////////////////////////-->	





    
  
  </div>
</div>
</div>



















































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

</body>
</form>


<br /><br />

</div>



</body>
<div class="w3-container w3-blue">
<p>COPYRIGHT©SHIVAJI MEENUGU</p>
       </div>



</html>
