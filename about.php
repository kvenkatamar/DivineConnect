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
   </head>
   <body>
      
      <section class="about-breadcrum">
        <h1 style="color:lightblue;" ></h1>
      </section>
      <section class="py-5 about"> 
        <div class="container">
          <div class="row align-items-center">
           <div class="col-md-12 ">
                    <h3 style="text-align:center;">About Us</h3>
                    <p class="mt-md-4 mt-3" style="margin-bottom: 50px; text-align: center;">Shri Saibaba Sansthan Trust, Shirdi, is the Governing and Administrative body of the Shri Saibaba's Samadhi Temple and all others temples on this premise, and devoted towards development of Shirdi village.". </p>
                    <p class="mt-3" style="margin-bottom: 50px; text-align: center;">Shri Saibaba Sansthan Trust, Shirdi, is the authorized body to control and manage the day-to-day activities at the Shri Saibaba Samadhi Temple. It also provides various facilities like Accommodation, Meals (Free), refreshments, and lot more. The Sansthan Trust also runs School and Colleges(Junior and Senior),  English Medium School from class Jr KG to Std X, Industrial Training Institute (ITI), Drinking Water Supply, Hospitals (Shri Saibaba Superspecility Hospital and Shri Sainath Hospital on Charity basis).</p>
                    <!-- <a href="#features" class="btn btn-danger e mt-md-5 mt-4 me-2">Explore features</a> -->
                    <!-- <a href="#view" class="btn btn-outline-danger mt-md-5 mt-4"> View all</a> -->
                </div>
           
          </div>
        </div>
      </section>
      <section class="py-5 service"> 
        <div class="container">
           <!-- <h3 class="title-big text-center pb-5">Some of Our Seva</h3> -->
            <div class="row ">
                  <div class="col-md-3">
                    <div class="grids5-info">
                        <a href="#service" class="d-block zoom"><img style="height:170px;" src="img/sai1.jpg" alt="" class="img-fluid service-image"></a>
                        <!-- <div class="blog-info">
                            <span class="fa "></span>
                             <h4><a href="#service">Aarthi</a></h4> -->
                        
                    </div>
                </div>
            <div class="col-md-3">
                    <div class="grids5-info">
                        <a href="#service" class="d-block zoom"><img style="height:170px;" src="img/sai2.jpg" alt="" class="img-fluid service-image"></a>
                        <!-- <div class="blog-info">
                            <span class="fa"></span>
                            <h4><a href="#service">Prasadam</a></h4> -->
                        
                    </div>
            </div>
            <div class="col-md-3">
                    <div class="grids5-info">
                        <a href="#service" class="d-block zoom"><img style="height:170px;" src="img/sai7.jpg" alt="" class="img-fluid service-image"></a>
                       <!--  <div class="blog-info">
                            <span class="fa "></span> -->
                            <!-- <h4><a href="#service">Abhisheka</a></h4> -->
                 
                    </div>
                </div>


                <div class="col-md-3">
                    <div class="grids5-info">
                        <a href="#service" class="d-block zoom"><img style="height:170px;" src="img/sai17.jpg" alt="" class="img-fluid service-image"></a>
                        <!-- <div class="blog-info">
                            <span class="fa"></span>
                            <h4><a href="#service">Prasadam</a></h4> -->
                        
                    </div>
            </div>
        </div>
      </section>



  <section class="py-5 service"> 
        <div class="container">
           <!-- <h3 class="title-big text-center pb-5">Some of Our Seva</h3> -->
            <div class="row ">
                  <div class="col-md-3">
                    <div class="grids5-info">
                        <a href="#service" class="d-block zoom"><img style="height:170px;" src="img/sai8.jpg" alt="" class="img-fluid service-image"></a>
                      <!--   <div class="blog-info">
                            <span class="fa "></span> -->
                            <!-- <h4><a href="#service">Aarthi</a></h4> -->
                       <!--  </div> -->
                    </div>
                </div>
            <div class="col-md-3">
                    <div class="grids5-info">
                        <a href="#service" class="d-block zoom"><img style="height:170px;" src="img/sai15.jpg" alt="" class="img-fluid service-image"></a>
                       <!--  <div class="blog-info">
                            <span class="fa"></span> -->
                            <!-- <h4><a href="#service">Prasadam</a></h4> -->
                      
                    </div>
            </div>
            <div class="col-md-3">
                    <div class="grids5-info">
                        <a href="#service" class="d-block zoom"><img style="height:170px;" src="img/sai3.jpg" alt="" class="img-fluid service-image"></a>
                        <!-- <div class="blog-info">
                            <span class="fa "></span> -->
                            <!-- <h4><a href="#service">Abhisheka</a></h4> -->
                       <!--  </div> -->
                    </div>
                </div>


                <div class="col-md-3">
                    <div class="grids5-info">
                        <a href="#service" class="d-block zoom"><img style="height:170px;" src="img/sai16.jpg" alt="" class="img-fluid service-image"></a>
                        <!-- <div class="blog-info">
                            <span class="fa"></span>
                            <h4><a href="#service">Prasadam</a></h4> -->
                        
                    </div>
            </div>
        </div>
      </section>

































     
    
  <?php include("../temple/footer.php");?>
</footer>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      <script src="js/owl.carousel.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

      <script src="js/main.js"></script>
   </body>
</html>