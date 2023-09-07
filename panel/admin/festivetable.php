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
                                <a href="festive.php" class="btn btn-primary mb-3" >Add</a>
                                <div class="row">
                                
                                 <div class="table-responsive">
                                 <table class="table table-responsive-sm">
                                  
                                     <table id="datatables">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                
                                                <th>Festival Name</th>
                                                <th>Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        
                                                  
                                        <tbody>
                                            <?php 
                                            $stmt = $conn->prepare("SELECT * FROM `festive` WHERE delete_status='0' ");
                                                $stmt->execute();
                                                $record = $stmt->fetchAll();
                                                $i=1;
                                                foreach ($record as $key) { ?>
                                            <tr>
                                                <td><?php echo $i;?></td>
                                                <td><?php echo $key['festival'];?></td>
                                                <td><?php echo $key['date1'];?></td>

                                <td>
                                                        
                                <a href="festiveedit.php?id=<?php echo $key['id']?>" class="btn btn-primary btn-sm">
                                <i class="fa fa-edit"></i></a> 

                              <!--   <a href="sevaview.php?id=<?php echo $key['id']?>" class="btn btn-secondary btn-sm">
                                <i class="fa fa-eye"></i></a> 
                                 -->
                                  <a href="app/festive_crud.php?id=<?php echo $key['id']?>" class="btn btn-danger btn-sm">
                                <i class="fa fa-trash"></i></a>                      
                                                                     

                                            </td>
                                            </tr>


                                            <?php $i++; } ?>
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
                window.location = "festivetable.php";
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
                window.location = "festivetable.php";
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
                window.location = "festivetable.php";
            }, 1000);
        });
        </script>   
        <p><?php $_SESSION['delete']='';}?></p>
      

    <?php include('../admin/include/footer.php'); ?>