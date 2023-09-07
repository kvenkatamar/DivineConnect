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



   <body>
      <section class="main-slider">
        <div class="owl-carousel owl-theme" id="slider">
            <div class="item">
              <div class=" banner-view banner-top1 d-flex align-items-center justify-content-center text-center">
                <div class="banner-info-bg">
                 <h5>Temple Management System </h5>
                  
                </div>
              </div>
            </div>
             <div class="item">
              <div class=" banner-view banner-top2 d-flex align-items-center justify-content-center text-center">
                <div class="banner-info-bg">
                  <h5>Temple Management System </h5>
                  <a class="btn btn-style btn-danger mt-sm-5 mt-4 mr-2" href=""> Learn More</a>
                </div>
              </div>
            </div>
             <div class="item">
              <div class=" banner-view banner-top3 d-flex align-items-center justify-content-center text-center">
                <div class="banner-info-bg">
                   <h5>Temple Management System </h5>
                  <a class="btn btn-style btn-danger mt-sm-5 mt-4 mr-2" href=""> Learn More</a>
                </div>
              </div>
            </div>
             <div class="item">
              <div class=" banner-view banner-top4 d-flex align-items-center justify-content-center text-center">
                <div class="banner-info-bg">
                  
                  <h5>Temple Management System </h5>
                  
                  <a class="btn btn-style btn-danger mt-sm-5 mt-4 mr-2" href=""> Learn More</a>
                </div>
              </div>
            </div>
            
        </div>

      </section>
      <section class="py-5 about"> 
        <div class="container">
          <div class="row align-items-center">
           <div class="col-md-6 ">
                    
                    <p class="mt-md-4 mt-3">Temple Management Package is a highly scalable product for Hindu Temples. It offers a complete automation in billing and accounts, inventory, staff management and administration sections. It helps temple administrators to assure effective devotee service. </p>
                    <p class="mt-3">Temple Management solution is bundled with an excellent accounting package which enables easy operation and efficient reporting. It's available with internet support to allow devotees to make online offerings, pooja bookings, and many more useful features.</p>
                 <!--    <a href="#features" class="btn btn-danger e mt-md-5 mt-4 me-2">Explore features</a> -->
                    <a href="about.php" class="btn btn-outline-danger mt-md-5 mt-4"> View all</a>
                </div>
            <div class="col-md-6">
              <img style="height:400px; width:600px;"src="img/temple5.jpg" class="img-fluid">
            </div>
          </div>
        </div>
      </section>
      <section class="py-5 service" id="seva"> 
        <div class="container">
           <h3 class="title-big text-center pb-5">Some of Our Seva</h3>
            <div class="row ">
                  <div class="col-md-4">
                    <div class="grids5-info">
                        <a href="#service" class="d-block zoom"><img style="height:300px; width:400px;" src="img/sai1.jpg" alt="" class="img-fluid service-image"></a>
                        <div class="blog-info">
                            <span class="fa "></span>
                            <h4><a href="#service">Aarthi</a></h4>
                        </div>
                    </div>
                </div>
            <div class="col-md-4">
                    <div class="grids5-info">
                        <a href="#service" class="d-block zoom"><img style="height:300px; width:400px;" src="img/sai2.jpg" alt="" class="img-fluid service-image"></a>
                        <div class="blog-info">
                            <span class="fa"></span>
                            <h4><a href="#service">Prasadam</a></h4>
                        </div>
                    </div>
            </div>
            <div class="col-md-4">
                    <div class="grids5-info">
                        <a href="#service" class="d-block zoom"><img style="height:300px; width:400px;" src="img/sai4.jpg" alt="" class="img-fluid service-image"></a>
                        <div class="blog-info">
                            <span class="fa "></span>
                            <h4><a href="#service">Abhisheka</a></h4>
                        </div>
                    </div>
                </div>
        </div>
      </section>
      

  <?php include("../temple/footer.php");?>
   

  
     