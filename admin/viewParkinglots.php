
<?php
session_start();
include('inc/dbcon.php');
if( isset( $_SESSION['email'] ) )
     {
	 }
	else{
	 exit;
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
<img src="img/gov.jpg" alt="Mountain View" style="width:954px;height:470px">

<img src="" alt="" style="width:954px;">


<div style="width:1200px;margin-left:-100px" > 
<br>
<br>
<form action="edit.php" method="post">
                        <table cellpadding="0" cellspacing="0"  border="0" class="table table-striped table-bordered" id="example">
                            
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>PARKING LOT</th>
                                    <th>ZONE</th>
                                   <th>AMOUNT</th>
								   <th>STATUS</th>
                                </tr>
                            </thead>
                            <tbody>
                              	<?php 
							$no=0;
							$query=mysql_query("select * from parking_lots ")or die(mysql_error());
							while($row=mysql_fetch_array($query)){

                                $queryy=mysql_query("select * from zone where zoneId = '$row[zoneId]' ")or die(mysql_error());
							while($roww=mysql_fetch_array($queryy)){
							$no=$no+1;
							?>
                              
										<tr>
										 <td><?php echo  $no ?></td>
										 <td><?php echo $row['name'] ?></td>
                                         <td><?php echo $roww['name'] ?></td>
										 <td><?php echo $row['amount'] ?></td>

											 <td <?php 
											 if($row['status']=='Reserved')
											 {echo "style=\"background: red;\"";}
									  		 else 
									   		{echo "style=\"background: yellow;\"";}
											 ?>>    <?php echo $row['status'] ?>
									 		</td>
										
										
                                         
                                </tr>
                         <?php  } }?>
						 
                            </tbody>
                        </table>
						
</form>





</div>


</section>
<section class="kisii-bottom">
<p>Safe Parking, whenever you are in Kisii</p>
</section>
</body>
</html>
