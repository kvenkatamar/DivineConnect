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
                                <h4 class="card-title">Seva</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
           <?php
$_SESSION["token"]=bin2hex(random_bytes(32));
 ?>
               
                                    <form action="app/schedule_crud.php" method="post">
                                      <?php
  $stmt=$conn->prepare("SELECT * FROM `schedule` WHERE id='".$_GET['id']."' ");
  $stmt->execute();
  $record=$stmt->fetchAll();

  foreach ($record as $key) { ?>
  
        <input class="form-control" type="hidden" name="id" value="<?php echo $key['id'];?>">
        <input type="hidden" name="token" value=<?php echo $_SESSION["token"]; ?>>


                                      <div class="mb-6">
                                        <div class="row">

                                       <div class="col-md-6">
                                          <label>Devotees Name</label>
                                           <select class="postName form-control" name="dname" pattern="^[a-z A-Z ]+$" />
                                             <?php
                                              $stmt=$conn->prepare("SELECT * FROM `devotees` WHERE delete_status='0' ");
                                             $stmt->execute();
                                             $record=$stmt->fetchAll();

                                             foreach ($record as $res) { ?>
                                              
                                               <option value="<?php echo $res['dname'];?>"
                                                <?php if($res['dname']==$key['dname']) {echo "selected";} ?>>
                                                 <?php echo $res['dname']; }?>
                                               </option>
                                             
                                           </select> 
                                          </div>

                                       

                                         <div class="col-md-6">
                                          <label>Seva Name</label>
                                           <select class="postName form-control" name="sevaname">
                                             <?php
                                              $stmt=$conn->prepare("SELECT * FROM `seva` WHERE delete_status='0' ");
                                             $stmt->execute();
                                             $record=$stmt->fetchAll();

                                             foreach ($record as $res) { ?>
                                              
                                               <option value="<?php echo $res['sevaname'];?>"
                                                <?php if($res['sevaname']==$key['sevaname']) {echo "selected";} ?>>
                                                 <?php echo $res['sevaname']; }?>
                                               </option>
                                             
                                           </select> 
                                          </div>

                                         <?php  
                                         date_default_timezone_set('Asia/Kolkata');
                                           $date=date('Y-m-d h:i:s');
                                         ?>
                                  <div class="col-md-6">
                                     <label>Date & Time</label>
                                        <input type="text" class="form-control" name="date" value="<?php echo $date;?>" > <br>
                                          </div>

                                        
                                    
                                      <div class="col-12">
                                        <button style="margin-left: 15px;" class=" btn btn-primary" type="submit" name="update">Update</button></div>
                                      


                                          </div>
                                        <?php } ?>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
          </div>
    <?php include("../admin/include/footer.php"); ?>