<?php


include("auth.php"); //include auth.php file on all secure pages ?>
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
             <div class="w3-container w3-blue">

   <button id="openNav" class="w3-button w3-teal w3-xlarge" onclick="w3_open()">&#9776;</button>

        <center><img src="logo.png"  class="logo" alt="LOGO GOSE HEAR" ></img></center>
        <center><h2>Dr.YC JAMES YEN GOVT POLYTECHNIC,KUPPAM </h2></center>
        <center><h3>LIBRARY MANAGEMENT SYSTEM</h3></center>
        

</div>



<div class="w3-container" >
<center><p><h1 class="w3-center w3-animate-right">Welcome <?php echo $_SESSION['stdusername']; ?>!</h1></p></center>
<center><img class="w3-center w3-animate-right" src="2.jpg" ></img></center>
<br\><br\><br\><br\><br\><br\><br\><br\>
<center><img style="margin-top:150px;"src="down.gif"></img>
<h3 style="color:#ff0066;"><span class="blink_text"><a href="std_dashboard.php">DASHBOARD</a><span></h3></center>



<br /><br /><br /><br />



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


























