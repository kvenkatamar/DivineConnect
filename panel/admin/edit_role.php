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
      
 include("../admin/include/header.php");
 include("../admin/include/sidebar.php");
    //echo "SELECT * FROM groups WHERE id='".$_GET['id']."'";exit;                                 
$stmt = $conn->prepare("SELECT * FROM groups WHERE id='".$_GET['id']."'");
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);

$stmt = $conn->prepare("SELECT * FROM permissions");
$stmt->execute();
$permissions = $stmt->fetchAll(); 

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
                                     <input type="hidden" name="id" value="<?=$_GET['id']?>">
                                                                         <div class="form-row">

                                     <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
                                                   <label for="exampleInputEmail1">Name</label>
                                            <input type="text" class="form-control" placeholder="Enter Name" value="<?php echo $result['name'];?>" name="name" required autocomplete="off" >
                                        </div>

                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
                                                <label for="exampleInputEmail1">Description</label>
                                            <input type="text" class="form-control" placeholder="Enter  Description" value="<?php echo $result['description'];?>" name="description" required autocomplete="off">
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
         <div class="row">
           <?php 
             foreach ($permissions as $row) {
             //echo $id;exit; 
                $id = $row["id"]; 
//echo $id;exit; 
                                          ?>
                <div class="checkbox col-md-3">
                          <label>
                          <input type="checkbox" id="checkItem" name="checkItem[]" value="<?php echo $id; ?>"
                          <?php
                      // echo "select * from permission_role where group_id='".$_GET['id']."' AND permission_id='$id'";exit;
                          $stmt = $conn->prepare("select * from permission_role where group_id='".$_GET['id']."' AND permission_id='$id'");
                        $stmt->execute();
                        $row1 = $stmt->fetch(PDO::FETCH_ASSOC);

                         if($id == $row1['permission_id']){
                          echo "checked";
                         } ?>>
                         <b><?php echo $row["display_name"]; ?></b>
                 </div>

        <?php } ?>
         <br>
                      <br>
                     
          </div>

          
          <br>
          <br>
          <br>

                                        <center>
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                                <button class="btn btn-primary" type="submit" name="btn_edit">Update</button>
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



              