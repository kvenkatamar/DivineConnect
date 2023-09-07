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
                                <h4 class="card-title">States</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
           
               <?php
$_SESSION["token"]=bin2hex(random_bytes(32));
 ?>
                                    <form action="app/state_crud.php" method="post">
                                    <input type="hidden" name="token" value=<?php echo $_SESSION["token"]; ?>>


<div class="mb-6">
  <div class="row">

   <div class="col-md-6">
    <label>Select Country</label>
     <select class="postName form-control" name="country_name4" data-live-search="true" id="country" onChange="State(this.value);" required>
        <option value=" ">None</option>
     <?php   
     //echo "SELECT *  FROM `state1`";exit;            
    $stmt = $conn->prepare("SELECT *  FROM `state1`  ");
    $stmt->execute();
    $result = $stmt->fetchAll();
    foreach ($result as $res) { ?>
      <option value="<?php echo $res['id']?>"><?php echo $res['country_name1']?></option>
                                                     <?php } ?>
     </select>
    </div>


<div class="col-md-6">
  <label>Select State</label>
    <select class="postName form-control" name="state3" id="state" onChange="City(this.value);" required>
        
</select><br><br>
                                            
</div>

<div class="col-md-6">
  <label>Select District</label>
    <select class="postName form-control" name="district2" id="city" required>
          
    </select>
</div>

<div class="col-md-6">
  <label>Select Taluka</label>
    <input class="postName form-control" name="taluka1"  required><br>
</div> 

<div class="col-md-6">
  <label>City</label>
    <input class="postName form-control" name="city"  required><br>
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