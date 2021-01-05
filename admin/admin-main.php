<?php

error_reporting(0);
    session_start();
?>

<?php
if( !isset( $_SESSION['email'])){
echo '<script>
window.location = "index.php";
</script>';
   }
   ?>


<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Car Parking</title>
<link rel="shortcut icon" href="../favicon.ico"> 
<link rel="stylesheet" type="text/css" href="css/mystyle.css">
</head>

<body>
<section class="container">
<header>
<section class="logo">
<p><center>ONLINE CAR PARKING LOT AND RESERVATION SYSTEM</center></p>
</section>
    <nav>
    <ul class="nav" style="margin-left:10px;width:1000px">
        <li><a href="index.php" class="icon home"><span>Home</span></a></li>
        <li class="dropdown">
          <a>Reservations</a>
          <ul>
            <li><a href="pendingReservation.php">Pending/Approved</a></li>
            <!-- <li><a href="approvedReservation.php">Approved</a></li> -->
			</ul>
        </li>
        <li class="dropdown">
          <a>Parking Zones</a>
          <ul>
            <li><a href="zones.php">Add Zones</a></li>
            <li><a href="viewzones.php">View Zones</a></li>
			</ul>
        </li>
        <li class="dropdown">
          <a>Parking Lots</a>
          <ul>
            <li><a href="parking_lots.php">Add Parking Lots</a></li>
            <li><a href="viewparkinglots.php">View Parking Lots</a></li>
			</ul>
        </li>
        <!-- <li class="dropdown">
          <a href="zone.php">Parking Zones</a>
        </li>
		  -->
		 <li class="dropdown">
     <a>Users</a>
          <ul>
            <!-- <li><a href="Addclients.php">Add Users</a></li> -->
            <li><a href="viewClients.php">View Users</a></li>
			</ul>
      <li class="dropdown">
     
       <!-- <li><a href="transactions.php">Transactions</a></li>  -->

       <?php
	

   if( isset( $_SESSION['email'] ) )
      {
   echo "<li><a href='process-log-out.php'>Logout</a></li> 
   ";
   }
    
?>

      </ul>
    </nav>
	<?php


   if( isset( $_SESSION['email'] ) )
      {
	   $name = $_SESSION["name"];
   echo "<p class=\"LogOut\">". $name. " "."<a href=\"process-log-out.php\">Log Out</a></p>";
   }
    
?>
	

  </header>
</section>
</body>

</html>