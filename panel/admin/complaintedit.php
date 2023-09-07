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
                                <h4 class="card-title">Complaints</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
           
               <?php
                  $_SESSION["token"]=bin2hex(random_bytes(32));
                ?>
                                    <form action="app/complaint_crud.php" method="post" enctype="multipart/form-data">
                                      <?php
                                          $stmt=$conn->prepare("SELECT * FROM `complaints` WHERE id='".$_GET['id']."' ");
                                          $stmt->execute();
                                          $record=$stmt->fetchAll();

                                          foreach ($record as $key) { ?>
  
        <input class="form-control" type="hidden" name="id" value="<?php echo $key['id'];?>">
        <input type="hidden" name="token" value=<?php echo $_SESSION["token"]; ?>>

                                      <div class="mb-6">
                                        <div class="row">

                                          <div class="col-md-6">
                                          <label>Complaint Id</label>
                                            <input type="text" class="form-control" placeholder=" " name="cid" value="<?php echo $key['cid'];?>" >
                                        </div>

                                         <div class="col-md-6">
                                          <label>Full Name</label>
                                            <input type="text" class="form-control" placeholder=" " name="name" value="<?php echo $key['name'];?>" required>
                                        </div>

                                          <div class="col-md-6">
                                          <label>Email</label>
                                            <input type="email" class="form-control" name="email" value="<?php echo $key['email'];?>" required  > 
                                          </div>
                                          
                                        <div class="col-md-6">
                                          <label>Complaint Subject</label>
                                            <input type="text" class="form-control" name="csubject" value="<?php echo $key['csubject'];?>" required>
                                          </div>

                                        <div class="col-md-6">
                                          <label>Date</label>
                                            <input type="date" class="form-control" name="date" value="<?php echo $key['date'];?>" required><br>
                                          </div>

                                          <div class="col-md-6">
                                          <label>Mobile NO</label>
                                            <input type="text" class="form-control" name="mobileno" value="<?php echo $key['mobileno'];?>" required ><br>
                                          </div>

                                          <div class="col-md-6">
                                          <label>Document</label>
                                           <input type="hidden"  value="<?php echo $key['document']?>" name="old_cat_img" required>
                                           <input class="form-control" type="file" name="document" accept=".jpg,.jpeg,.png">
                                           <img class="img-fluid" src="../assets/images/<?php echo $key['document']?>" style="width:100px;height:auto;"><br><br>
                                          </div>

                                             <div class="col-md-6">
                                        <label><b>Status</b></label>
                                        <select class="form-control" name="status">
                                        <option <?php if($key['status']=="pending")
                                        {echo "selected";} ?> value="pending">Pending</option>
                                        <option <?php if($key['status']=="closed")
                                        {echo "selected";} ?> value="closed">Closed</option>

                                        </select>
                                      </div>

                                       <div class="col-12">
                                         <button class=" btn btn-primary" type="submit" name="update">Update</button>
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