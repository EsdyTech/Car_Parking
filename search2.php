<body>

<?php include('inc\dbcon.php'); ?>



<?php
error_reporting(0);
$qq = $_GET['qq'];

$sqlls="SELECT * FROM parking_lots WHERE lotId = '".$qq."'";
$resultts = mysql_query($sqlls);
$counts = mysql_num_rows($resultts);
$ro = mysql_fetch_array($resultts);
  if($counts == 1 ){
			echo " 
            <input type='text' name='amount' value='".$ro['amount']."' readonly>
            <label>Status</label>
            <input type='text' name='status' value='".$ro['status']."' readonly>"; }



?>
</body>
