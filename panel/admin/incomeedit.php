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
                                <h4 class="card-title">Income</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
           
               <?php
$_SESSION["token"]=bin2hex(random_bytes(32));
 ?>
  <form action="app/income_crud.php" method="post">
<?php
  //echo "SELECT * FROM `income` WHERE id='".$_GET['id']."' ";exit;
  $stmt=$conn->prepare("SELECT * FROM `income` WHERE id='".$_GET['id']."' ");
  //print_r($stmt);exit;
  $stmt->execute();

  $record=$stmt->fetchAll();
  //print_r($record);exit;


  foreach ($record as $key) 
  {
    //print_r($key);exit;

   
 ?>
  
        <input class="form-control" type="hidden" name="id" value="<?php echo $key['id'];?>">
        <input type="hidden" name="token" value=<?php echo $_SESSION["token"]; ?>>

                                      <div class="mb-6">
                                        <div class="row">


                                            <div class="col-md-6">
                                          <label><b>Receipt No.</b></label>
                                            <input type="text" class="form-control" name="eid" value="<?php echo $key['eid'];?>" readonly=" "><br>
                                        </div>

                                       <div class="col-md-6">
                                          <label>Date</label>
                                            <input type="date" class="form-control" name="date" value="<?php echo $key['date'];?>" required>
                                          </div>

                                        <div class="col-md-6">
                                          <label>Devotees Name</label>
                                           <select class="postName form-control" name="dname"  pattern="^[a-z A-Z ]+$">
                                            
                                             <?php
                                              $stmt=$conn->prepare("SELECT * FROM `devotees` WHERE delete_status='0' ");
                                             $stmt->execute();
                                             $record=$stmt->fetchAll();

                                             foreach ($record as $res) { ?>
                                              
                          <option value="<?php echo $res['id'];?>" 
                            <?php if($res['dname']==$key['dname']) {echo "selected";} ?>>
                                  <?php echo $res['dname']; }?>
                                               </option>
                                             
                                           </select> 
                                          </div>

                                         <div class="col-md-6">
                                          <label>Mobile No.</label>
                                            <input type="text" class="form-control" name="mobile_no" value="<?php echo $key['mobile_no'];?>" pattern="^[0][1-9]\d{9}$|^[1-9]\d{9}$" required><br>
                                      </div>

                                        <div class="col-md-6">
                                          <label>Resident Address</label>
                                            <input type="text" class="form-control" name="raddress" value="<?php echo $key['raddress'];?>" pattern="^[a-z A-Z 0-9 ]+$" required><br>
                                      </div>

                                       <div class="col-md-6">
                                          <label>Trasaction Type</label>
                                           <select class="postName form-control" name="transaction" value="<?php echo $key['transaction'];?>" required>

                                               

                                             <option <?php if($key['transaction']=="cash")
                                             {echo "selected";} ?> value="cash" >Cash</option>


                                             <option <?php if($key['transaction']=="phonpay")
                                             {echo "selected";} ?> value="phonpay">Phonpay</option>


                                             <option <?php if($key['transaction']=="googlepay"){echo "selected";} ?> value="googlepay">Googlepay</option>
                                             
                                             <option <?php if($key['transaction']=="bank"){echo "selected";}?> value="bank">Bank</option>
                                           </select>
                                      </div>

       
                                      

                                      <div class="col-md-6">
                                          <label>Donation Type</label>
                                           <select class="postName form-control" name="donation" pattern="^[a-z A-Z ]+$" >
                                             <option <?php if($key['donation']=="annaulincome"){echo "selected";} ?>value="annaulincome">Annual Pooja Income</option>

                                             <option <?php if($key['donation']=="sevaincome"){echo "selected";}?>value="sevaincome">Seva Income</option>

                                             <option <?php if($key['donation']=="poojaincome"){echo "selected";}?>value="poojaincome"> Pooja Income</option>

                                             <option <?php if($key['donation']=="prasadamincome"){echo "selected";} ?> value="prasadamincome">Prasadam Income</option>
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
        </div>
      </div>


    <?php include('../admin/include/footer.php'); ?>

    