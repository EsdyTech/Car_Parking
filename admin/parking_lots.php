
<?php

require('inc\dbcon.php');
	session_start();

?>


<?php include 'admin-main.php';?>
<!DOCTYPE HTML>
<html>
<head>
<link rel="stylesheet" type="text/css" href="inc/css/structure.css">
</head>

<form class="box login" action="parking_lots.php" method="post">

	<fieldset class="boxBody">
	<label><strong>Add New Parking Lots</strong></label>
	<hr />
	  <label>Select Zone</label>
      <?php
      $qry= "SELECT * FROM zone ORDER BY name ASC";
                        $res= mysql_query($qry);
                        $num = mysql_num_rows($res);
                        if ($num > 0){
							echo '<select name="zone" required class="cjComboBox" >';
                          while ($rows=mysql_fetch_array($res)){
							
						  echo'<option value='.$rows['zoneId'].'>'.$rows['name'].'</option>';
						
                              }
                              }  echo '</select>';
                                ?>	  
     <label>Parking Lots Name</label>
	  <input type="text" tabindex="1" name="plname" placeholder="Parking Lots Name (eg PL0001)" required>
    <label>Amount</label>
      <input type="text" tabindex="1" name="amount" placeholder="Amount" required>

	</fieldset>
	<footer>
	  <input type="submit" name="save" class="btnLogin" value="Save" tabindex="4">
	  <?php
	  //Values
	  ?>
	</footer>
</form>
</html>
<?php
	
	if (isset($_POST["save"]))
	{
     $plname = $_POST["plname"];
	 $zone = $_POST["zone"];
	  $amount = $_POST["amount"];
      $dateReg = date('Y-m-d');
			/*CHECK IF RESERVED */
			
$sql="SELECT * FROM parking_lots WHERE name='$plname' and zoneId = ' $zone'";
$result=mysql_query($sql);


// Mysql_num_row is counting table row
$count=mysql_num_rows($result);

// If

if($count > 0){

	echo'	<script>
	alert("Parking Lot Under this Zone Exists!");
	window.location = "parking_lots.php";
	</script>';
}
else
{

        $query = "INSERT INTO `parking_lots` (name,zoneId, amount, status,dateReg) VALUES ('$plname', '$zone', '$amount','Available','$dateReg')";
		$result = mysql_query($query);
			
		if($result){
		
		echo'	<script>
alert("Parking Lots Added successfully!");
window.location = "parking_lots.php";
</script>';

        }
}
	}
    ?>