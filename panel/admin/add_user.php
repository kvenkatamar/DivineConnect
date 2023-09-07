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

$stmt = $conn->prepare("SELECT * FROM role WHERE name != 'admin' and delete_status='0'");
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
                
               
                                   <form class="form-horizontal" action="app/user_crud.php" method="post" enctype="multipart/form-data">
                                     <div class="form-row">
                                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
                                                <label for="validationCustom03">First name</label>
                                                 <input type="text" class="form-control " name="fname" value="" required>
                                               <div class="invalid-feedback">
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
                                                <label for="validationCustom04">Last name</label>
                                                 <input type="text" class="form-control" name="lname" value="" required pattern="^[a-zA-Z]+$">
                                                <div class="invalid-feedback">
                                                </div>
                                            </div>
                                            


                                           
                                             <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
                                               <label for="validationCustom02">Email</label>
                                                <input type="text" class="form-control" name="email" value="" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"
>
                                                 <div class="valid-feedback">
                                                </div>
                                            </div>
                                            
                                              <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
                                               <label for="validationCustom02">Password</label>
                                                <input type="password" name="password" class="form-control mb-1" minlength="5" maxlength="15" required data-validation-required-message="Password is required"><div class="valid-feedback">
                                                </div>
                                            </div>


                                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
                                               <label for="validationCustom01">Role</label>
                                                <select type="text" class="form-control" placeholder="" name="role_id"  required=""  value="">
                                       
                                                <?php foreach ($result as $value) { ?>
                                                <option value="<?=$value['id']?>"><?=$value['name']?></option>
                                                               <?php } ?>
                                                                   </select>
                                                  <div class="valid-feedback">
                                                </div>
                                            </div>
                                            
                                        </div>
                                                <br>
                                        <center>
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                                <button class="btn btn-primary" type="submit" name="submit">Submit</button>
                                            </div>
                                          </center>
                                   
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


<?php include("../admin/include/footer.php"); ?>



              