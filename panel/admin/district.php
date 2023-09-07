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
                                <h4 class="card-title">Districts</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
           
               <?php
$_SESSION["token"]=bin2hex(random_bytes(32));
 ?>
                                    <form action="app/district_crud.php" method="post">
                                    <input type="hidden" name="token" value=<?php echo $_SESSION["token"]; ?>>


<div class="mb-6">
  <div class="row">

   <div class="col-md-6">
    <label>Country Name</label>
     <input type="text" class=" form-control" name="country_name1" data-live-search="true" value="India" readonly>
      
    </div>

                                    
<div class="col-md-6">
 <label>Select State</label>
  <select class="postName1 form-control" style=" width: 375px" name="state1" data-live-search="true" id="state" required >
    <option>None</option>
      <?php               
    $stmt = $conn->prepare("SELECT * FROM `states`");
    $stmt->execute();
    $result = $stmt->fetchAll();
    foreach ($result as $res) {
?>
      <option value="<?php echo $res['id']?>"><?php echo $res['state']?></option>
        <?php } ?>

  </select><br>
                                            
    </div>

<div class="col-md-6">
  <label>District</label>
    <input class="postName1 form-control" name="district" pattern="^[a-z A-Z ]+$"  required><br>
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

<script>
function State(val) {
 
 //   var dataid = $("#country option:selected").attr('data-id');
 
// $('#phonecod').val(dataid);
// $('#phonecod1').val(dataid);
$.ajax({ 

type: "POST",

url: "app/district_crud1.php",

data: "country="+val,
// 
success: function(response){

   //alert("The paragraph was clicked."); 
 $('#state').html(response);

}

});
 
}

</script>