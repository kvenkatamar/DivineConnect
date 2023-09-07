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
                                <h4 class="card-title">States</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
           <?php
$_SESSION["token"]=bin2hex(random_bytes(32));
 ?>
               
                                    <form action="app/state_crud.php" method="post">
                                      <?php
  $stmt=$conn->prepare("SELECT * FROM `state1` WHERE id='".$_GET['id']."' ");
  $stmt->execute();
  $record=$stmt->fetchAll();

  foreach ($record as $key) {

 

   ?>
  
        <input class="form-control" type="hidden" name="id" value="<?php echo $key['id'];?>">
        <input type="hidden" name="token" value=<?php echo $_SESSION["token"]; ?>>


                                      <div class="mb-6">
                                        <div class="row">

<div class="col-md-6">
  <label>Select Country</label>
    <select class="postName form-control" name="country_name1" value="<?php echo $key['country_name1'];?>" data-live-search="true" required>
      <option <?php if($key['country_name1']=="India")
      {echo "selected";}?> value="India" >India</option>

      <option <?php if($key['country_name1']=="China")
      {echo "selected";}?> value="China" >China</option>
     </select>
                                             

  
  </select>
            </div>

<div class="col-md-6">
  <label>Select State</label>
  <input class="postName form-control" name="state" value="<?php echo $key['state'];?>" required><br>
</div>

<div class="col-md-6">
  <label>Select District</label>
  <input class="postName form-control" name="state" value="<?php echo $key['state'];?>" required><br>
</div>

<div class="col-md-6">
  <label>Select Taluka</label>
  <input class="postName form-control" name="state" value="<?php echo $key['state'];?>" required><br>
</div>

<div class="col-md-6">
  <label>City</label>
  <input class="postName form-control" name="state" value="<?php echo $key['state'];?>" required><br>
</div>
                                          

<div class="col-12">
  <button style="margin-left: 15px;" class=" btn btn-primary" type="submit" name="update">Update</button>
</div>
                                      


                                       
                                        <?php } ?>
                                        </div>
                                    </div>
                                    </form>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>


      

    <?php include("../admin/include/footer.php"); ?>