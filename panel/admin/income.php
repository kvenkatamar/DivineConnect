<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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
                                <h4 class="card-title">Income Module</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                  <div class="auto">
                                  <div class="row">
           
                        
                                    <form action="app/income_crud.php" method="post">
                                    
                                      <div class="mb-6">
                                        <div class="row">

                                        
                                    <?php 

                                        $stmt=$conn->prepare("SELECT * FROM `income` where id=(select max(id) from income)");
                                        $stmt->execute();
                                        $record=$stmt->fetchAll();

                                        foreach ($record as $key)

                                         {


                                          
                                        }
                                        //print_r($key);exit;
                                        $n=$key['id']+1;
                                        $L='Rno-';
                                        $eid=$L." ".$n;
                                       ?>

                                       <div class="col-md-6">
                                          <label><b>Receipt No.</b></label>
                                            <input type="text" class="form-control" placeholder=" " name="eid" value="<?php echo $eid; ?>" readonly=" "><br>
                                        </div>
                                        
                                        <div class="col-md-6">
                                          <label>Date</label>
                                            <input type="date" class="form-control" name="date"  required><br>
                                          </div>

    
      <div class="col-md-6" >
      <label>Devotees Name</label>

        <select class="postName1 form-control" name="dname" onchange="Address1(this);"  required>
          <option value="">none</option>
          <?php               
    $stmt = $conn->prepare("SELECT * FROM `devotees` WHERE delete_status='0' ");
    $stmt->execute();
    $result = $stmt->fetchAll();
    foreach ($result as $res) {
?>
      <option value="<?php echo $res['id']?>">
        <?php echo $res['dname']?></option>
        <?php } ?>
        
</select><br>
           
 </div>

                                        <div class="col-md-6">
                                          <label>Mobile No.</label>
                                            <input type="text" class="form-control add" name="mobile_no" required
                                            readonly><br>
                                      </div>
                                
                                    

                                       <div class="col-md-6">
                                        
                                          <label>Resident Address</label>
                                            <input type="text" class="form-control" placeholder=" " name="raddress" value="" pattern="^[a-z A-Z 0-9 ]+$" required><br>
                                        </div>



                                        <div class="col-md-6">
                                          <label>Trasaction Type</label>
                                           <select class="postName1  form-control" name="transaction" pattern="^[a-z A-Z ]+$" required>
                                           
                                             <option value="cash">Cash</option>
                                             <option value="phonpay">Phonpay</option>
                                             <option value="googlepay">Googlepay</option>
                                             <option value="bank">Bank</option>
                                           </select>
                                      </div>

                                      <div class="col-md-6">
                                          <label> Type</label>
                                          <select name="donation" class="postName1 form-control " required>
     <option value="">Select</option>
                            
<?php
//echo "SELECT * FROM manageincome WHERE delete_status=0 ";exit;
  $stmt = $conn->prepare("SELECT * FROM manageincome WHERE delete_status=0 ");
    $stmt->execute();
    $result = $stmt->fetchAll();
    foreach ($result as $key) {    ?>
        <option value="<?php echo $key['id'] ?>">
          <?php echo $key['iname'] ?></option>
                            
                                
                                  
              <?php } ?>
                        
</select><br><br>
                                      </div>

                                   
    

<div class="col-md-6">

  <label  >Seva Name</label>
  <select name="sevaname" class="postName1 form-control" onchange="Address(this);" required>
     <option value="">Select</option>
                            
<?php
//echo"SELECT * FROM seva WHERE delete_status=0 ";exit;
  $stmt = $conn->prepare("SELECT * FROM seva WHERE delete_status=0 ");
    $stmt->execute();
    $result = $stmt->fetchAll();
    foreach ($result as $key) {    ?>
        <option value="<?php echo $key['id'] ?>">
          <?php echo $key['sevaname'] ?></option>
                            
                                
                                  
              <?php } ?>
                        
</select>
</div>

<div class="col-md-6">
<label for="value1">Charge of Seva</label>
<input type="text" name="totalamount" id="cseva" class="form-control add1" required readonly >

</div>


 

                                    
                                                
                                              <div class="col-12">
                                              
                                              <button style="margin-top: 20px;" class=" btn btn-primary" type="submit" name="submit"><b>Submit</b></button> 
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
                         </div>
                       </div>



<?php include("../admin/include/footer.php"); ?>
                         

<script>

function Address1(eve) {
//$('.product').change(function(){
    var val=$(eve).val();
     var current=$(eve).closest('.auto');
     //$(current).find('.gid').val(10);
    //console.log(rate);
  //alert(val);
 $.ajax({ 

type: "POST",

url: "app/income_crud.php",

data: "id="+val,
dataType:'JSON',
// 
success: function(response){

  //alert("hi..")
  
    $(current).find('.add').val(response['display2'][0].phone);

    
 

 }

});   
//});
}
</script>
<script>

function Address(eve) {
//$('.product').change(function(){
    var val=$(eve).val();
     var current=$(eve).closest('.auto');
     //$(current).find('.gid').val(10);
    //console.log(rate);
  //alert(val);
 $.ajax({ 

type: "POST",

url: "app/incomeseva_crud.php",

data: "id="+val,
dataType:'JSON',
// 
success: function(response){
    //alert(response['display1'][0].dname);
    
//alert("");
    $(current).find('.add1').val(response['display1'][0].chargeofseva);
   

    
 

 }

});   
//});
}
</script>

                                   
                      


                                      
                                      
