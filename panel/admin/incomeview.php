
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
                               <!--  <h4 class="card-title">Details</h4> -->
                            </div>
                            <div class="card-body">
                              <!--   <a href="income.php" class="btn btn-primary mb-3">Add</a> -->
                                <div class="row">
                                
                                 <div class="table-responsive">
                                    <table class="table table-responsive-sm">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Receipt No.</th>
                                                <th>Receipt Date</th>
                                                <th>Devotees Name</th>
                                                <th>Amount</th>
                                           
                                              <!--   <th>Action</th> -->
                                            </tr>
                                        </thead>
                                        <?php 
                                           $stmt = $conn->prepare("SELECT * FROM `income` WHERE id='".$_GET['id']."' ");
                                                $stmt->execute();
                                                $record = $stmt->fetchAll();
                                                foreach ($record as $key) { ?>
                                                  
                                        <tbody>
                                            <tr>
                                                <td><?php echo $key['id'];?></td>
                                                <td><?php echo $key['eid'];?></td>
                                                <td><?php echo $key['date'];?></td>
                                                <td><?php echo $key['dname'];?></td>
                                                <td><?php echo $key['chargeofseva'];?></td>
                                               


                              <!--   <td>
                                                        
                                <a href="sevaedit.php?id=<?php echo $key['id']?>" class="btn btn-primary btn-sm">
                                <i class="fa fa-edit"></i></a>        

                                  <a href="app/seva_crud.php?id=<?php echo $key['id']?>" class="btn btn-primary btn-sm">
                                <i class="fa fa-trash"></i></a>                      
                                  <a href="sevaview.php?id=<?php echo $key['id']?>" class="btn btn-primary btn-sm">
                                <i class="fa fa-eye"></i></a>                                    

                                            </td> -->
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
      
