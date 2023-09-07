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
                            
                            <div class="card-body">
                                <a href="taluka.php" class="btn btn-primary mb-3" >Add</a>
                                <div class="row">
                                
                                 <div class="table-responsive">
                                 <table id="datatables" class="table table-responsive-sm">
                                  
                                     
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                            
                                                <th>State</th>
                                                <th>District</th>
                                                <th>Taluka</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                       
                                        <tbody>
<?php 
 $stmt = $conn->prepare("SELECT * FROM `taluka` WHERE delete_status='0' ");
 $stmt->execute();
 $record = $stmt->fetchAll();
 $i=1;
 foreach ($record as $key) {

    //echo "SELECT * FROM `states` WHERE id='".$key['state2']."' ";exit;
     $stmt2 = $conn->prepare("SELECT * FROM `states` WHERE id='".$key['state2']."' ");
    $stmt2->execute();
    $record2 = $stmt2->fetchAll();
                                                
    foreach ($record2 as $key2) {

    //echo "SELECT * FROM `district` WHERE id='".$key['district1']."' ";exit;
    $stmt3 = $conn->prepare("SELECT * FROM `district` WHERE id='".$key['district1']."' ");
    $stmt3->execute();
    $record3 = $stmt3->fetchAll();
                                                
    foreach ($record3 as $key3) {
 


    ?>
                                                  
                                            <tr>
                                                <td><?php echo $i;?></td>
                                               
                                                <td><?php echo $key2['state'];?></td>
                                                <td><?php echo $key3['district'];?></td>
                                                <td><?php echo $key['taluka'];?></td>
                                              
                                <td>
                                                        
                                <a href="talukaedit.php?id=<?php echo $key['id']?>" class="btn btn-primary btn-sm">
                                <i class="fa fa-edit"></i></a> 

                            
                                  <a href="app/taluka_crud.php?id=<?php echo $key['id']?>" class="btn btn-danger btn-sm">
                                <i class="fa fa-trash"></i></a>                      
                                                                     

                                            </td>
                                            </tr>


                                            <?php $i++; } } } ?>
                                        </tbody>
                                  </table>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>

      <?php if(!empty($_SESSION['success'])){?>
        <script>
        setTimeout(function() {
            swal({
                title: "Congratulaions!",
                text: "Data Added Successfully",
                type: "success",
                confirmButtonText: "Ok"
            }, function() {
                window.location = "talukatable.php";
            }, 1000);
        });
        </script>   
        <p><?php $_SESSION['success']='';}?></p>




        <?php if(!empty($_SESSION['update'])){?>
        <script>
        setTimeout(function() {
            swal({
                title: "Congratulaions!",
                text: "Record Updated",
                type: "success",
                confirmButtonText: "Ok"
            }, function() {
                window.location = "talukatable.php";
            }, 1000);
        });
        </script>   
        <p><?php $_SESSION['update']='';}?></p>


<?php if(!empty($_SESSION['delete'])){?>
        <script>
        setTimeout(function() {
            swal({
                title: "Congratulaions!",
                text: "Record Deleted",
                type: "success",
                confirmButtonText: "Ok"
            }, function() {
                window.location = "talukatable.php";
            }, 1000);
        });
        </script>   
        <p><?php $_SESSION['delete']='';}?></p>
      

    <?php include('../admin/include/footer.php'); ?>