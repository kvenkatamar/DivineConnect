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
                                <h4 class="card-title">Salary</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
           
             
                                    <form action="app/salary_crud.php" method="POST">
                                      <?php
                                          $stmt=$conn->prepare("SELECT * FROM `salary` WHERE id='".$_GET['id']."' ");
                                         // print_r($stmt); exit;
                                          $stmt->execute();
                                          $record=$stmt->fetchAll();

                                          foreach ($record as $key) { ?>
  
        <input class="form-control" type="hidden" name="id" value="<?php echo $key['id'];?>">
        
                                      <div class="mb-6">
                                        <div class="row">

                              <div class="col-md-6">
                                <label><b>Select Salary Month</b></label>
                                  <input type="month" class="abc form-control" name="msalary" value="<?php echo $key['msalary'];?>"><br>
                                  
                              </div>

                                         <div class="col-md-6">
                                          <label>Staff Name</label>
                                             <select class="postName1 form-control" name="staffname">
                                             <?php
                                              $stmt=$conn->prepare("SELECT * FROM `staff` WHERE delete_status='0' ");
                                             $stmt->execute();
                                             $record=$stmt->fetchAll();

                                             foreach ($record as $res) { ?>
                                              
                                               <option value="<?php echo $res['staffname'];?>"
                                                <?php if($res['staffname']==$key['staffname']) {echo "selected";} ?>>
                                                 <?php echo $res['staffname']; }?>
                                               </option>
                                             
                                           </select> 
                                        </div>

                                        
                                           
                                         

                                     

                                        <div class="col-12">
                                         <button style="margin-top: 20px;" class=" btn btn-primary" type="submit" name="update">Update</button>
                                       </div>
                                      


                                          </div>
                                        <?php } ?>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
          </div>

    <?php include('../admin/include/footer.php'); ?>
 