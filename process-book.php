<?php
	require('inc\dbcon.php');
	session_start();
     $email = $_SESSION["email"];
	 $model = $_SESSION["model"];
	  $vehicle = $_SESSION["vehicle"];
	  $status="PENDING";
	  $plateno = $_SESSION["plateno"];
	  $plot = $_SESSION["plot"];
	  $amount = $_SESSION["amount"];
	  $zone = $_SESSION["zone"];
	    $from = $_SESSION["from"];
		 $to = $_SESSION["to"];

		 
		    // $charge = "1000";
			
			/*CHECK IF RESERVED */
			
$sql="SELECT * FROM zones WHERE street='$street' and plot='$plot'";
$result=mysql_query($sql);


// Mysql_num_row is counting table row
$count=mysql_num_rows($result);

// If

if($count==1){

echo'	<script>
alert("Parking Space Reseverd/Occupied By another User!");
window.location = "index.php";
</script>';
 header('location:error-book.php');
}
else
{

        $query = "INSERT INTO `zones` (status, email, model, vehicle,street,plot,platenumber,account,charge,d1,d2) VALUES ('$status', '$email', '$model', '$vehicle' , '$street', '$plot', '$plateno', '$account','$charge','$from','$to')";
        $result = mysql_query($query);
		
		$var = $_SESSION["from"];
$date = str_replace('/', '.', $var);
echo date('Y.m.d', strtotime($date));
		if($result){
		
		echo'	<script>
alert("Parking Space successfully Reseverd/Occupied!");
window.location = "index.php";
</script>';
 header('location:error-book.php');
           //REDIRECT
		   header('location:success-book.php');
		   
exit;
        }
}
    ?>