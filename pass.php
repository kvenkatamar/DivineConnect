<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<?php
session_start(); 
 include 'panel/assets/constant/config.php';
 
 try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
      }

        catch(PDOException $e)
        {
        echo "Connection failed: " . $e->getMessage();
        }
?>
<?php include("../temple/header.php");?>
<!doctype html>
<html lang="en">
   <head>
     <?php 
        $stmt=$conn->prepare("SELECT * FROM `web` ");
        $stmt->execute();
        $record=$stmt->fetchAll();?>
        <?php foreach($record as $key) {?>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
     <title><?php echo $key['title']; ?></title>
<?php } ?>
      <link rel="icon" type="image/png" sizes="16x16" href="../temple/img/favicon.png">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
      <link rel="stylesheet" type="text/css" href="css/style.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
       <link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css">
      <link rel="stylesheet" type="text/css" href="css/owl.theme.default.min.css">
      <script
  src="https://code.jquery.com/jquery-3.6.0.js"
  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
  crossorigin="anonymous"></script>
   </head>
   <body>
      
    
      
      <section class="py-5">
         <div class="container py-md-5 py-sm-4 py-2">
              <div class="row align-items-center">
                  <div class="col-lg-12">
                      <div class="bottom-info">

                     <!-- section25 -->
<form action="../temple/panel/payment1/pay.php" method="POST">
 
 <div class="row">
    
        
<div class="auto">
    <div class="row">

<div class="col-md-6">

  <label >Seva name</label>
  <select name="sevaname" class="form-control ml-2" onchange="Address1(this);" required>
     <option>Select Seva</option>
                            
<?php
//echo"SELECT * FROM seva WHERE delete_status=0 ";exit;
  $stmt = $conn->prepare("SELECT * FROM seva WHERE delete_status=0 ");
    $stmt->execute();
    $result = $stmt->fetchAll();
    foreach ($result as $key) {    ?>
        <option value="<?php echo $key['id'] ?>"><?php echo $key['sevaname'] ?></option>
                            
                                
                                  
              <?php } ?>
                        
</select>
</div>

<div class="col-md-6">

<label for="value1">Charge of Seva</label>
<input type="text" name="cseva" id="cseva" class="form-control add" readonly required >

</div>
</div> 
</div>
              
 <div class="auto">
    <div class="row">
  <div class="col-md-6">
  <label>Select Mobile</label>
  <input type="text" name="mobile_no" class="postName form-control ml-2 " onblur ="Address(this);" required="">
</div>

 
 <div class="col-md-6">
<label> Devotees Name</label>
<input type="text"  name="dname" class="form-control add1" required readonly> 
</div>
</div>
</div>

  <div class="col-md-6">
    <label>Age</label>
 <input type="text"  name="agee" class="form-control" required>
</div>


 <div class=" form-group col-sm-6">
  <label>Gender</label>
    <select class=" postName form-control" name="genderr" required>
    <option value=" ">Select Gender</option>
    <option value="female">Female</option>
    <option value="male">Male</option>
    </select>
</div>

<div class=" form-group col-sm-6">
 <label>Proof Type</label>
    <select class=" postName form-control" type="text" name="ptypee"  id="" required >
    <option value=" ">Select ProofType</option>
    <option value="Adharcard">Adharcard</option>
    <option value="Aancard">Pan card</option>
    
    <option value="Driving license">Driving Licenes</option>
</select>
</div>
<div class=" form-group col-sm-6">
     <label>Proof No.</label>
    <input class="form-control" type="text" name="pnoo"  id="" pattern="^[0-9 ]+$" required ><br>
</div> 

</div>

  

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

url: "panel/admin/app/pass_crud.php",

data: "id="+val,
dataType:'JSON',
// 
success: function(response){
    //alert(response['display1'][0].phone);
    
//alert("chg");
    $(current).find('.add1').val(response['display1'][0].dname);
   

    
 

 }

});   
//});
}
</script>


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

url: "panel/admin/app/crud1.php",

data: "id="+val,
dataType:'JSON',
// 
success: function(response){
   // alert(response['display1'][2].gid);
    

    $(current).find('.add').val(response['display1'][0].chargeofseva);

    
 

 }

});   
//});
}
</script>





 <!-- My div Start -->
 <!------jquery start---->
                    <div class="mydiv">
                         <div class="auto">
                           
                                <div class="form-group row control-group after-add-more subdiv">
                          
                                        <div style="margin-top:20px;" class="col-md-1 sr_no">1</div>
                                            <div class="col-sm-2 ">
                                              <label>Name</label>
                                               <input class="form-control" type="text" name="name1[]"  id="" pattern="^[a-z A-Z ]+$" required>


                                                </div>

                                                <div class="col-sm-1">
                                                   <label>Age</label>
                                               <input class="form-control" type="text" name="age[]"  id="" pattern="^[0-9 ]+$" required >
                                                </div>
                                        

                                             <div class="col-sm-2">
                                              <label>Gender</label>
                                            <select class=" postName form-control" name="gender[]" required>
                                              <option value=" ">Select Gender</option>
                                             <option value="female">Female</option>
                                             <option value="male">Male</option>
                                            
                                            </select>
                                      </div>


                                                <div class="col-sm-2">
                                                   <label>Proof Type</label>
                                               <select class=" postName form-control" type="text" name="ptype[]"  id="" required >
                                                  <option value=" ">Select ProofType</option>
                                                  <option value="Adharcard">Adharcard</option>
                                                  <option value="Pancard">Pan card</option>
                                                 
                                                  <option value="Driving license">Driving Licenes</option>
                                            
                                            </select>


                                                </div>
                                                 <div class="col-sm-2">
                                                   <label>Proof No.</label>
                                               <input class="form-control" type="text" name="pno[]"  id="" pattern="^[0-9 ]+$" required ><br>

                                                </div>


                                                <div class="col-md-2 mb-2">
                                                   
                                            <button style="margin-top:20px;" class="btn btn-success add-more" type="button"><i class="fa fa-plus"></i></button><br><br>
                                        </div>

                                       
                                  </div>
                            </div>
                        </div>

                        <!------jquery end---->
                        <!-- My div end -->
                                  

 

                          <div class="copy hide" style="display:none;">
                         <div class="form-group control-group row subdiv">
                             <div class="col-sm-1 sr_no"></div>

                                      <div class="col-sm-2">
                                               <input class="form-control" type="text" name="name1[]"  id="" >


                                                </div>
                                                <div class="col-sm-1">
                                               <input class="form-control" type="text" name="age[]"  id="" >
                                                </div>

                                                <div class="col-sm-2">
                                                  <select class=" postName form-control" name="gender[]">
                                                  <option value=" ">Select Gender</option>
                                             <option value="female">Female</option>
                                             <option value="male">Male</option>
                                            </select>
                                          </div>

                                                <div class="col-sm-2">
                                                 <select class=" postName form-control" name="ptype[]">
                                                  <option value=" ">Select ProofType</option>
                                                  <option value="adharcard">Adharcard</option>
                                                  <option value="pancard">Pan card</option>
                                                  <option value="creditcard">Credit Card</option>
                                                  <option value="drivinglicense">Driving Licenes</option>
                                            
                                            </select>


                                                </div>
                                                 <div class="col-sm-2">
                                               <input class="form-control" type="text" name="pno[]"  id="" >


                                                </div>

                                                 <div class="col-md-2 mb-2">
                         <button class="btn btn-danger remove" type="button"><i class="fa fa-minus"></i></button><br><br>
                      </div>

                           </div>
                         </div>



<div>
 <div style="margin-left:800px;">
   <div class="col-sm-6">
     <label for="value2">Total Person</label>
      
        <input class="form-control" type="text" name="tperson" id="tperson" onchange="calc(this);" pattern="^[0-9 ]+$" required ><br>
       
        
            
        </div>


                             <?php  
                                date_default_timezone_set('Asia/Kolkata');
                                $date=date('Y-m-d h:i:s');
                              ?>
                            <div class="col-sm-6">
                              <label>Darshan Date&Time</label>
                              <input class="form-control" type="text" name="date" value="<?php echo $date;?>"  id="" ><br>
                            </div>
                                  
                            <div class="col-sm-6">
                               <label>Total Amount</label>
                              <input class="form-control" type="text" name="totalamount" id="totalamount"   readonly required><br>
                            </div>

                              <div class="col-12 ">
                                <button style="margin-left: 15px;" class=" btn btn-primary" type="submit" name="submit">Submit</button>
                              </div>
                                              
                            </div>
                           </div>
                       </form>
                          </div>
                         </div>
                        </div>
                       </div>
                     
                </section>
    
      

 

 <?php include("../temple/footer.php");?>
 <script type="text/javascript">



  $(".add-more").on('click',function(){ 
          var html = $(".copy").html();
          $(".after-add-more").after(html);
          show_no();
      });  


      $("body").on("click",".remove",function(){ 
          $(this).parents(".control-group").remove();
          show_no();
      });
function show_no()
{
    var row_cnt=0;
  $( ".sr_no" ).each(function() {
      row_cnt++;

    $( this ).html(row_cnt);

    });
}
</script> 

<script >
 function calc(){
   var textValue1 = document.getElementById('cseva').value;
   var textValue2 = document.getElementById('tperson').value;

   document.getElementById('totalamount').value = textValue1 * textValue2; 
 }
</script> 


  
   </body>
</html>
