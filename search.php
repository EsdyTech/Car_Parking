<body>

<?php include('inc\dbcon.php'); ?>



<?php
error_reporting(0);
//$q = intval($_GET['q']);
$q = $_GET['q'];

$sqll="SELECT * FROM parking_lots WHERE zoneId = '".$q."'";
$resultt = mysql_query($sqll);
echo   "<select name='plot' required onchange='showUserr(this.value)' class='cjComboBox' >";
echo"<option value=''>--Select--</option>";
while($rowws = mysql_fetch_array($resultt)) {
  
            echo " 
            <option value=".$rowws['lotId'].">".$rowws['name']."</option>	"; 
             
}echo '</select>';

?>
</body>
