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
                                <a href="staff.php" class="btn btn-primary mb-3">Add</a>
                                <div class="row">
                                
                                 <div class="table-responsive">
                                    <table class="table table-responsive-sm">
                                         <table id="datatables">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Staff Name</th>
                                                <th>Adharcard No.</th>
                                                <th>Address</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                            <?php 
                                            $stmt = $conn->prepare("SELECT * FROM `staff` WHERE delete_status='0' ");
                                                $stmt->execute();
                                                $record = $stmt->fetchAll();
                                                $i=1;
                                                foreach ($record as $key) { ?>
                                                  
                                            <tr>
                                                <td><?php echo $i;?></td>
                                                <td><?php echo $key['staffname'];?></td>
                                                <td><?php echo $key['adhar'];?></td>
                                                <td><?php echo $key['address'];?></td>
                                          

                                <td>
                                                        
                                <a href="staffedit.php?id=<?php echo $key['id']?>" class="btn btn-primary btn-sm">
                                <i class="fa fa-edit"></i></a>        

                                            
                                  <a href="staffview.php?id=<?php echo $key['id']?>" class="btn btn-secondary btn-sm">
                                <i class="fa fa-eye"></i></a>  

                                <a href="https://api.whatsapp.com/send?phone=<?php echo $key['phone'];?>&text=welcome%20" class="btn btn-success btn-sm" target="blank"><i class="mdi mdi-whatsapp"></i></a>

                                 <a href="app/staff_crud.php?id=<?php echo $key['id']?>" class="btn btn-danger btn-sm">
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
                window.location = "stafftable.php";
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
                window.location = "stafftable.php";
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
                window.location = "stafftable.php";
            }, 1000);
        });
        </script>   
        <p><?php $_SESSION['delete']='';}?></p>
      

    <?php include('../admin/include/footer.php'); ?>