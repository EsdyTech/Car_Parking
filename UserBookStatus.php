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

<?php


if(isset($_GET['zoneId']))
{

$_SESSION['zoneId'] = $_GET['zoneId'];

}

?>




<!DOCTYPE HTML>
<html>
<head>
<link rel="stylesheet" type="text/css" href="inc/css/structure.css">
<link rel="stylesheet" type="text/css" href="admin/css/mystyles.css">
<link rel="stylesheet" type="text/css" href="admin/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="admin/css/dt_bootstrap.css">
</head
<body>
<section class="HomeKisii" >
<img src="img/1.jpg" alt="Mountain View" style="width:955px;height:470px">

<div style="width:1200px;margin-left:-100px" > 
<br><br><br><br>

<form action="edit.php" method="post">
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
                                   
                                </tr>
                            </thead>
                            <tbody>
                              	<?php 
							$no=0;
							$query=mysql_query("select * from reservations where userId = '$_SESSION[email]'")or die(mysql_error());
							while($row=mysql_fetch_array($query)){

                                $querry=mysql_query("select * from zone where zoneId = '$row[zoneId]'")or die(mysql_error());
                                while($roow=mysql_fetch_array($querry)){

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
										
                                         
                                </tr>
                         <?php }  }} ?>
						 
                            </tbody>
                        </table>
						
</form>



</div>



</section>               
<section class="kisii-bottom">
<p>Safe Parking, whenever you are in Kisii</p>
<p>
<?php    echo 'User:  '. $_SESSION['email'];  ?>
</p>
</section>
</body>
</html>
