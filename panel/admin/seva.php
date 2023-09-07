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
<?php include("../admin./include/header.php");?>
<?php include("../admin/include/sidebar.php");?>

<div class="content-body">
           
      <div class="container-fluid">
      <div class="col-xl-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Seva Module</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
           
               <?php
$_SESSION["token"]=bin2hex(random_bytes(32));
 ?>
                                    <form action="app/seva_crud.php" method="post">
                                    <input type="hidden" name="token" value=<?php echo $_SESSION["token"]; ?>>


                                      <div class="mb-6">
                                        <div class="row">

                                        <div class="col-md-6">
                                          <label>Seva Name</label>
                                            <input type="text" class="form-control" placeholder=" " name="sevaname" value="" pattern="^[a-z A-Z ]+$" required>
                                        </div>

                                    
                                        <div class="col-md-6">
                                          <label>Charge of Seva</label>
                                            <input type="text" class="form-control" name="chargeofseva" value="" pattern="^[0-9 ]+$" required>
                                          </div>

                                        <div class="col-md-6">
                                          <label>No. of Person</label>
                                            <input type="text" class="form-control" name="nperson" value="" pattern="^[0-9 ]+$" required><br>
                                          </div>

                                    
                                              <div class="col-12">
                                              <button style="margin-left: 15px;" class=" btn btn-primary" type="submit" name="submit">Submit</button>
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
      
    <?php include('include/footer.php'); ?>









    