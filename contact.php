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
   </head>
   <body>
    <?php include("../temple/header.php");?>




      <div class="container">

   <div class="row">
      
     <form id="main" method="POST" action="panel/admin/app/contact_crud.php" enctype="multipart/form-data" class="col-md-7 p-md-5">
            <div class="col-md-12 mb-2">
                <label class="form-label">Name</label>
                <input type="text" class="form-control" name="name1" id="name1" placeholder="Enter Name...." pattern="^[a-z A-Z ]+$"  required="">
            </div>
            <div class="col-md-12">
                <label class="form-label">Email</label>
               <input type="email" class="form-control" id="email1" name="email1" placeholder="Enter valid e-mail address..." pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required="">
               <span class="messages"></span><br>
            </div>
            <div class="col-md-12 mb-2">
                 <label class="form-label">Mobile Number</label>
               <input type="tel" class="form-control" id="mobile" name="mobile" placeholder="Enter valid Mobile number..." pattern="^[0][1-9]\d{9}$|^[1-9]\d{9}$"  required="">
            </div>
          
              <div class="col-md-12">
                <label class="col-form-label">Message</label>
               <textarea type="date" class="form-control" id="msg" name="msg" placeholder="Enter Message....." pattern="^[a-z A-Z 0-9 ]+$" /></textarea>
            </div>

        <div class="col-md-12 my-4 text-center">
            <button class="btn btn-danger" type="submit" name="submit">Submit</button>
        </div>
        
      </form>
      <div class="col-md-5 p-md-5 contact-ctn">
          <h1 class="contact-title">Contact Info </h1>
         
          <p class="mt-3" >Phone : <a style="color:blue"><?php 
        $stmt=$conn->prepare("SELECT * FROM `web` ");
        $stmt->execute();
        $record=$stmt->fetchAll();?>
        <?php foreach($record as $key) {?>
               <?php echo $key['phone2']; ?>
               <?php } ?></a></p>


          <p class="mt-3">Email : <a style="color:blue"><?php 
        $stmt=$conn->prepare("SELECT * FROM `web` ");
        $stmt->execute();
        $record=$stmt->fetchAll();?>
        <?php foreach($record as $key) {?>
               <?php echo $key['email2']; ?>
               <?php } ?></a></p>
         <!--  <p class="mt-3">Support : <a href="mailto:info@support.com">info@support.com</a></p> -->
         <div class="mapouter mt-2"><div class="gmap_canvas"><iframe width="100%" height="250" id="gmap_canvas" src="https://maps.google.com/maps?q=upturn%20india&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe></div></div>


      </div>
   </div>
   </div>


    
 <?php include("../temple/footer.php");?>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      <script src="js/owl.carousel.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

      <script src="js/main.js"></script>
   </body>
</html>