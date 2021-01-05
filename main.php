
<?php 

error_reporting(0);
require('inc\dbcon.php');
	session_start();




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
        <li><a href="success-log-in.php" class="icon home"><span>Home</span></a></li>
        <!-- <li class="dropdown">
          <a>Our Services &amp; Personnel</a>
          <ul>
            <li><a href="online-booking.php">Online Booking</a></li>
            <li><a href="on-street-booking.php">On-street Parking</a></li>
			<li><a href="off-street-parking.php">Off-street Parking</a></li>
            <li><a href="payment-methods.php">Payment Methods</a></li>
            <li><a href="parking-personnel.php">Park Attendants</a></li>
			<li><a href="security.php">Security</a></li>
          </ul>
        </li> -->
 
        <li class="dropdown">
          <a href="">Parking Zones</a>
          <ul class="large">
          <?php 
            $qry= "SELECT * FROM zone ORDER BY name ASC";
            $res= mysql_query($qry);
            $num = mysql_num_rows($res);
            if ($num > 0){
              while ($rows=mysql_fetch_array($res)){
              echo'<li><a href="region-11.php?zoneId='.$rows['zoneId'].'">'.$rows['name'].' ('.$rows['type'].') Only</a></li>';
                  }
                  }
                    ?>     
           
          </ul>
        </li>
		 
		<?php
   if( isset( $_SESSION['email'] ) )
   {
   echo  "<li><a href=\"parking_space.php\">Book/Reserve</a></li>";
   }
   else
   {
    echo "<li><a href=\"admin/index.php\">Admin Panel</a></li>";
    echo "<li><a href=\"index.php\">Client Panel</a></li>";
   }
    ?>


<?php

   if( isset( $_SESSION['email'] ) )
      {
   echo " <li class='dropdown'>
   <a>Status</a>
   <ul>
     <li><a href='UserBookStatus.php'>Booking Status</a></li>
   </ul>
 </li>";
   }
    
?>

	<?php

   if( isset( $_SESSION['email'] ) )
      {
	   $name = $_SESSION["name"];
   echo " <li><a href='process-log-out.php'>Logout</a></li>";
   }
    
?>



<?php

   if(!isset( $_SESSION['email'] ) )
      {
   echo "  <li><a href='contact.php'>Contact</a></li> 	";
   echo "  <li><a href='#'>About</a></li> 	";
   }
    
?>
            

      </ul>
    </nav>
	<?php
    session_start();

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