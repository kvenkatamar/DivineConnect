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

<?php include('../admin/include/header.php');?>
<?php include('../admin/include/sidebar.php');?>


<div class="content-body">
           
      <div class="container-fluid">
      <div class="col-xl-12 col-lg-12">

                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Income Report Details</h4>
                            </div>
                            <div class="card-body">
                               
                                <div class="row">
                                
                                 <div class="table-responsive">
                                  <table class="table table-responsive-sm">
                                    <table id="datatables"> 
                                        <thead>
                                            <tr>
                                                <th>Sr.No.</th>
                                                 <th>Date</th>
                                                <th>Devotees Name</th>
                                                
                                                <th>Donation</th>
                                               
                                               
                                               
                                            </tr>
                                        </thead>


                                   
                                               
                                        <tbody>
                                              <?php 
                                   $stmt = $conn->prepare("SELECT * FROM `income` WHERE date>='".$_POST['fromdate']."' AND date<='".$_POST['todate']."' AND delete_status='0' ");
                                                $stmt->execute();
                                                $record=$stmt->fetchAll();
                                                $i=1;
                                                foreach($record as $key)
                                                {

    $stmt2 = $conn->prepare("SELECT * FROM `devotees` WHERE id='".$key['dname']."' ");
    $stmt2->execute();
                                                
    $s2 = $stmt2->fetch(PDO::FETCH_ASSOC);
    ?>
                                            <tr>
                                                <td><?php echo $i;?></td>
                                                <td><?php echo $key['date'];?></td>
                                                <td><?php echo $s2['dname'];?></td>
                                                
                                                <td><?php echo $key['totalamount'];?></td>
                                               
                                               
                                            </tr>

                                          <?php $i++; }?>
                                        </tbody>
                                  </table>
                                  
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>


    <?php include('../admin/include/footer.php'); ?>