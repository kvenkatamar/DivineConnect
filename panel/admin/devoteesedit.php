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
                                <h4 class="card-title">Manage Devotees</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
           
               <?php
                  $_SESSION["token"]=bin2hex(random_bytes(32));
                ?>
                                    <form action="app/devotees_crud.php" method="post">
                                      <?php
                                          $stmt=$conn->prepare("SELECT * FROM `devotees` WHERE id='".$_GET['id']."' ");
                                          $stmt->execute();
                                          $record=$stmt->fetchAll();

                                          foreach ($record as $key) { ?>
  
        <input class="form-control" type="hidden" name="id" value="<?php echo $key['id'];?>">
        <input type="hidden" name="token" value=<?php echo $_SESSION["token"]; ?>>

                                      <div class="mb-6">
                                        <div class="row">

                                         <div class="col-md-6">
                                          <label>Devotees Names</label>
                                            <input type="text" class="form-control" placeholder=" " name="dname" value="<?php echo $key['dname'];?>" pattern="^[a-z A-Z ]+$" /><br>
                                        </div>

                                          <div class="col-md-6">
                                          <label>Date</label>
                                            <input type="date" class="form-control" name="date" value="<?php echo date('Y-m-d');?>"  > 
                                          </div>
                                          
                                        <div class="col-md-6">
                                          <label>Phone No.</label>
                                            <input type="text" class="form-control" name="phone" value="<?php echo $key['phone'];?>" pattern="^[0-9 ]+$" />
                                          </div>

  <div class="col-md-6">
    <label>Religion</label>
      <select class="form-control" name="religion" value="<?php echo $key['religion'];?>" required>

        <option <?php if($key['religion']=="Buddhism")
      {echo "selected";}?> value="Buddhism" >Buddhism</option>

      <option <?php if($key['religion']=="Hinduism")
      {echo "selected";}?> value="Hinduism" >Hinduism</option>
                                            
                                          </select><br>
                                        </div>



 




 
                                          
 <div class="col-md-6">
     <label>Status</label>

      <select class="form-control" name="status">
     
      <option <?php if($key['status']=="active")
      {echo "selected";}?> value="active" >Active</option>

      <option <?php if($key['status']=="inactive")
      {echo "selected";}?> value="inactive" >Inactive</option>
                                      </select><br>
                                      </div>


  

                                       <div class="col-12">
                                         <button class=" btn btn-primary" type="submit" name="update">Update</button>
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

    <script>
function State(val) {
 
 //   var dataid = $("#country option:selected").attr('data-id');
 
// $('#phonecod').val(dataid);
// $('#phonecod1').val(dataid);
$.ajax({ 

type: "POST",

url: "app/taluka_crud1.php",

data: "country="+val,
// 
success: function(response){
  
   //alert("The paragraph was clicked."); 
 $('#state').html(response);

}

});
 
}

</script>

<script>
function City(val) {
 
 //   var dataid = $("#country option:selected").attr('data-id');
 
// $('#phonecod').val(dataid);
// $('#phonecod1').val(dataid);
$.ajax({ 

type: "POST",

url: "app/taluka_crud1.php",

data: "state="+val,
// 
success: function(response){
   //alert("The paragraph was clicked."); 
 $('#city').html(response);

}

});
 
}
</script>