
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
<form action="" method="post">
                        <table cellpadding="0" cellspacing="0"  border="0" class="table table-striped table-bordered" id="example">
                            
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>NAME</th>
                                    <th>TYPE</th>
                                   <th>STREET</th>
                                </tr>
                            </thead>
                            <tbody>
                              	<?php 
							$no=0;

                                $queryy=mysql_query("select * from zone")or die(mysql_error());
							while($row=mysql_fetch_array($queryy)){
							$no=$no+1;
							?>
                              
										<tr>
										 <td><?php echo  $no ?></td>
										 <td><?php echo $row['name'] ?></td>
										 <td><?php echo $row['type'] ?></td>
                                         <td><?php echo $row['street'] ?></td>


										
                                         
                                </tr>
                         <?php  }?>
						 
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
