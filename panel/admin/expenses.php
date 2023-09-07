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
                                <h4 class="card-title">Expense</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                              
                              <?php
$_SESSION["token"]=bin2hex(random_bytes(32));
 ?>
               
                                    <form action="app/expenses_crud.php" method="post">
                                      <input type="hidden" name="token" value=<?php echo $_SESSION["token"]; ?>>

                                      <div class="mb-6">
                                        <div class="row">

                                         <div class="col-md-6">
                                          <label>Expenses Type Name</label>
                                            <input type="text" class="form-control" name="ename" value="" pattern="^[a-z A-Z ]+$" required><br>
                                        </div>

                                         <div class="col-md-6">
                                         <label>Date</label>
                                            <input type="date" class="form-control" name="date" value="<?php echo date('Y-m-d');?>" pattern="^[a-z A-Z ]+$" required><br>
                                        </div>

                                        <div class="col-md-6">
                                          <label><b>Trasaction Type</b></label>
                                           <select class="postName1 form-control" name="etransaction" pattern="^[a-z A-Z ]+$" required>
                                            <option value="">None</option>
                                             <option value="cash">Cash</option>
                                             <option value="phonpay">Phonpay</option>
                                             <option value="googlepay">Googlepay</option>
                                             <option value="bank">Bank</option>
                                           </select>
                                      </div>

                                        <div class="col-md-6">
                                          <label>Amount</label>
                                            <input type="totalexpenses" class="form-control" name="totalexpenses" value="" pattern="^[0-9 ]+$" required><br>
                                        </div>
                                    
                                    
                                         <button style="margin-left: 20px;" class=" btn btn-primary" type="submit" name="submit">Submit</button>
                                      


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