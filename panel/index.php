<?php 
session_start();
 include 'assets/constant/config.php';
 
 try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
      }

        catch(PDOException $e)
        {
        echo "Connection failed: " . $e->getMessage();
        }
?>


<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Temple Management System</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="panel/assets/images/favicon.png">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">

                        <!-- hide and show password  --> 
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet">
    <!-- captcha -->
     <script src="https://www.google.com/recaptcha/api.js" async defer></script>
<style>
        .toggle-password{
            position: absolute;
            right: 60px;
            top: 377px;

        }
    </style>


</head>

<body class="h-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    <div class="text-center mb-3">
                                        <a href="index.php"><img src="../panel/assets/images/logo.png" alt="" width="200"></a>
                                    </div>
                                    <h4 class="text-center mb-4 text-white">Login </h4>

                                    <form action="admin/app/login_crud.php" method="POST">

                                         <div class="form-group">
                                            <label class="mb-1 text-white"><strong>Admin/User</strong></label>
                                            <select class=" postName form-control" name="adminuser">
                                             <option value="admin">Admin</option>
                                             <option value="user">User</option>
                                            
                                           </select>
                                        </div>

                                       
                                        <div class="form-group">
                                            <label class="mb-1 text-white"><strong>Email</strong></label>
                                            <input class="form-control" type="email" name="email"  placeholder="">
                                        </div>


                                        <div class="form-group">
                                            <label class="mb-1 text-white"><strong>Password</strong></label>
                                            <input class="form-control" type="password" name="password" id="password-field">
                                            <span toggle="#password-field" class="fas fa-eye fa-fw field icon toggle-password"></span>
                                        </div>
                                       <!--  <div class="form-group"> -->
                                        <div class="g-recaptcha" data-sitekey="6LdJC4AeAAAAAE638ShRfVSMBDSDjbQmkxD-lh_p">
                                  </div>
                              <!--   </div> -->

                                        
                                          

                        


                                             <div class="form-group mb-3 text-center row mt-4 pt-1">
                                                <div class="col-12">
                                            <button  class="btn bg-white text-primary btn-block" type="submit" name="submit">Log In</button>
                                        </div>
                                        </div>
                                   

                 <div class="form-group mb-0 row mt-2">
                        <div class="col-sm-12 mt-3 d-flex justify-content-between">
                            <a class="text-white" href="../panel/admin/recover.php">Forgot Password</a>
                            <a  class="text-white" href="../panel/admin/signup.php">create an account</a>
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
   
      


<!--**********************************
    Scripts
***********************************-->
<!-- Required vendors -->
<script src="assets/vendor/global/global.min.js"></script>
<script src="assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
<script src="assets/js/custom.min.js"></script>
<script src="assets/js/deznav-init.js"></script>
<!-----live chat---->
<script src="//code.tidio.co/8kypxdyqrrzqzca6sejczobmjtltqs1d.js" async></script>

<!------Toggle---->
<script>
$(".toggle-password").click(function() {

  $(this).toggleClass("fa-eye fa-eye-slash");
  var input = $($(this).attr("toggle"));
  if (input.attr("type") == "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }
});
</script>



</body>
</html>