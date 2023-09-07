
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
<style type="text/css">
    #devote{
        height: 300px;
    }
    </style>

<div class="content-body">
           
      <div class="container-fluid">
      <div class="col-xl-12 col-lg-12">

                        <div class="card" id="devote">
                            <div class="card-header">
                                <h4 class="card-title">Seva</h4>
                            </div>
                            <div class="card-body">
                              <!--   <a href="income.php" class="btn btn-primary mb-3">Add</a> -->
                                <div class="row">
                                
                                 <div class="table-responsive">
                                    <table class="table table-responsive-sm">


                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Seva Name</th>
                                                <th>Charge of Seva</th>
                                                <th>No. of Person</th>
                                              
                                              <!--   <th>Action</th> -->
                                            </tr>
                                        </thead>
                                        <?php 
                                           $stmt = $conn->prepare("SELECT * FROM `seva` WHERE id='".$_GET['id']."' ");
                                                $stmt->execute();
                                                $record = $stmt->fetchAll();
                                                foreach ($record as $key) { ?>
                                                  
                                        <tbody>
                                            <tr>
                                                <td><?php echo $key['id'];?></td>
                                                <td><?php echo $key['sevaname'];?></td>
                                                <td><?php echo $key['chargeofseva'];?></td>
                                                <td><?php echo $key['nperson'];?></td>
                                                <td><?php echo $key['schedule'];?></td>

                              
                                            </tr>


                                            <?php } ?>
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
      
