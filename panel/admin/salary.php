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

<div class="content-body">
           
      <div class="container-fluid">
      <div class="col-xl-12 col-lg-12">
        <div class="card">
          <div class="card-header">
              <h4 class="card-title">Salary</h4>
          </div>
              <div class="card-body">
                <div class="basic-form">
       
               
                    <form action="app/salary_crud.php" method="post">
                   
                        <div class="mb-6">
                          <div class="row">

                            <div class="col-md-6">
                                <label>Select Salary Month</label>
                                <input type="month" class="abc form-control" name="msalary" required>
                            </div>
                             

                            <div class="col-md-6">
                                <label><b>Staff Name</b></label>
                                <select class="postName1 form-control" name="staffname" required>
                                <?php $stmt=$conn->prepare("SELECT * FROM `staff` WHERE delete_status='0' ");
                                     $stmt->execute();
                                     $record=$stmt->fetchAll();

                                      foreach ($record as $res) { ?>
                                        <option></option>
                                        <option value="<?php echo $res['staffname']?>">
                                        <?php echo $res['staffname']; }?>
                                        </option>
                                             
                                </select> 
                            </div>

                                        <div class="col-md-6">
                                          <label><b>Working Days</b></label>
                                            <input type="text" class="form-control" name="days" value="" pattern="^[0-9 ]+$" required><br>
                                          </div>

                                        <div class="col-md-6">
                                          <label><b>Per Day Salary</b></label>
                                            <input type="text" class="form-control" name="bsalary" value="" pattern="^[0-9 ]+$" required><br>
                                          </div>
                                             
                                             
                                             
                                        

                                    

                                      <div class="col-12">
                                       <button style="margin-top: 20px;" class=" btn btn-primary" type="submit" name="submit"><b>Submit</b></button>
                                      </div>


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