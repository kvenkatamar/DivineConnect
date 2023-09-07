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
                               <a href="add_role.php" class="btn btn-primary mb-3">Add Role</a>
                            </div>
                            <div class="card-body">
                                
                                <div class="row">
                                
                                 <div class="table-responsive">
                                    <table class="table table-responsive-sm">
                                        <table id="datatables">
                                        <thead>
                                            <tr>
                                                <th>Sr.No.</th>
                                                <th>Role Name</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <?php 
  $sql = "SELECT * FROM groups where delete_status='0'";
 
                
 $statement = $conn->prepare($sql);
 $statement->execute();
                                                             
                                                                
     while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
 
        extract($row);
                                                                 
 
 
                                                            ?>
                                                  
                                    <tbody>
                                       <tr>
                                           <td><?= $id; ?></td>
                                            <td><?= $name; ?></td>
                                            
                                               

                                <td>
                                                        
                                <a href="edit_role.php?id=<?=$id ;?>" class="btn btn-primary btn-sm">
                                <i class="fa fa-edit"></i></a>        

                                                  
                                  

                                 <a href="app/addrole_crud.php?id=<?=$id ;?>" class="btn btn-danger btn-sm">
                                <i class="fa fa-trash"></i></a>                                        

                                            </td>
                                            </tr>


                                            <?php  } ?>
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
                window.location = "view_role.php";
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
                window.location = "view_role.php";
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
                window.location = "view_role.php";
            }, 1000);
        });
        </script>   
        <p><?php $_SESSION['delete']='';}?></p>
      

    <?php include('../admin/include/footer.php'); ?>