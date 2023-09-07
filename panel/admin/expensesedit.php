<?php 
session_start();
 include '../assets/constant/config.php';
 
 try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $stmt=$conn->prepare("SELECT * FROM `expensess` WHERE id='".$_GET['id']."' ");
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
               
                                    <form action="app/expenses_crud.php" method="post">
                                      <?php
  $stmt=$conn->prepare("SELECT * FROM `expenses` WHERE id='".$_GET['id']."' ");
  $stmt->execute();
  $record=$stmt->fetchAll();

  foreach ($record as $key) { ?>
  
        <input class="form-control" type="hidden" name="id" value="<?php echo $key['id'];?>">
        <input type="hidden" name="token" value=<?php echo $_SESSION["token"]; ?>>

                                      <div class="mb-6">
                                        <div class="row">

                                        <div class="col-md-6">
                                          <label>Expenses Name</label>
                                            <input type="text" class="form-control" placeholder=" " name="ename" value="<?php echo $key['ename'];?>" pattern="^[a-z A-Z ]+$" required>
                                        </div>

                                          <div class="col-md-6">
                                         <label>Date</label>
                                            <input type="date" class="form-control" name="date" value="<?php echo $key['date'];?>" pattern="^[a-z A-Z ]+$" /><br>
                                        </div>

                                         <div class="col-md-6">
                                          <label><b>Trasaction Type</b></label>
                                            <select class="postName1 form-control" name="etransaction"  required>

                                             <option <?php if($key['etransaction']=="cash")
                                             {echo "selected";} ?> value="cash">Cash</option>


                                             <option <?php if($key['etransaction']=="phonpay")
                                             {echo "selected";} ?>value="phonpay">Phonpay</option>


                                             <option <?php if($key['etransaction']=="googlepay"){echo "selected";} ?>value="googlepay">Googlepay</option>
                                             <option><?php if($key['etransaction']=="bank"){echo "selected";}?>Bank</option>
                                           </select>
                                      </div>

                                       

                                           <div class="col-md-6">
                                          <label> Expenses</label>
                                            <input type="text" class="form-control" name="totalexpenses" value="<?php echo $key['totalexpenses'];?>" pattern="^[0-9 ]+$" required><br>
                                        </div>
                                    

                                               <div class="col-12">
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