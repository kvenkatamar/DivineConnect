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
                               
                                <div class="row">
                                
                                 <div class="table-responsive">
                                   <table id="datatables">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                               
                                                <th>Date</th>
                                                <th>Devotees Name</th>
                                                <th>Seva Name</th>
                                                <th>Pass</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>


                                             
                                        <tbody>
                                            <?php 
    $stmt = $conn->prepare("SELECT * FROM `pass1` WHERE delete_status='0' ");
    $stmt->execute();
    $record = $stmt->fetchAll();
    $i=1;
    foreach ($record as $key) { 


  
   
    //echo"SELECT * FROM `seva` WHERE id='".$key['sevaname']."' ";exit;
    $stmt3 = $conn->prepare("SELECT * FROM `seva` WHERE id='".$key['sevaname']."' ");
    $stmt3->execute();
                                                
    $seva1 = $stmt3->fetch(PDO::FETCH_ASSOC);

    
  

        
    ?>
                                            <tr>
                                                <td><?php echo $i;?></td>
                                                
                                                <td><?php echo $key['date'];?></td>
                                                <td><?php echo $key['dname'];?></td>
                                                <td><?php echo $seva1['sevaname'];?></td>
                                                <td><a href="passpdf.php?id=<?php echo $key['id']?>">View Pass</a></td>

                                <td>
                                                        
                                 
     

                                <a href="app/pass_crud.php?id=<?php echo $key['id']?>" class="btn btn-danger btn-sm">
                                <i class="fa fa-trash"></i></a> 
                                                     
                                
                                            </td>
                                            </tr>


                                            <?php $i++; } ?>
                                     
                                            

                                        </tbody>

                                  </table>
                                  <!--  <div class="card-body">
                                <a href="pdf.php" class="btn btn-primary mb-3">Generate PDF</a>
                              
                              </div> -->
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
                window.location = "passtable.php";
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
                window.location = "passtable.php";
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
                window.location = "passtable.php";
            }, 1000);
        });
        </script>   
        <p><?php $_SESSION['delete']='';}?></p>
      

    <?php include('../admin/include/footer.php'); ?>