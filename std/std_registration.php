
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
                                       <a class="w3-bar-item w3-button" href="std_login.php">HOME</a>

                        
                             
            </div> 


<div class="w3-container w3-animate-right" id="main">
             <div class="w3-container w3-blue">

   <button id="openNav" class="w3-button w3-teal w3-xlarge" onclick="w3_open()">&#9776;</button>

        <center><img src="logo.png"  class="logo" alt="LOGO GOSE HEAR" ></img></center>
        <center><h2>Dr.YC JAMES YEN GOVT POLYTECHNIC,KUPPAM </h2></center>
        <center><h3>LIBRARY MANAGEMENT SYSTEM</h3></center>
        

</div>



     

<div class="w3-container" >


<?php
require_once "phpmailer/class.phpmailer.php";
	require('db.php');
    //require('mail_verify/language/index.php');
	// If form submitted, insert values into the database.
    if (isset($_REQUEST['stdno'])){
		//$username = stripslashes($_REQUEST['username']); // removes backslashes
		//$username = mysqli_real_escape_string($con,$username); //escapes special characters in a string
		
	$bname=$_REQUEST['br'];
	$cglcode=$_REQUEST['cglcode'];
$br=strtoupper($_REQUEST['br']);
$stdno=$_REQUEST['stdno'];
$stdpin=$cglcode."-".$br."-".$stdno;
$stdpin=stripslashes($stdpin);
$stdpin=mysqli_real_escape_string($con,$stdpin);		
		
		
		
		
		$email = stripslashes($_REQUEST['email']);
		$email = mysqli_real_escape_string($con,$email);
		$password = stripslashes($_REQUEST['password']);
		$password = mysqli_real_escape_string($con,$password);

		$trn_date = date("Y-m-d H:i:s");
        $hash = md5( rand(0,1000) );
		
$q_chk="Select * from std_users where username='$stdpin';";
$result_chk = mysqli_query($con,$q_chk);
$row_chk= mysqli_fetch_assoc($result_chk);
	
if($row_chk['username']!=$stdpin && $row_chk['email']!=$email){

$query = "INSERT into `std_users` (username, password, email, trn_date,hash) VALUES ('$stdpin', '".md5($password)."', '$email', '$trn_date','$hash')";
        $result = mysqli_query($con,$query);
        if($result){
            //echo "<div class='form'><h3>You are registered successfully.</h3><br/><br/><h3>PLEASE VERIFY YOUR MAIL. VERIFICATION LINK HAS BEEN SENT... </h3><br/></div>";
        
		echo '
	<div id="id01" class="w3-modal  w3-animate-zoom">
    <div class="w3-modal-content w3-padding-16 w3-card">
      <div class="w3-container w3-card">
	  <span onclick="document.getElementById("id01").style.display="none"" class="w3-button w3-display-topright">&times;</span>
	<h1 class="w3-panel w3-green w3-round">You are registered successfully.</h1>
	                    <br/>
	<h1 class="w3-panel w3-blue w3-round">PLEASE VERIFY YOUR MAIL. VERIFICATION LINK HAS BEEN SENT... </h1>
	</div></div></div>
	
	<script>document.getElementById("id01").style.display="block"</script>
	';
		
		
		
		
		
		
		$message = '<html><head>
                <title>YC LIBRARY Email Verification</title>
                </head>
                <body>';
        $message .= '<h1>Hi ' . $stdpin . '!</h1>';
        $message .= '<p><a href="http://network.rf.gd/LMS/std/activate.php?id='.$hash.'">CLICK TO ACTIVATE YOUR ACCOUNT</a>';
        $message .= "</body></html>";
        

        // php mailer code starts
        $mail = new PHPMailer(true);
        $mail->IsSMTP(); // telling the class to use SMTP

        $mail->SMTPDebug = 0;                     // enables SMTP debug information (for testing)
        $mail->SMTPAuth = true;                  // enable SMTP authentication
        $mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
        $mail->Host = "smtp.mail.com";      // sets GMAIL as the SMTP server
        $mail->Port = 465;                   // set the SMTP port for the GMAIL server

        $mail->Username = 'shivaji@dr.com';
        $mail->Password = 'shivaji.MS';

        $mail->SetFrom('shivaji@dr.com', 'YC LIBRARY ');
        $mail->AddAddress($email);

        $mail->Subject = trim("YC LIBRARY Email Verifcation ");
        $mail->MsgHTML($message);

        try {
          $mail->send();
          $msg = "An email has been sent for verfication.";
          $msgType = "success";
        } catch (Exception $ex) {
          $msg = $ex->getMessage();
          $msgType = "warning";
        }
		}
		else{echo 'error occer';}
    }
	else{
	echo '
	<div id="id01" class="w3-modal  w3-animate-zoom">
    <div class="w3-modal-content w3-padding-16 w3-card">
      <div class="w3-container w3-card">
	  <span onclick="document.getElementById("id01").style.display="none"" class="w3-button w3-display-topright">&times;</span>
	<h1 class="w3-panel w3-green w3-round">EMAIL OR PIN ALREDY EXISTS!</h1></div></div></div>
	<script>document.getElementById("id01").style.display="block"</script>
	';
	
	}
	}
	
	
	
?>
<div class="w3-card" align="center" >
<h1 class="w3-blue">Registration</h1>
<form name="registration" action="" method="post"><br>
<!--<input type="text" name="username" placeholder="Username" required /><br>-->
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
</tr>


<tr>
<th><lable>E-AMIL:</lable></th>
<td colspan="6"><input class="w3-input w3-border" type="email" name="email" placeholder="Email" required /></td>
</tr>

<tr>
<th><lable>PASSWORD:</lable></th>
<td colspan="6"><input class="w3-input w3-border" type="password" name="password" placeholder="Password" required /></td>
</tr>

</table>
</div>

<br/>

<input type="submit"  class="w3-button w3-blue"   name="submit" value="Register" />
</form>
<br /><br />

</div>



<br />

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
