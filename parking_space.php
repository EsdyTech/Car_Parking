<?php include 'main.php';?>
<?php 
include('inc\dbcon.php'); ?>
<?php
session_start();
if( !isset( $_SESSION['email'])){
echo '<script>
window.location = "index.php";
</script>';
   }
   ?>

<!DOCTYPE HTML>
<html>
<head>
<script src="mootools-core.js" type="text/javascript"></script>
	<script src="mootools-more.js" type="text/javascript"></script>
	<script src="Source/Locale.en-US.DatePicker.js" type="text/javascript"></script>
	<script src="Source/Picker.js" type="text/javascript"></script>
	<script src="Source/Picker.Attach.js" type="text/javascript"></script>
	<script src="Source/Picker.Date.js" type="text/javascript"></script>


<link rel="stylesheet" type="text/css" href="inc/css/structure.css">
<link href="style.css" rel="stylesheet" />
	<link href="Source/datepicker_bootstrap/datepicker_bootstrap.css" rel="stylesheet">

	<script>
function showUser(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","search.php?q="+str,true);
        xmlhttp.send();
    }
}



function showUserr(str) {
    if (str == "") {
        document.getElementById("txtHintt").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHintt").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","search2.php?qq="+str,true);
        xmlhttp.send();
    }
}

</script>

<script>

	window.addEvent('domready', function(){
		new Picker.Date($$('----'), {
			timePicker: true,
			positionOffset: {x: 5, y: 0},
			pickerClass: 'datepicker_bootstrap',
			useFadeInOut: !Browser.ie
		});
	});

	</script>





</head>

<form class="box login" name="myForm" action="parking_space.php" method="post">
	<fieldset class="boxBody">


	<label><strong>Describe your Vehicle</strong></label>
	<hr />
	  <label>Model</label>
	  <input type="text" tabindex="1" required name="model" placeholder="eg. Toyota Allion" >
	  <label>Vehicle Type</label>
	   <select name="type" class="cjComboBox" >
			<option value="Car">Car</option>
			<option value="Lorry">Lorry</option>
			<option value="Trailer">Trailer</option>
			<option value="Bicycle">Bicycle</option>
			<option value="Motorcycle">Motorcycle</option>
			<option value="Tricycle">Tricycle</option>
			
			</select>
	
	<label><strong>Parking Details</strong></label>
	<hr />


								<?php 
                        $qry= "SELECT * FROM zone ORDER BY name ASC";
                        $res= mysql_query($qry);
                        $num = mysql_num_rows($res);
                        if ($num > 0){
							echo '<select name="zone" onchange="showUser(this.value)" required class="cjComboBox" >';
							echo"<option value=''>--Select--</option>";
                          while ($rows=mysql_fetch_array($res)){
							
						  echo'<option value='.$rows['zoneId'].'>'.$rows['name'].'</option>';
						
                              }
                              }  echo '</select>';
                                ?>



	   <!-- <select name="street" class="cjComboBox" >
			<option value="OGEMBO STREET">OGEMBO/ZONIC STREET - Cars Only</option>
			<option value="AGAKHAN STREET">AGAKHAN STREET - Cars only</option>
			<option value="NATIONAL BANK/LEVEL FIVE STREET">NATIONAL BANK/LEVEL FIVE - Lorries and Cars</option>
			<option value="DARAJA MBILI/UHURU PLAZA">DARAJA MBILI/UHURU PLAZA - trucks and Cars</option>
			<option value="UCHUMI/RAM STREET"> UCHUMI/RAM STREET- Lorries and Cars Only</option>
			<option value="MAIN BUS/MATATU STAGE"> MAIN BUS/MATATU STAGE- PSV Only</option>
		</select> -->
		  								

		<?php
		echo"<div id='txtHint'></div>";
		?>					
		<label>Amount to be Charged</label>
		<?php
		echo"<div id='txtHintt'></div>";
		?>	
	
		<?php
		echo"<div id='txtHintt'></div>";
		?>	
	<label>Plate Number</label>
	  <input type="text" tabindex="3" required name="plateno" placeholder="eg. KAC 123" >
	  	<hr />
	   <!-- <label>Amount to be charged per Parking Space:  &#8358;1000</label> -->
	   <label>Specify Date and time to Book/Reserve</label>
	 <label>From:</label>
	<input type="text" name="from" readonly value="<?php echo date("Y-m-d");?>" >
	<label>To:</label>
	<input type="text"  name="to" required pattern = "[0-9]{4}-[0-9]{2}-[0-9]{2}" placeHolder="2019-05-28">
	</fieldset>

	
	<footer>
	  <input type="submit" name = "btnSave" class="btnLogin" value="Book/Reserve Now" tabindex="4">
	</footer>
</form>
</html>

		<?php
		
		// $from = $_POST['from'];
		// $to = $_POST['to'];
		// $now = time(); $date = strtotime("2019-05-28");
		// $diff = $date - $now;
	//	echo round($diff/(60*60*24));

		if (isset($_POST['btnSave'])) {
			//code for validation of fields goes here
			
					$email = $_SESSION['email'];
					$model = $_POST['model'];
					$type = $_POST['type'];
					$zone = $_POST['zone'];
					$plot = $_POST['plot'];
					$amount = $_POST['amount'];
					$plateno = $_POST['plateno'];
					$from = $_POST['from'];
					$to = $_POST['to'];
					$dateReg = date('Y-m-d');
			

				$diff = strtotime($to) - strtotime($from);
				 $noOfDays = round($diff/(60*60*24));
				$total = $amount * $noOfDays;
		
					$querys = mysql_query("select  * from parking_lots where lotId ='$plot' and status='Reserved'") or die(mysql_error());
					$rows = mysql_fetch_array($querys);
					$num = mysql_num_rows($querys);
					
					if( $num > 0){

					echo "   <script type='text/javascript'>
					alert('This Parking Space(Lot) has been Booked, Select another Parking Lot!');
					window.location= 'parking_space.php';
				</script>";

					}

					else{

					$result =  mysql_query("insert into reservations (userId,zoneId,plotId,carModel,carType,plateNo,price,total,fromDate,toDate,status,dateReg)
					values ('$email','$zone','$plot','$model','$type','$plateno','$amount','$total','$from','$to','PENDING','$dateReg')
					") or die(mysql_error());

								if($result){

						echo "   <script type='text/javascript'>
									alert('Parking Lot Booked, Awaiting Approval!');
									window.location= 'success-book.php';
								</script>";

					}
					}
					}
										?>
			


