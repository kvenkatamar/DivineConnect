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
                                <h4 class="card-title">Schedule of Seva</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
           
               <?php
$_SESSION["token"]=bin2hex(random_bytes(32));
 ?>
                                    <form action="app/schedule_crud.php" method="post">
                                    <input type="hidden" name="token" value=<?php echo $_SESSION["token"]; ?>>


                                      <div class="mb-6">
                                        <div class="row">

                                         <div class="col-md-6">
                                          <label>Devotees Name</label>
                                           <select class="postName form-control" name="dname" required>
                                             <option value="">Select Devotees Name</option>
                                             <?php $stmt=$conn->prepare("SELECT * FROM `devotees` WHERE delete_status='0' ");
                                             $stmt->execute();
                                             $record=$stmt->fetchAll();

                                             foreach ($record as $res) { ?>
                                              
                                               <option value="<?php echo $res['dname']?>">
                                                 <?php echo $res['dname']; }?>
                                               </option>
                                             </select>
                                          </div>

                                    
                                         <div class="col-md-6">
                                          <label>Seva Name</label>
                                           <select class="postName form-control" name="sevaname" required>
                                            <option value="">Select Seva Name</option>
                                             <?php $stmt=$conn->prepare("SELECT * FROM `seva` WHERE delete_status='0' ");
                                             $stmt->execute();
                                             $record=$stmt->fetchAll();

                                             foreach ($record as $res) { ?>
                                               
                                               <option value="<?php echo $res['sevaname']?>">
                                                 <?php echo $res['sevaname']; }?>
                                               </option>
                                             </select>
                                          </div>

                                      

                                        
                            <div class="col-md-6">
                                <label>Date</label>
                                    <input type="date" class="form-control" name="date" required> <br>
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