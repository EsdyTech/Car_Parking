<?php

$zone=$_POST['zone'];
$plot=$_POST['plot'];
$plateno=$_POST['plateno'];
$amount=$_POST['amount'];

session_start();
// Set session variables
$_SESSION["zone"] = $zone;
$_SESSION["plot"] = $plot;
$_SESSION["plateno"] = $plateno;
$_SESSION["amount"] = $amount;
//echo "Session variables are set.";
header("location:dates.php");

?>