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
                                <h4 class="card-title">Income & Expense Report Details</h4>
                            </div>
                            <div class="card-body">
                               
                                <div class="row">
                                
                                 <div class="table-responsive">
                                  <table class="table table-responsive-sm">
                                 <table id="datatables"> 
                                        <thead>
                                            <tr>
                                               
                                                
                                               
                                                <th>Donation</th>
                                                <th>Expenses</th>
                                                <th>Total</th>
                                              
                                               
                                               
                                            </tr>
                                        </thead>
                                    <tbody>

 <?php 
      $stmt4=$conn->prepare("SELECT SUM(totalamount) as totalamount from pass1 WHERE delete_status='0'");
             $stmt4->execute();
             $record4=$stmt4->fetchAll();
             foreach ($record4 as $key1) {?>
             <td><?php echo $key1['totalamount'];?> </td> 

     

    <?php
        $stmt5=$conn->prepare("SELECT SUM(totalexpenses) as totalexpenses from expenses WHERE delete_status='0'");
            $stmt5->execute();
            $record5=$stmt5->fetchAll();
            foreach ($record5 as $key2) {?>
            <td><?php echo $key2['totalexpenses'];?> </td> 


            <td>
                <?php
                    $a=$key1['totalamount'];
                    $b=$key2['totalexpenses'];
                    $c=$a-$b;
                    echo $c;

                ?>
            </td>
      
                                               
                                      
                                          

                                          <?php } }?>
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