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
                                <h4 class="card-title">Income & Expenses Reports</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
           
               
                                    <form action="incomeexpensereportdetails.php" method="post">

                                      <div class="mb-6">
                                        <div class="row">

                                         <div class="col-md-6">
                                          <label>From Date</label>
                                            <input type="date" class="form-control" name="fromdate" value="" pattern="^[a-z A-Z ]+$" required><br>
                                        </div>

                                         <div class="col-md-6">
                                         <label>To Date</label>
                                            <input type="date" class="form-control" name="todate" value="" pattern="^[a-z A-Z ]+$" required><br>
                                        </div>

                                       
                                         <button style="margin-left: 20px;" class=" btn btn-primary" type="submit" name="submit">Search</button>
                                      


                                          </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
          </div>
      </div>
  </div>
    <?php include('../admin/include/footer.php'); ?>