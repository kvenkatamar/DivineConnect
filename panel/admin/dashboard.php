<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<?php 
session_start();
 include '../assets/constant/config.php';
  
 try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
      }

        catch(PDOException $e)
        {
        echo "Connection failed: " . $e->getMessage();
        }
?>
 
<?php include("../admin/include/header.php");?>
<?php include("../admin/include/sidebar.php");?>


  <div class="content-body">
            <!-- row -->
			<div class="container-fluid">
				<div class="row">
					<div class="col-xl-6 col-xxl-12">
						<div class="row">


							<div class="col-sm-6">
								<div class="card avtivity-card">
									<div class="card-body">
										<div class="media align-items-center">
											<span class="activity-icon bgl-success mr-md-4 mr-3">

												<i class="fa fa-landmark-dome fa-2x" style="color:green; margin-top: 20px;"></i>


									 
											</span>
											<div class="media-body">
												<p class="fs-14 mb-2">Total Devotees</p>
											
													<?php 
													
														$stmt = $conn->prepare("SELECT count(*) as cnt_name from devotees WHERE delete_status='0' ");
														$stmt->execute();
														$record=$stmt->fetch(PDO::FETCH_ASSOC);?>
														<span class="title text-black font-w600">
															<?PHP echo $record['cnt_name']; 
														$name=$record['cnt_name']; ?></span>


												<!-- </h4> -->
											</div>
										</div>
										
									</div>
									<div class="effect bg-success"></div>
								</div>
							</div>


							<div class="col-sm-6">
								<div class="card avtivity-card">
									<div class="card-body">
										<div class="media align-items-center">
											<span class="activity-icon bgl-secondary  mr-md-4 mr-3">

												<i class="fa fa-hand-holding-dollar fa-2x" style="color:purple; margin-top: 20px;"></i>



											</span>
											<div class="media-body">
												<p class="fs-14 mb-2">Total Donation</p>
												
	<?php 
		
//echo "SELECT SUM(totalamount) as totalamount from income WHERE delete_status='0'";exit;
		$stmt4=$conn->prepare("SELECT SUM(totalamount) as totalamount from income WHERE delete_status='0'");
		$stmt4->execute();
		$record4=$stmt4->fetchAll();
			foreach ($record4 as $key1) {?>
		<span class="title text-black font-w600">
			<?php echo $key1['totalamount'];
			$donation=$record4['totalamount'];?> </span>
			<?php }?>
											</div>
										</div>
										
									</div>
									<div class="effect bg-secondary"></div>
								</div>
							</div>


							<div class="col-sm-6">
								<div class="card avtivity-card">
									<div class="card-body">
										<div class="media align-items-center">
											<span class="activity-icon bgl-danger mr-md-4 mr-3">

													<i class="fa fa-money-bill-1-wave fa-2x" style="color:deeppink; margin-top: 20px;" ></i>
											</span>
											<div class="media-body">
												<p class="fs-14 mb-2">Total Expenses</p>
												
											 <?php 
 														$stmt4=$conn->prepare("SELECT SUM(totalexpenses) as totalexpenses from expenses WHERE delete_status='0'");
													$stmt4->execute();
													$record4=$stmt4->fetchAll();
													foreach ($record4 as $key1) {?>
													<span class="title text-black font-w600"><?php echo $key1['totalexpenses'];
													$expense=$record4['totalexpenses'];?> </span> 
												 <?php }?>
											</div>



										</div>
										
									</div>
									<div class="effect bg-danger"></div>
								</div>
							</div>

							<div class="col-sm-6">
								<div class="card avtivity-card">
									<div class="card-body">
										<div class="media align-items-center">
											<span class="activity-icon bgl-warning  mr-md-4 mr-3">

												<i class="fa fa-warning fa-2x" style="color:orange; margin-top: 20px;"></i>



											</span>
<div class="media-body">
 <p class="fs-14 mb-2">Total Complaints</p>
	<?php 
	$stmt = $conn->prepare("SELECT count(*) as cnt_name from complaints WHERE delete_status='0' ");
	$stmt->execute();
	$record=$stmt->fetch(PDO::FETCH_ASSOC);?>
	<span class="title text-black font-w600"><?PHP echo $record['cnt_name']; 
	$name=$record['cnt_name']; ?></span>
											</div>
										</div>
										
									</div>
									<div class="effect bg-warning"></div>
								</div>
							</div>
						
						</div>
					</div>
				</div>




  <style type="text/css">
  	#list{
  		height: 300px;
  	}
  	#calender{
  		height: 827px;
  	}
  </style>         
     
<div class="card" id="list">
                            <div class="card-header">
                                <h4 class="card-title">Devotees</h4>
                            </div>
				<div class="table-responsive">
                                    <table class="table table-responsive-sm">
                                     
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Devotees Name</th>
                                                <th>State</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
<?php 
    $stmt = $conn->prepare("SELECT * FROM `devotees` WHERE status = '".active."' AND delete_status='0' ");
    $stmt->execute();
    $record = $stmt->fetchAll();
      foreach ($record as $key) { ?>
                                                  
      <tbody>
        <tr>
          <td><?php echo $key['id'];?></td>
          <td><?php echo $key['dname'];?></td>
          <td><?php echo $key['state'];?></td>
       <td>
       <span class="badge bg-success"><?php if($key['status']=="active"){ 
               echo $key['status'];} ?></span>
     </td>
   </tr>


                                            <?php } ?>
                                        </tbody>
                                  </table>
                                  </div>
                              </div>
                            
                       


<div class="card" id="calender">
      <div class="card-header">
<?php
include 'calendar.php';
$calendar = new Calendar();
$calendar1 = new Calendar();

$sql = "SELECT * FROM `schedule` where delete_status=0 ";
 $stmt = $conn->prepare($sql);
   $stmt->execute();
     $result = $stmt->fetchAll();
     foreach ($result as $row) { 
$calendar->add_event($row['dname'],$row['date']);
$calendar->add_event($row['sevaname'],$row['date']);
 }


$sql1 = "SELECT * FROM `festive` where delete_status=0 ";
 $stmt1 = $conn->prepare($sql1);
   $stmt1->execute();
     $result1 = $stmt1->fetchAll();
     foreach ($result1 as $row1) { 
$calendar->add_event($row1['festival'],$row1['date1'],1,"green");

  
  } ?>


        <div class="content home">
            <b><?=$calendar?></b>
            
        </div>

      </div>
    </div>
    
			</div>
		</div>
					









<?php include("../admin/include/footer.php");?>
