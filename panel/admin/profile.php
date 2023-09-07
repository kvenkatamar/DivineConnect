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
               <h4 class="card-title">User Profile</h4>
            </div>
            <div class="card-body">
               <div class="basic-form">
                  <form action="app/profile_crud.php" method="POST">
                    
                        
                     <input type="hidden" name="id" value="<?php echo $key['id'];?>">
                     <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" name="username" value="<?php echo $key['username'];?>"  >
                     </div>
                     <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" value="<?php echo $key['email']; ?> ">
                     </div>
                     <div class="form-group">
                        <label>Mobile</label>
                        <input type="text" class="form-control" name="mobileno" value="<?php echo $key['mobileno']; ?> "pattern="^[0][1-9]\d{9}$|^[1-9]\d{9}$">
                        
                     </div>
                     <div class="col-12">
                        <button class=" btn btn-primary" type="update" name="update">Submit</button>
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