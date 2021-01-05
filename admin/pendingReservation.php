
<?php
session_start();
include('inc/dbcon.php');
if( isset( $_SESSION['email'] ) )
     {
	 }
	else{
	 exit;
  }

  if (isset($_GET['reserve_id']) && isset($_GET['plot_id']) && isset($_GET['zone_id'])){

	$result = mysql_query(" DELETE FROM reservations where reserveId='$_GET[reserve_id]'");
	if(mysql_affected_rows()>0){
        
        
 $resultt = mysql_query("update parking_lots set status='Available' where zoneId  = '$_GET[zone_id]' and lotId='$_GET[plot_id]'") or die(mysql_query());


	 	echo '<script type="application/javascript">alert("Reservation Deleted Successfully!");</script>';
		echo '<script>window.location= "pendingReservation.php";</script>';
		
    }
}



  if(isset($_GET['reserve_id']))
  {
      $_SESSION['reserve_id'] = $_GET['reserve_id'];

      $querey=mysql_query("select * from reservations  where reserveId = '$_SESSION[reserve_id]'")or die(mysql_error());
      $rrow=mysql_fetch_array($querey);
      $counts = mysql_num_rows($querey);

      if($counts > 0){

    $resultt = mysql_query("update reservations set status='APPROVED' where reserveId = '$_SESSION[reserve_id]'") or die(mysql_query());

    if($resultt > 0){
        $resultts = mysql_query("update parking_lots set status='Reserved' where lotId = '$rrow[plotId]' and zoneId= '$rrow[zoneId]'") or die(mysql_query());
        
        echo "   <script type='text/javascript'>
        alert('Successfully Registered!');
        window.location= 'pendingReservation.php';
    </script>";}
    else
    
    {

        echo "   <script type='text/javascript'>
        alert('An Error Occurred, Contact the Administrator !');
        window.location= 'pendingReservation.php';
    </script>";

    }

      }
else

{

    echo "   <script type='text/javascript'>
        alert('An Error Occurred, Contact the Administrator !');
        window.location= 'pendingReservation.php';
    </script>";

}

  }



   ?>
<?php include 'admin-main.php';?>
<?php 
include('inc/dbcon.php');
?>
<!DOCTYPE HTML>
<html>
<head>
<link rel="stylesheet" type="text/css" href="inc/css/structure.css">
<link rel="stylesheet" type="text/css" href="css/mystyles.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="/css/dt_bootstrap.css">

</head>
<body>
<section class="HomeKisii">

<img src="img/carpark.jpg" alt="Mountain View" style="width:954px;height:470px">


<div style="width:1200px;margin-left:-100px" > 
<br>
<br>
<form action="pendingReservation.php" method="post">
                        <table cellpadding="0"  cellspacing="0"  border="0" class="table table-striped table-bordered" id="example">
                            
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>NAME/ID</th>
                                   <th>ZONE</th>
								   <th>PLOT</th>
                                   <th>CAR_MODEL</th>
                                   <th>CAR_TYPE</th>
                                   <th>PLATE_NO</th>
                                   <th>AMOUNT</th>
                                   <th>TOTAL</th>
                                   <th>FROM</th>
                                   <th>TO</th>
                                   <th>STATUS</th>
                                   <th>DATE</th>
                                   <th>ACTION</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                              	<?php 
							$no=0;
							$query=mysql_query("select * from reservations")or die(mysql_error());
							while($row=mysql_fetch_array($query)){ 

                                $querry=mysql_query("select * from zone where zoneId = '$row[zoneId]'")or die(mysql_error());
                                while($roow=mysql_fetch_array($querry)){ $id = $roow['reserveId'];

                                    $querrys=mysql_query("select * from parking_lots where lotId = '$row[plotId]'")or die(mysql_error());
                                    while($roows=mysql_fetch_array($querrys)){

							$no=$no+1;
							?>
                              
										<tr>
										 <td><?php echo  $no ?></td>
										 <td><?php echo $row['userId'] ?></td>
										 <td><?php echo $roow['name'] ?></td>
                                         <td><?php echo $roows['name'] ?></td>
                                         <td><?php echo $row['carModel'] ?></td>
                                         <td><?php echo $row['carType'] ?></td>
                                         <td><?php echo $row['plateNo'] ?></td>
                                         <td><?php echo $row['price'] ?></td>
                                         <td><?php echo $row['total'] ?></td>
                                         <td><?php echo $row['fromDate'] ?></td>
                                         <td><?php echo $row['toDate'] ?></td>

											 <td <?php 
											 if($row['status']=='PENDING')
											 {echo "style=\"background: red;\"";}
									  		 else 
									   		{echo "style=\"background: yellow;\"";}
											 ?>>    <?php echo $row['status'] ?>
									 		</td>
                                             <td><?php echo $row['dateReg'] ?></td>
										
     <td><?php echo ("<a class=\"btn btn-success\" href=\"?reserve_id=$row[reserveId]\" name=\"submit_multi\" type=\"submit\" onclick=\"return confirm('Are you sure to Approve this Request?')\">Approve</a>") ?></td>    
     <td><?php echo ("<a class=\"btn btn-success\" href=\"?reserve_id=$row[reserveId]&plot_id=$row[plotId]&zone_id=$row[zoneId]\" name=\"submit_multi\" type=\"submit\" onclick=\"return confirm('Are you sure to Delete this Request?')\">Delete</a>") ?></td>    

                                </tr>
                         <?php }  }} ?>
						 
                            </tbody>
                        </table>
						
</form>

<?php


if (isset($_POST['submit_multi'])){

	$result = mysql_query("DELETE FROM reservations where reserveId='$id'");
	if(mysql_affected_rows()>0){
        
        
 $resultt = mysql_query("update parking_lots set status='Available' where zoneId  = '$id'") or die(mysql_query());


	 	echo '<script type="application/javascript">alert("Reservation Deleted Successfully!");</script>';
		echo '<script>window.location= "pendingReservation.php";</script>';
		
    }
}


?>

</div>


</section>
<section class="kisii-bottom">
<p>Safe Parking, whenever you are in Kisii</p>
</section>
</body>
</html>
