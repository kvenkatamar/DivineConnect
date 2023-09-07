<?php 
session_start();
 include '../assets/constant/config.php';
 
 try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $stmt=$conn->prepare("SELECT * FROM `details` WHERE id='".$_GET['id']."' ");
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
      <h4 class="card-title">Details</h4>
    </div>
<div class="card-body">
<div class="basic-form">
<?php
$_SESSION["token"]=bin2hex(random_bytes(32));
 ?>
 <form action="app/details_crud.php" method="post">
  <?php
  $stmt=$conn->prepare("SELECT * FROM `details` WHERE id='".$_GET['id']."' ");
  $stmt->execute();
  $record=$stmt->fetchAll();
    foreach ($record as $key) { ?>
  <input class="form-control" type="hidden" name="id" value="<?php echo $key['id'];?>">
  <input type="hidden" name="token" value=<?php echo $_SESSION["token"]; ?>>

<div class="mb-6">
 <div class="row">
  <div class="col-md-6">
    <label>Devotees Name</label>
    <select id="single-select" class="form-control" name="dname">
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
  <label>Religion</label>
    <input type="text" class="form-control" placeholder=" " name="religion" value="<?php echo $key['religion'];?>" pattern="^[a-z A-Z ]+$" />
</div>

<div class="col-md-6">
  <label>Country</label>
    <select type="text" class="form-control" name="country" value="" data-live-search="true" id="country" onChange="State(this.value);"><br>
    <?php  
              //echo "SELECT * FROM `country` WHERE  id='".$_SESSION['id']."'  ";exit;            
    $stmt2 = $conn->prepare("SELECT * FROM `country` ");
    $stmt2->execute();
    $result2 = $stmt2->fetchAll();
     foreach ($result2 as $c1) 
{ ?>

  <option <?php if($key['country']==$c1['id']){echo "selected";}?> value="<?php echo $c1['id']?>"><?php echo $c1['country_name']?>
</option>
    <?php }?>
</select>
</div>

<div class="col-md-6">
  <label>States</label>
    <select class="form-control" style=" width: 375px" name="state" value="<?php echo $res['state']; ?>" data-live-search="true" id="state" onChange="City(this.value);">
    <?php  
      $stmt3 = $conn->prepare("SELECT * FROM `states` ");
      $stmt3->execute();
      $result3 = $stmt3->fetchAll();
         foreach ($result3 as $c2) 
    { ?>

    <option <?php if($key['state']==$c2['id']){echo "selected";}?> value="<?php echo $c2['id']?>"><?php echo $c2['name']?></option>
<?php }?>
                                                  
                                            
                                            </select><br>
                                        </div>

                                         <div class="col-md-6">
                                          <label>City</label>
                                             <select class="form-control" style=" width: 375px" name="city" value="<?php echo $res['city']; ?>" data-live-search="true" id="city" >
                                                   <?php  
              //echo "SELECT * FROM `country` WHERE  id='".$_SESSION['id']."'  ";exit;            
               $stmt4 = $conn->prepare("SELECT * FROM `city` ");
               $stmt4->execute();
                $result4 = $stmt4->fetchAll();
         foreach ($result4 as $c3) 
                                                         { ?>

                                                <option <?php if($key['city']==$c3['id']){echo "selected";}?> value="<?php echo $c3['id']?>"><?php echo $c3['name']?></option>
                                                   <?php }?>
                                                  
                                            
                                            </select> <br>
                                        </div>

                </div>
                


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
    <?php include('../admin/include/footer.php'); ?>

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
















