<?php


include("auth.php"); //include auth.php file on all secure pages ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Welcome Home</title>
<link rel="stylesheet" href="css/news.css" />
</head>
<body>

               <header> 

        <img src="logo.png" alt="LOGO GOSE HEAR" ></img>
        <center><h1>Dr.YC JAMES YEN GOVT POLYTECHNIC,KUPPAM</h1><center>
        <h2>LIBRARY MANAGEMENT SYSTEM</h2> 
         </header>


          <div class="nav">
                             <ul>
                                       <li><a href="std_index.php">HOME</a></li>

                                       <li><a href="std_dashboard.php">DASHBOARD</a>
		
		

                                       

                                       <li><a href="std_logout.php">LOGOUT</a></li>
                             </ul> 
            </div> 

<div class="form">
<p><h1>Welcome <?php echo $_SESSION['stdusername']; ?>!</h1></p>
<h2>This is secure area.</h2><br/><br/>
<br\><br\>
<img src="img/down.gif"></img>
<h3 style="color:#ff0066;"><span class="blink_text"><a href="std_dashboard.php">DASHBOARD</a><span></h3>



<br /><br /><br /><br />

</div>

<div class="footer">
<p>COPYRIGHT@17DCME</p>
      
      
       </div>
 </body>




</body>
</html>
