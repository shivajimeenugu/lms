<?php

 
require('db.php');
include("auth.php"); //include auth.php file on all secure pages ?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="w3.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Welcome Home</title>

</head>
<body class="" >
     <div class="w3-sidebar w3-bar-block w3-white w3-card w3-animate-left" style="display:none" id="mySidebar">
                             <button onclick="w3_close()" class="w3-bar-item w3-button w3-large">Close &times;</button>
                                       <a class="w3-bar-item w3-button" href="index.php">HOME</a>

                                       <a class="w3-bar-item w3-button" href="dashboard.php">DASHBOARD</a>
		
		

                                       

                                       <a class="w3-bar-item w3-button" href="logout.php">LOGOUT</a>
                             
            </div> 


<div class="w3-container w3-animate-right" id="main">
      <?php include 'header.php';?>
   <div class="w3-bar w3-light-blue"  >
    <button class="w3-bar-item w3-button tablink w3-red" onclick="openCity(event,'London')">ISSUE AND RETURN</button>
    <button class="w3-bar-item w3-button tablink" onclick="openCity(event,'Paris')">ADD OR REMOVE</button>
    <button class="w3-bar-item w3-button tablink" onclick="openCity(event,'Tokyo')">NOTIFICATIONS</button>
  <button class="w3-bar-item w3-button tablink" onclick="openCity(event,'tiruvuru')">SEARCH OPTIONS

</button>
   <button class="w3-bar-item w3-button tablink" onclick="openCity(event,'kuppam')">LOGS</button>
</div>

<!--/////////////////////////////////////////-->
<div id="London" class="w3-container w3-display-container city">
  <span onclick="this.parentElement.style.display='none'"
  class="w3-button w3-large w3-display-topright">&times;</span>
 <br/>
 <div class="  w3-container w3-card w3-light-blue">
  
  
 <center> <div class="w3-panel w3-round w3-white"><p>ISSUE AND RETURN</p></div></center>
 <center> <button class="w3-btn w3-yellow w3-border" onclick="window.location.href='issue.php'">ISSUE BOOK</button></center><br/>
 
 
<center> <button class="w3-btn w3-yellow w3-border" onclick="window.location.href='recover.php'">RETURN BOOK</button></center><br/>
 <center> <button class="w3-btn w3-yellow w3-border" onclick="window.location.href='auto_ir2.php'">QR SCAN</button></center><br/>
</div>
  
   <br/>
  
  
</div>
 
<!--/////////////////////////////////////////-->

<div id="Paris" class="w3-container w3-display-container city" style="display:none">
  <span onclick="this.parentElement.style.display='none'"
  class="w3-button w3-large w3-display-topright">&times;</span>
   <br/>
   <div class="    w3-container w3-card w3-light-blue">
  
  
 <center> <div class="w3-panel w3-round w3-white"><p>ADD OR REMOVE</p></div></center>
 <center> <button class="w3-btn w3-yellow w3-border" onclick="window.location.href='newbookinsert.php'">ADD NEW BOOK</button></center><br/>
  
   <center> <button class="w3-btn w3-yellow w3-border" onclick="window.location.href='book_view.php'">REMOVE/EDIT A BOOK</button></center><br/>
 
  

 
  </div>
   <br/>
  
</div>
<!--/////////////////////////////////////////-->
<div id="Tokyo" class="w3-container w3-display-container city" style="display:none">
  <span onclick="this.parentElement.style.display='none'"
  class="w3-button w3-large w3-display-topright">&times;</span>
   <br/>
   <div class=" w3-container w3-card w3-light-blue">
  
  
 <center> <div class="w3-panel w3-round w3-white"><p>NOTIFICATIONS</p></div></center>
 
<center> <button class="w3-btn w3-yellow w3-border" onclick="window.location.href='notify.php'">SEND NOTIFICATION</button></center><br/>

  <center> <button class="w3-btn w3-yellow w3-border" onclick="window.location.href='reqbook_fetch.php'">STUDENT SUGGESTIONS</button></center><br/>
 
<center> <button class="w3-btn w3-yellow w3-border" onclick="window.location.href='mailtostd.php'">SEND PERSONAL MAIL TO STUDENT</button></center><br/>
 
  </div>
   <br/>
  
  
</div>


<!--/////////////////////////////////////////-->

<div id="tiruvuru" class="w3-container w3-display-container city" style="display:none">
  <span onclick="this.parentElement.style.display='none'"
  class="w3-button w3-large w3-display-topright">&times;</span>
   <br/>
   <div class=" w3-container w3-card w3-light-blue">
  <center> <div class="w3-panel w3-round w3-white"><p>SEARCH OPTIONS</p></div></center>
  <center> <button class="w3-btn w3-yellow w3-border" onclick="window.location.href='pin.php'">SEARCH WITH PIN</button></center><br/>
 

	
	<center> <button class="w3-btn w3-yellow w3-border" onclick="window.location.href='search_normal.php'">SEARCH BOOk</button></center><br/>
	
	
 	
	<center> <button class="w3-btn w3-yellow w3-border" onclick="window.location.href='acc_search.php'">SEARCH BOOk WITH ACC.NO</button></center><br/>
	

 <center> <button class="w3-btn w3-yellow w3-border" onclick="window.location.href='book_issue_view .php'">SHOW ISSUED BOOKS</button></center><br/>
 


  <center> <button class="w3-btn w3-yellow w3-border" onclick="window.location.href='serach_with_dept.php'">SEARCH BOOK WITH DEPARTMENT</button></center><br/>


  
 

 
  </div>
  
   <br/>
  
</div>

<div id="kuppam" class="w3-container w3-display-container city" style="display:none">
  <span onclick="this.parentElement.style.display='none'"
  class="w3-button w3-large w3-display-topright">&times;</span>
 <br/>
 <div class="  w3-container w3-card w3-light-blue">
  
  
 <center> <div class="w3-panel w3-round w3-white"><p>LOGS</p></div></center>
 <center> <button class="w3-btn w3-yellow w3-border" onclick="window.location.href='issue_reports.php'">ISSUE LOG</button></center><br/>
 
 
<center> <button class="w3-btn w3-yellow w3-border" onclick="window.location.href='recover_reports.php'">RETURN LOG</button></center><br/>
 
</div>
  
   <br/>
  
  
</div>

<script>
function openCity(evt, cityName) {
  var i, x, tablinks;
  x = document.getElementsByClassName("city");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < x.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" w3-red", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " w3-red";
}
</script>


 


 
 




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














