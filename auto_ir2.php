
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>AUTO PANAL</title>
	
	<link rel="stylesheet" href="w3.css">
	<link rel="stylesheet" href="qrscanner.css">
	
<meta name="viewport" content="width=device-width, initial-scale=1">

<script language="JavaScript" type="text/javascript" src="instascan.min.js"></script>


</head>


<body  >
     <div class="w3-sidebar w3-bar-block w3-card w3-animate-left" style="display:none" id="mySidebar">
                             <button onclick="w3_close()" class="w3-bar-item w3-button w3-large">Close &times;</button>
                                       <a class="w3-bar-item w3-button" href="index.php">HOME</a>

                                       <a class="w3-bar-item w3-button" href="dashboard.php">DASHBOARD</a>
		
		

                                       

                                       <a class="w3-bar-item w3-button" href="logout.php">LOGOUT</a>
                             
            </div> 

<?php //include("auth.php");
			 include 'header.php';?>
<div class="w3-container  w3-card-4 w3-animate-right" id="main">
             
<center><h1>PLEASE QR IN FRONT OF CAMERA</h1><br/></center>
  <center><div class="w3-container   w3-padding">
    
    <center>
		<!--<img class="w3-card-4 " style="float:right;;" src="scan.gif" width="300px" height="300px"></img>-->
	<video width="500px" class="w3-card-4 w3-responsive w3-padding-8 w3-border-green w3-circle w3-blue"id="preview"></video>

	</center>
	</div></center> 
    <script type="text/javascript">
      let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
      scanner.addListener('scan', function (content) {
        //alert(content);
		function Sound(url, vol, autoplay, loop)
{
    var that = this;

    that.url = (url === undefined) ? "" : url;
    that.vol = (vol === undefined) ? 1.0 : vol;
    that.autoplay = (autoplay === undefined) ? true : autoplay;
    that.loop = (loop === undefined) ? false : loop;
    that.sample = null;

    if(that.url !== "")
    {
        that.sync = function(){
            that.sample.volume = that.vol;
            that.sample.loop = that.loop;
            that.sample.autoplay = that.autoplay;                     
            setTimeout(function(){ that.sync(); }, 60);
        };

        that.sample = document.createElement("audio");
        that.sample.src = that.url;
        that.sync();

        that.play = function(){
            if(that.sample)
            {
                that.sample.play();
            }
        };

        that.pause = function(){
            if(that.sample)
            {
                that.sample.pause();
            }
        };
    }
}

var test = new Sound("censor-beep-01.mp3");
test.play();
		
		var myurl='auto_dashboard.php?accno='+content;
		window.open(myurl);
		//document.write('<a href="'+content+'">shivaji meenuggu</a>');
      });
      Instascan.Camera.getCameras().then(function (cameras) {
        if (cameras.length > 0) {
          scanner.start(cameras[0]);
        } else {
          console.error('No cameras found.');
        }
      }).catch(function (e) {
        console.error(e);
      });
    </script>
   




<br/>

<br/>
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

<script type="text/javascript">
    
	setTimeout(function(){ window.scrollTo(0, 7000); }, 10000);

   
    
</script>
</div>
 </body>


</html>
