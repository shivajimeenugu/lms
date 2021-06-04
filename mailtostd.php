<?php


include("auth.php"); //include auth.php file on all secure pages ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="w3.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script type="text/javascript" src="nicEdit.js"></script>
<script type="text/javascript">
	bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
</script>
<title>Welcome Home</title>
<script>
alert("THIS MAIL SERVICES WORKS ONLY FOR STUDENT WHO REGISTER THEIR STUDENT ACCOUNT");

</script>
</head>
<?php 
include 'db.php';
require_once "phpmailer/class.phpmailer.php";

$no="";

if(isset($_POST['submit']) && $_POST['new']==1)
{
	$mail=0;
	$cglcode=$_REQUEST['cglcode'];
$br=strtoupper($_REQUEST['br']);
$stdno=$_REQUEST['stdno'];
$sdpin = $cglcode."-".$br."-".$stdno;
date_default_timezone_set('Asia/Kolkata'); 

 $trn_date=date("Y-m-d H:i:s");
 $mail_body=$_REQUEST['area1'];
$query="select * from std_users where username= '$sdpin'";	
$results= mysqli_query($con,$query);
$row_mail = mysqli_fetch_assoc($results);
$email=$row_mail['email'];
	if($email){
	//------------------------------mail__code---------------------------------------
	$message = '<html><head>
                <title>DR YC JAMES YEN GOVT POLYTECHNIC,KUPPAM LIBRARY</title>
                </head>
                <body>';
        $message .= '<h1>Dear ' . $sdpin . '!</h1>';
        $message .= '<p>'.$mail_body.'</p>';
		$message .= '<p><footer align="right"><b>THANK YOU</b><br/><i>YC LIBRARY</i></footer></p>';
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

        $mail->Subject = trim("YC LIBRARY  ");
        $mail->MsgHTML($message);

        try {
          $mail->send();
          $msg = "An email has been sent for verfication.";
          $msgType = "success";
        } catch (Exception $ex) {
          $msg = $ex->getMessage();
          $msgType = "warning";
        }
		if($msgType=="success"){
		echo '<script>
		
		alert("MAIL SENT TO '.$email.'----------->'.$msgType.'");
		
		</script>';}
		else{
		echo '<script>
		
		alert("ERROR OCCER----------> '.$msg.'----------->'.$msgType.'");
		
		</script>';	
		}
		//------------------------------mail__code---------------------------------------
	}
	else{
		echo '<script>alert("NO EMAIL FOUND. WITH THIS PIN ");</script>';
	}
		
		
}

?>
<body  >
     <div class="w3-sidebar w3-bar-block w3-card w3-animate-left" style="display:none" id="mySidebar">
                             <button onclick="w3_close()" class="w3-bar-item w3-button w3-large">Close &times;</button>
                                       <a class="w3-bar-item w3-button" href="index.php">HOME</a>

                                       <a class="w3-bar-item w3-button" href="dashboard.php">DASHBOARD</a>
		
		

                                       

                                       <a class="w3-bar-item w3-button" href="logout.php">LOGOUT</a>
                             
            </div> 


<div class="w3-container w3-animate-right" id="main">
             <?php include 'header.php';?>










<br/><br/><br/>



<form class=""  action=""  method="post" align="center">
<input type="hidden" name="new" value="1" /></input>
<div >
<center>
<table class="w3-table-all w3-border-all w3-card ">
<tr>
<td><lable>PIN:</lable></td>

<td><input type="textbox" style="width:100px;"  name="cglcode"  required ></input>

<b>-</b>
<select name="br" style="width:100px;" ><option value="CM">CM</option> <option value="EC">EC</option> <option value="EE">EE</option> <option value="M">M</option> </select>

<b>-</b>

<input type="textbox"  style="width:100px;"  name="stdno"  required ></td>

</tr>

<tr>
<td  ><lable>MESSAGE:</lable></td>
<td ><textarea  style="margin: 0px; width: 999px; height: 251px;" name="area1"> </textarea></th></td>
</tr>





</table></center><br/><br/>
<center><input type="submit" value="SEND MAIL" name="submit" class="w3-button w3-blue" ></center>







</div>

<br/>




<br/><br/>
<br/>
<br/>







</form>

<br/><br/><br/>







     



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
