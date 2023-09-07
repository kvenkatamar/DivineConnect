<footer class="footer pt-5">
    <div class="container py-5">
      <div class="row footer-top-29">
        <div class="col-lg-4 col-md-6 col-sm-7 footer-list-29 footer-1 pr-lg-5">
          <div class="footer-logo mb-4">
            <a class="navbar-brand" href="index.html">
              <img src="img/logo.png" width="200"></a>
          </div>
          <p>Temple Management Package is a highly scalable product for Hindu Temples. It offers a complete automation in billing and accounts, inventory, staff management and administration sections.</p>
          <div class="main-social-footer-29 mt-4">
            <a href="#facebook" class="facebook"><span class="fab fa-facebook-f"></span></a>
            <a href="#twitter" class="twitter"><span class="fab fa-twitter"></span></a>
            <a href="#instagram" class="instagram"><span class="fab fa-instagram"></span></a>
            <a href="#linkedin" class="linkedin"><span class="fab fa-linkedin-in"></span></a>
          </div>
        </div>
        <div class="col-lg-2 col-md-6 col-sm-5 col-6 footer-list-29 footer-2 mt-sm-0 mt-5">

          <ul>
            <h6 class="footer-title-29">Navigation</h6>
            <li><a href="about.php">About Us</a></li>
          
            <li><a href="index.php#seva">Services</a></li>
            <li><a href="contact.php">Contact us</a></li>
         
          </ul>
        </div>
       
        <div class="col-lg-4 col-md-6 col-sm-7 footer-list-29 footer-4 mt-lg-0 mt-5">
          <h6 class="footer-title-29">Contact Info </h6>
          <p class="mt-2">Address :<?php 
        $stmt=$conn->prepare("SELECT * FROM `web` ");
        $stmt->execute();
        $record=$stmt->fetchAll();?>
        <?php foreach($record as $key) {?>
               <?php echo $key['address']; ?>
               <?php } ?></p>


          <p class="mt-2">Phone : <?php 
        $stmt=$conn->prepare("SELECT * FROM `web` ");
        $stmt->execute();
        $record=$stmt->fetchAll();?>
        <?php foreach($record as $key) {?>
               <?php echo $key['phone2']; ?>
               <?php } ?></p>


          <p class="mt-2">Email : <?php 
        $stmt=$conn->prepare("SELECT * FROM `web` ");
        $stmt->execute();
        $record=$stmt->fetchAll();?>
        <?php foreach($record as $key) {?>
               <?php echo $key['email2']; ?>
               <?php } ?></p>
         
        </div>
      </div>
    </div>
  <!-- copyright -->
  <section class="w3l-copyright text-center">
    <div class="container">
      <p class="copy-footer-29">© 2021 Excellence. All rights reserved. Design by   <a href="https://w3layouts.com/" target="_blank">
         <?php 
        $stmt=$conn->prepare("SELECT * FROM `web` ");
        $stmt->execute();
        $record=$stmt->fetchAll();?>
        <?php foreach($record as $key) {?>
               <?php echo $key['cname']; ?>
              </a>  <?php echo $key['year']; ?>   <?php } ?></p>
    </div>
</section>
</footer>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      <script src="js/owl.carousel.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

      <script src="js/main.js"></script>
   </body>
</html>