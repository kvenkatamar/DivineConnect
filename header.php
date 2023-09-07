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
      <link rel="icon" href="img/favicon.png">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
      <link rel="stylesheet" type="text/css" href="css/style.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
       <link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css">
      <link rel="stylesheet" type="text/css" href="css/owl.theme.default.min.css">
   </head>  
 <header>
      <?php 
        $stmt=$conn->prepare("SELECT * FROM `web` ");
        $stmt->execute();
        $record=$stmt->fetchAll();?>
        <?php foreach($record as $key) {?>
         <div class="topbar">
            <div class="container">
               <div class="top-sec d-grid">
                     <ul  class="d-flex list-unstyled m-0 left-info">
                        <li>
                           <span class="fa fa-phone text-white ">   
                          
               <?php echo $key['phone']; } ?>
              
                        </li>
                        
                        <li class=""> <span class="text-white me-2">
                            <?php 
        $stmt=$conn->prepare("SELECT * FROM `web` ");
        $stmt->execute();
        $record=$stmt->fetchAll();?>
        <?php foreach($record as $key) {?>
               <?php echo $key['email']; ?>
               <?php } ?>
                          <!--  <a href="mailto:mail@example.com" class="d-md-block d-none">mail@example.com</a> -->
                        </li>
                     </ul>
                  <div>
                     <ul class="d-flex  list-unstyled align-items-center m-0 right-info">
                        <li>
                           <a href="#facebook"><span class="fab fa-facebook-f"></span></a>
                        </li>
                        <li>
                           <a href="#twitter"><span class="fab fa-twitter"></span></a>
                        </li>
                        <li>
                           <a href="#instagram"><span class="fab fa-instagram"></span></a>
                        </li>
                        <li class="mr-0">
                           <a href="#linkedin"><span class="fab fa-linkedin-in"></span></a>
                        </li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>

         <nav class="navbar navbar-expand-lg bg-white">
          <div class="container">
            <a  class="navbar-brand" href="#">
                <img src="img/logo.png" width="200">
               
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                </li>

                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="about.php">About us</a>
                </li>

                 <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="index.php#seva">Seva</a>
                </li>

                 <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="pass.php">Pass</a>
                </li>

                 <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="complaints.php">Complaint</a>
                </li>

                 <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="contact.php">Contact us</a>
                </li>
                
              
              </ul>
   

               

            </div>
          </div>
        </nav>
      </header>