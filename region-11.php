<?php include 'main.php';?>
<?php 
include('inc\dbcon.php'); ?>

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
<section class="HomeKisii">
<img src="img/carpark2.jpg" alt="Mountain View" style="width:955px;height:470px">

<div class="cont">
<br><br><br><br>

<form action="edit.php" method="post">
                        <table cellpadding="0" cellspacing="0"  border="0" class="table table-striped table-bordered" id="example">
                            
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>NAME</th>
                                   <th>AMOUNT</th>
								   <th>STATUS</th>
                                </tr>
                            </thead>
                            <tbody>
                              	<?php 
							$no=0;
							$query=mysql_query("select * from parking_lots where zoneId = '$_SESSION[zoneId]'")or die(mysql_error());
							while($row=mysql_fetch_array($query)){
							$no=$no+1;
							?>
                              
										<tr>
										 <td><?php echo  $no ?></td>
										 <td><?php echo $row['name'] ?></td>
										 <td><?php echo $row['amount'] ?></td>

											 <td <?php 
											 if($row['status']=='Reserved')
											 {echo "style=\"background: red;\"";}
									  		 else 
									   		{echo "style=\"background: yellow;\"";}
											 ?>>    <?php echo $row['status'] ?>
									 		</td>
										
										
                                         
                                </tr>
                         <?php  } ?>
						 
                            </tbody>
                        </table>
						
</form>



</div>



</section>               
<section class="kisii-bottom">
<p>Safe Parking, whenever you are in Kisii</p>
<p>
<?php     $query=mysql_query("select * from zone where zoneId = '$_SESSION[zoneId]'")or die(mysql_error());
							$row=mysql_fetch_array($query); echo $row['name'] . '  PARKING LOTS';  ?>
</p>
</section>
</body>
</html>
