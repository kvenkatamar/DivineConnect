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
//echo "SELECT * FROM groups WHERE name != 'admin' and delete_status='0'";exit;
$stmt = $conn->prepare("SELECT * FROM admin WHERE id='".$_GET['id']."'");
$stmt->execute();

$product_group = $stmt->fetch(PDO::FETCH_ASSOC);


$stmt = $conn->prepare("SELECT * FROM groups WHERE name != 'admin' and delete_status='0'");
$stmt->execute();
$groups = $stmt->fetchAll(); 
                                      
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
                
               
                                   <form class="form-horizontal" action="app/user_crud.php" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="id" value="<?=$_GET['id']?>">
                                     <div class="form-row">
                                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
                                                <label for="validationCustom03">First name</label>
                                                
                                                 <input type="text" class="form-control " name="fname" value="<?=$product_group['fname'];?>" required pattern="^[a-zA-Z]+$">
                                               <div class="invalid-feedback">
                                                </div>
                                            </div>


                                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
                                                <label for="validationCustom04">Last name</label>
                                                 <input type="text" class="form-control" name="lname" value="<?=$product_group['lname'];?>" required pattern="^[a-zA-Z]+$">
                                                <div class="invalid-feedback">
                                                </div>
                                            </div>
                                            


                                           
                                             <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
                                               <label for="validationCustom02">Email</label>
                                                <input type="text" class="form-control" name="email" value="<?=$product_group['email'];?>"required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"
>
                                                 <div class="valid-feedback">
                                                </div>
                                            </div>
                                            
                                
                                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
                                               <label for="validationCustom01">Role</label>
         <select type="text" class="form-control" placeholder="" name="role_id"  required=""  value="">
                                       
 <?php foreach ($groups as $value) { ?>
                 <option value="<?=$value['id']?>" 
                    <?php if($product_group['role_id']==$value['id'])
                    { echo "selected"; }?>><?=$value['name']?></option>
                    <?php } ?>
                                                           </select>
                                                  <div class="valid-feedback">
                                                </div>
                                            </div>
                                            
                                        
                                                <br><br><br>
                                        <center>
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                                <button class="btn btn-primary" type="submit" name="btn_edit">Submit</button>
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



              