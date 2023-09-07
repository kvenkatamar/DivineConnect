<?php include('include/header.php');?>
<?php include('include/sidebar.php');?>

<div class="content-body">
           
      <div class="container-fluid">
      <div class="col-xl-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Devotees</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                            
      
                                   <form action="app/devotees_crud.php" method="post">
                                   
                                      <div class="mb-6">
                                        <div class="row">

                                        <div class="col-md-6">
                                          <label>Devotees Name</label>
                                            <input type="text" class="form-control" placeholder=" " name="dname" value="" pattern="^[a-z A-Z ]+$" required>
                                        </div><br>

                                         <div class="col-md-6">
                                          <label>Date</label>
                                            <input type="date" class="form-control" name="date" value="<?php echo date('Y-m-d');?>"  pattern="^[0-9 ]+$" required><br>
                                          </div>

                                        <div class="col-md-6">
                                          <label>Phone No.</label>
                                            <input type="text" class="form-control" name="phone" value="" pattern="^[0][1-9]\d{9}$|^[1-9]\d{9}$" required>
                                          </div>

                                      <div class="col-md-6">
                                        <label>Religion</label>
                                          <select class="form-control" name="religion" value="" required>
                                            <option value="">None</option>
                                            <option value="Buddhism">Buddhism</option>
                                            <option value="Hinduism">Hinduism</option>
                                            
                                            
                                          </select><br>
                                        </div>

                                      <div class="col-md-6">
                                        <label>Country</label>
                                          <select class="form-control" name="country" value=""  required>
                                            <option value="">None</option>
                                            <option value="India">India</option>
                                            
                                              
                                          </select><br>
                                          </div>

<div class="col-md-6">
  <label>State</label>
    <select class="postName1 form-control" name="state2"  onChange="State(this.value);" required>
      <option>None</option>
      <?php               
    $stmt = $conn->prepare("SELECT * FROM `states`");
    $stmt->execute();
    $result = $stmt->fetchAll();
    foreach ($result as $res) {
?>
      <option value="<?php echo $res['id']?>"><?php echo $res['state']?>
        
      </option>
        <?php } ?>
        
</select><br>
                                            
</div>


<div class="col-md-6">
  <label>District</label>
    <select class=" postName1 form-control"  name="district1" onChange="City(this.value);" data-live-search="true" id="state"  required>
    </select>
      
     
</div>

<div class="col-md-6">
  <label>Taluka</label>
    <select class="postName1 form-control" name="taluka"  data-live-search="true" id="city"  required><br>
    </select>
</div>

<div class="col-md-6">
  <label>Status</label>
    <select class="form-control" name="status">
      <option value="active">Active</option>
      <option value="inactive">Inactive</option>
    </select><br>
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
      
    <?php include('include/footer.php'); ?>

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
