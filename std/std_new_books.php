<html>
<head>
<meta charset="utf-8">
<title>Dashboard - Secured Page</title>
<link rel="stylesheet" href="css/styles2.css" />
<link rel="stylesheet" href="css/tstyle.css" />
</head>
<body>

           <header> 

        <img src="img/logo.png" alt="LOGO GOSE HEAR" ></img>
        <h1>LIBRARY MANAGEMENT SYSTEM</h1>
        <h2>BY 17DCME</h2>
         </header>


          <div class="nav">
                             <ul>
                                       <li><a href="std_index.php">HOME</a></li>

                                       <li><a href="std_dashboard.php">DASHBOARD</a>
					

                                       

                                       <li><a href="std_logout.php">LOGOUT</a></li>
                             </ul> 
            </div>

<table width="100%" border="1" class="data-tabletwo">
<thead>
<tr>
<th>SI.NO</th>
<th>BOOK NAME</th>
<th>BOOK NO</th>
<th>AUTHOR</th>

</tr>
</thead>
<tbody>
<?php
include("db.php");
include("auth.php");
$count=1;
$sel_query="Select * from new_books ORDER BY id ;";
$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr>
<td align="center"><?php echo $count; ?></td>
<td align="center"><?php echo $row["name"]; ?></td>
<td align="center"><?php echo $row["no"]; ?></td>
<td align="center"><?php echo $row["author"]; ?></td>

</tr>

<?php $count++; }?>
</body>
</html>