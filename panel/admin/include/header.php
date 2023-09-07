
<?php 
session_start();
 include '../assets/constant/config.php';
   include '../assets/constant/checklogin.php'; 
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
<html lang="en">
<head>
	<?php 
		$stmt=$conn->prepare("SELECT * FROM `web` ");
		$stmt->execute();
		$record=$stmt->fetchAll();?>
		<?php foreach($record as $key) {?>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
      <title><?php echo $key['title']; ?></title>

    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/<?php echo $key['logo']; ?>"><?php } ?>
	<link rel="stylesheet" href="../assets/vendor/chartist/css/chartist.min.css">
    <link href="../assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
	<link href="../assets/vendor/owl-carousel/owl.carousel.css" rel="stylesheet">
    <link href="../assets/css/style.css" rel="stylesheet">
    <link href="../assets/css/select2.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <!-------SweetAlert-------->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" rel="stylesheet">
      <!-- <link href="../assets/css/jquery.dataTables.min.css" rel="stylesheet"> -->
   
	<!------fontawesome------>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />


		<!-------datatables------->
    <link href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css
" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css
" rel="stylesheet">



	 

</head>
<body>
    <!--------preloader div---->
<div id="page"></div>
<div id="loading"></div>
<!----preloader end---->
   

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="index.html" class="brand-logo">
                <!-- <img class="logo-abbr" src="../assets/images/logo.png" alt="">
                <img class="logo-compact" src="../assets/images/logo-text.png" alt=""> -->
                <img class="brand-title" src="../assets/images/logo.png" alt="" width="600">
            </a>

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
       
		<!--**********************************
            Chat box End
        ***********************************-->
		
		<!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                            <div class="dashboard_bar">
								Dashboard
                            </div>
                        </div>
<!------Google translator-------->
<div id="google_translate_element"></div>

                        <ul class="navbar-nav header-right">
							 <!--<li class="nav-item">
								<div class="input-group search-area d-xl-inline-flex d-none">
									<div class="input-group-append">
										<span class="input-group-text"><a href="javascript:void(0)"><i class="flaticon-381-search-2"></i></a></span>
									</div>
									<input type="text" class="form-control" placeholder="Search here...">
								</div>
							</li> -->
							
						
                            <li class="nav-item dropdown header-profile">
                                <a class="nav-link" href="javascript:void(0)" role="button" data-toggle="dropdown">
                                    <img src="../assets/images/profile/18.jpg" width="20" alt=""/>
                                     
									<div class="header-info">
										<!-- <span class="text-black"><strong>Peter Parkur</strong></span>
										<p class="fs-12 mb-0">Super Admin</p> -->
										<?php
										$stmt=$conn->prepare("SELECT * FROM `signup` WHERE id='".$_SESSION['id']."'");
										$stmt->execute();
										$record = $stmt->fetchAll();
										foreach ($record as  $key) {?>
											<span class="d-none d-xl-inline-block ms-1"><strong><?php echo $key['username']; ?></strong>
												<p class="fs-12 mb-0">Super Admin</p>
											</span>
										<?php } ?>
									</div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="profile.php" class="dropdown-item ai-icon">
                                        <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                        <span class="ml-2">Profile </span>
                                    </a>
                                    

                                     <a href="changepassword.php" class="dropdown-item ai-icon">
                                       <i style="color:green;" class=" fa fa-lock-open"></i>
                                        <span class="ml-2">ChangePassword </span>


                                    <a href="../logout.php" class="dropdown-item ai-icon">
                                        <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                                        <span class="ml-2">Logout </span>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
       