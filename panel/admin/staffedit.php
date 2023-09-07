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
                                <h4 class="card-title">Details</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
           <?php
$_SESSION["token"]=bin2hex(random_bytes(32));
 ?>
               
                                    <form action="app/staff_crud.php" method="post">
                                      <?php
                                          $stmt=$conn->prepare("SELECT * FROM `staff` WHERE id='".$_GET['id']."' ");
                                          $stmt->execute();
                                          $record=$stmt->fetchAll();

                                          foreach ($record as $key) { ?>
  
        <input class="form-control" type="hidden" name="id" value="<?php echo $key['id'];?>">
        <input type="hidden" name="token" value=<?php echo $_SESSION["token"]; ?>>


                                      <div class="mb-6">
                                        <div class="row">

                                        <div class="col-md-6">
                                          <label>Staff Name</label>
                                            <input type="text" class="form-control" placeholder=" " name="staffname" value="<?php echo $key['staffname'];?>" pattern="^[a-z A-Z ]+$" required>
                                        </div>

                                        <div class="col-md-6">
                                          <label>Phone No.</label>
                                            <input type="text" class="form-control" name="phone" value="<?php echo $key['phone'];?>" pattern="^[0][1-9]\d{9}$|^[1-9]\d{9}$" required><br>
                                          </div>

                                        <div class="col-md-6">
                                          <label>Adharcard No.</label>
                                            <input type="text" class="form-control" name="adhar" value="<?php echo $key['adhar'];?>" pattern="^[0-9 ]+$" required><br>
                                          </div>

                                        <div class="col-md-6">
                                          <label>Date of Birth</label>
                                            <input type="text" class="form-control" name="bdate" value="<?php echo $key['bdate'];?>" required><br>
                                      </div>

                                     

                                      <div class="col-md-6">
                                          <label>Address</label>
                                            <input type="text" class="form-control" name="address" value="<?php echo $key['address'];?>" pattern="^[a-z A-Z 0-9 ]+$" required><br>
                                      </div>

 <div class="col-md-6">
   <p>Gender</p>
    <input type="radio" name="gender" <?php if($key['gender']=="female") 
    {echo "selected";} ?>value="female" >
    <label for="female">Female</label>
    <input type="radio" name="gender" <?php if($key['gender']=="male")
    {echo "selected";} ?> value="male">
    <label for="female">Male</label>

</div>
                               <!--    <label><b>Status</b></label>
                                        <select class="form-control" name="status">
                                        <option <?php if($key['status']=="pending")
                                        {echo "selected";} ?> value="pending">Pending</option>
                                        <option <?php if($key['status']=="closed")
                                        {echo "selected";} ?> value="closed">Closed</option> -->
                                    
                                    
                                                
                                               <div class="col-md-12">
                                              <button class=" btn btn-primary" type="submit" name="update">Edit</button>
                                      


                                          </div>
                                        <?php } ?>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
          </div>
    <?php include('../admin/include/footer.php'); ?>