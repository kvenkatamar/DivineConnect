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

<?php include('include/header.php');?>
<?php include('include/sidebar.php');?>

<div class="content-body">
           
      <div class="container-fluid">
      <div class="col-xl-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Staff Details</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
           
               <?php
$_SESSION["token"]=bin2hex(random_bytes(32));
 ?>
                                    <form action="app/staff_crud.php" method="post">
                                    <input type="hidden" name="token" value=<?php echo $_SESSION["token"]; ?>>

                                      <?php 
                                        $stmt=$conn->prepare("SELECT * FROM `staff` where id=(select max(id) from staff)");
                                        $stmt->execute();
                                        $record=$stmt->fetchAll();
                                        foreach ($record as $key) {
                                          
                                        }
                                        $n=$key['id']+1;
                                        $L='EID-';
                                        $eid=$L." ".$n;
                                       ?>

                                     <div class="row">
                                       <div class="col-md-6">
                                          <label> Staff ID</label>
                                            <input type="text" class="form-control" name="eid" value="<?php echo $eid; ?>" readonly=" ">
                                        </div>

                                        <div class="col-md-6">
                                          <label> Staff Name</label>
                                            <input type="text" class="form-control" placeholder=" " name="staffname" value="" pattern="^[a-z A-Z ]+$" required>
                                        </div>

                                        <div class="col-md-6">
                                          <label>Phone No.</label>
                                            <input type="text" class="form-control" name="phone" value="" pattern="^[0-9 ]+$" required>
                                          </div>

                                        <div class="col-md-6">
                                          <label>Adharcard No.</label>
                                            <input type="text" class="form-control" name="adhar" value="" pattern="^[0-9 ]+$" required>
                                          </div>

                                         <div class="col-md-6">
                                          <label>Date of Birth</label>
                                            <input type="date" class="form-control" name="bdate" value="" required>
                                          </div>

                                          <div class="col-md-6">
                                          <p>Gender</p>
                                            <input type="radio" name="gender" value="female">
                                            <label for="female">Female</label>
                                            <input type="radio" name="gender" value="male">
                                            <label for="female">Male</label>
                                            </div>


                                        <div class="col-md-6">
                                          <label>Address</label>
                                            <input type="text" class="form-control" name="address"  pattern="^[a-z A-Z 0-9 ]+$" required><br>
                                          </div>

                                        

                                        <div class="col-md-12">
                                        <button class=" btn btn-primary" type="submit" name="submit">Submit</button>
                                        </div>
                                      


                                       
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

          </div>
        </div>
      </div>

      <!-----CKEDITOR------>
      <script src="//cdn.ckeditor.com/4.19.1/basic/ckeditor.js"></script>

     <script>CKEDITOR.replace('editor')</script>
     <script href="../ckeditor/ckeditor.js"></script>
      
    <?php include("../admin/include/footer.php"); ?>