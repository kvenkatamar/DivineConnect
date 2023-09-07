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
                                      





<?php
$stmt = $conn->prepare("SELECT * FROM permissions");
$stmt->execute();
$result = $stmt->fetchAll(); 
?>

<div class="content-body">
           
      <div class="container-fluid">
      <div class="col-xl-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Add Role</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                
               
                                   <form class="form-horizontal" action="app/addrole_crud.php" method="post" enctype="multipart/form-data">
                                        <div class="form-row">

                                     <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
                                            <label for="exampleInputEmail1">Name</label>
                                            <input type="text" class="form-control" placeholder="Enter Name" name="name" required autocomplete="off" >
                                        </div>

                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
                                                <label for="exampleInputEmail1">Description</label>
                                            <input type="text" class="form-control" placeholder="Enter  Description" name="description" required autocomplete="off">
                                        </div>
                                 

 <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
                                                                                     <u>
                                          <h3 style="margin-left: 3%;">Permissions</h3>
                                        </u> 
                                          <h5 style="color:red;">( While selecting any sub roles like add,edit,delete you must require to select Main roles named with Manage Name. )</h5>    
                                          <br>
                                          <br>  
                                  </div>
</div>
         <!-- sidebar content -->
        <div class="row">
          <?php 
            foreach ($result as $row) {
             $id = $row["id"]; 
          ?>
            <div class="checkbox col-md-3">
             <input type="checkbox" id="checkItem" name="checkItem[]" value="<?php echo $id; ?>"> <b><?php echo $row["display_name"]; ?></b>
            </div>
           <?php } ?>
          </div>            <br>
                                        <center>
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                                <button class="btn btn-primary" type="submit" name="submit">Submit</button>
                                            </div>
                                          </center>
                                        </div>
                                    </form>
                                </div>
                            </div>
                    </div>
        </div>
    </div>
</div>

<?php include("../admin/include/footer.php"); ?>



              