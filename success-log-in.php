<?php include 'main.php';?>
<?php 
include('inc\dbcon.php'); ?>
<?php
if( !isset( $_SESSION['email'])){
echo '<script>
window.location = "index.php";
</script>';
   }
   ?>


<!DOCTYPE HTML>
<html>
<head>
<link rel="stylesheet" type="text/css" href="inc/css/structure.css">
<link rel="stylesheet" type="text/css" href="inc/css/mystyles.css">

</head>
<body>
<section class="HomeKisii">
<img src="img/carppark.jpg" alt="Mountain View" style="width:954px;height:470px">
<section class="success" style="width:700px;height:150px;margin-left:150px; margin-top:-150px">
<br/>
<p><?php
    session_start();

   if( isset( $_SESSION['email'] ) )
      {
	   $name = $_SESSION["name"];
   echo "<p>Welcome To Our Online Parking Lot System! <br/><br/>".$name."</p>";
   }
    
?></p>
</section>
</section>
<section class="kisii-bottom">
<p>Safe Parking, whenever you are in Kisii</p>
</section>
</body>
</html>
