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

<br/>

<div class="w3-container" >
<div class=" w3-container w3-card w3-light-blue">
  <center> <div class="w3-panel w3-round w3-white"><p class="w3-blue">WELCOME TO DASHBORD</p></div></center>
  <center> <button class="w3-btn w3-yellow w3-border" onclick="window.location.href='search_normal.php'">SEARCH BOOK</button></center><br/>
 

	
	<center> <button class="w3-btn w3-yellow w3-border" onclick="window.location.href='serach_with_dept.php'">SEARCH BY DEPARTMENT NAME</button></center><br/>
	
	
 	
	<center> <button class="w3-btn w3-yellow w3-border" onclick="window.location.href='notify_fetch.php'">NOTIFICATIONS</button></center><br/>
	

 <center> <button class="w3-btn w3-yellow w3-border" onclick="window.location.href='std_reqbook.php'">SUGGEST BOOK TO LIBRARY</button></center><br/>
 


  <center> <button class="w3-btn w3-yellow w3-border" onclick="window.location.href='std_my_books.php'">MY BOOKS</button></center><br/>


  
 

 
  </div>

<br />



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


























