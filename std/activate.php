<?php

//require_once './config.php';
require 'db.php';
if (isset($_GET["id"])) {
  $id = $_GET["id"] ;
 
  $sql = "SELECT * from std_users where hash = '$id'";
  try {
    $result= mysqli_query($con,$sql);
      $row= mysqli_fetch_assoc($result);
	
   

    if ($row) {

      if ($row["active"] == "1") {
        $msgw = "Your account has already been activated.";
        echo $msgw;
      } else {
        $sql2 = "UPDATE `std_users` SET  `active` =  '1' WHERE `hash` = '$id'";
        $resulti= mysqli_query($con,$sql2);
      $rowi=1;
	  //$rowi= mysqli_fetch_assoc($resulti);
        $msgs = "Your account has been activated.";
        //$msgType = "success";
      if($rowi){echo $msgs;}
	  }
    } else {
      $msgw = "No account found";
      //$msgType = "warning";
    echo $msgw;
	}
  } 
  
  catch (Exception $ex) {
    echo $ex->getMessage();
  }
}


?>

<div class="container">
  <div class="row">
    <div class="col-lg-9">
      <h1>Thank you for registering with us.</h1>
    </div>
  </div>
</div>



<?php

?>