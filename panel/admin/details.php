<?php 
//session_start();
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

 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


<div class="content-body">
           
      <div class="container-fluid">
      <div class="col-xl-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Manage Details of Devotees</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                  <?php
$_SESSION["token"]=bin2hex(random_bytes(32));
 ?> 
               
                                    <form action="app/details_crud.php" method="post">
                                     <input type="hidden" name="token" value=<?php echo $_SESSION["token"]; ?>>

                                      <div class="mb-6">
                                        <div class="row">


                                        <div class="col-md-6"> 
                                       <label>Devotees Name</label>
                                            <select class="postName form-control" name="dname" required>
                                                 <option>select</option>
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
                                          <label>Religion</label>
                                            <input type="text" class="form-control" name="religion" value="" pattern="^[a-z A-Z ]+$" required><br>
                                        </div>

<div class="col-md-6">
 <label>Country</label>
   <select type="text" class="form-control" name="country1" value="" data-live-search="true" id="country1" onChange="State(this.value);" required><br>
<?php               
    $stmt = $conn->prepare("SELECT * FROM `country`");
        $stmt->execute();
        $result = $stmt->fetchAll();
         foreach ($result as $res) { ?>
         <option value="<?php echo $res['id']?>"><?php echo $res['country_name']?></option>
                                                     <?php } ?>
                                                        </select>
                                        </div>

                                         <div class="col-md-6">
                                          <label>States</label>
                                           <select class="form-control" style=" width: 375px" name="state1" data-live-search="true" id="state" onChange="City(this.value);" required>
                                            </select><br>
                                        </div>

                                         <div class="col-md-6">
                                          <label>City</label>
                                             <select class="form-control" style=" width: 375px" name="city" data-live-search="true" id="city" required >
                                           </select> <br>
                                        </div>
   
                                        <div class="col-12">
                                         <button class=" btn btn-primary" type="submit" name="submit">Submit</button>
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

<script>
function State(val) {
 
 //   var dataid = $("#country option:selected").attr('data-id');
 
// $('#phonecod').val(dataid);
// $('#phonecod1').val(dataid);
$.ajax({ 

type: "POST",

url: "app/crud.php",

data: "country="+val,
// 
success: function(response){
   //alert("The paragraph was clicked."); 
 $('#state').html(response);

}

});
 
}


function City(val) {
 
 //   var dataid = $("#country option:selected").attr('data-id');
 
// $('#phonecod').val(dataid);
// $('#phonecod1').val(dataid);
$.ajax({ 

type: "POST",

url: "app/crud.php",

data: "state="+val,
// 
success: function(response){
   //alert("The paragraph was clicked."); 
 $('#city').html(response);

}

});
 
}
</script>
















