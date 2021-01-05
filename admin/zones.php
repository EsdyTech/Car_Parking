
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

<form class="box login" action="zones.php" method="post">

	<fieldset class="boxBody">
	<label><strong>Add New Zones</strong></label>
	<hr />
	  <label>Zone Name</label>
	  <input type="text" tabindex="1" name="name" placeholder="Zone Name" required>
	  <label>Street</label>
	  <input type="text" tabindex="1" name="street" placeholder="Street" required>
	  <label>Vehicle Type</label>
	   <select name="vehicle" class="cjComboBox" >
			<option value="Car">Cars</option>
			<option value="Lorry">Lorry</option>
			<option value="Trailer">Trailer</option>
			</select>
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
     $name = $_POST["name"];
	 $street = $_POST["street"];
	  $vehicle = $_POST["vehicle"];
			
			/*CHECK IF RESERVED */
			
$sql="SELECT * FROM zone WHERE name='$name'";
$result=mysql_query($sql);


// Mysql_num_row is counting table row
$count=mysql_num_rows($result);

// If

if($count > 0){

	echo'	<script>
	alert("Zone Exists!");
	window.location = "zones.php";
	</script>';
}
else
{

        $query = "INSERT INTO `zone` (name, type, street) VALUES ('$name', '$vehicle', '$street')";
		$result = mysql_query($query);
			
		if($result){
		
		echo'	<script>
alert("Zone Added successfully!");
window.location = "zones.php";
</script>';

        }
}
	}
    ?>