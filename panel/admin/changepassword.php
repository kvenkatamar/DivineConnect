<?php 
   session_start();
    //echo $_SESSION['id'];exit;
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
<?php
   $SID=$_SESSION['id'];
           $stmt = $conn->prepare("SELECT * FROM `signup` WHERE id='".$_SESSION['id']."'");
                   //print_r($stmt); exit;
                       $stmt->execute();
                        $record=$stmt->fetchAll();
                        foreach ($record as $key) { 
                          //print_r($key); exit;?>
<div class="content-body">
   <div class="container-fluid">
      <div class="col-xl-12 col-lg-12">
         <div class="card">
            <div class="card-header">
               <h4 class="card-title">Change  Password</h4>
            </div>
            <div class="card-body">
               <div class="basic-form">
                  <form action="app/password_crud.php" method="POST">
                    
                        
                     <input type="hidden" name="id" value="<?php echo $key['id'];?>">
                     <div class="form-group">
                        <label>Current Password</label>
                        <input type="password" class="form-control" name="currentpassword" >
                     </div>
                     <div class="form-group">
                        <label>New Password</label>
                        <input type="password" class="form-control" name="npassword" >
                     </div>
                     <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="password" class="form-control" name="cpassword">
                        
                     </div>
                     <div class="col-12">
                        <button class=" btn btn-primary" type="submit" name="submit">Change Password</button>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<?php } ?>
<?php include('../admin/include/footer.php');?>