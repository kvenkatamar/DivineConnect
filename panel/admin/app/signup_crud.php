<?php 
session_start();
 include '../../assets/constant/config.php';
 
 try {
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		if (isset($_POST['submit'])) 
		{
			$passw=hash('sha256', $_POST['password']);
			$passw1=hash('sha256', $_POST['cpassword']);

			function createSalt()
			{
				return '2123293dsj2hu2nikhiljdsd';
			}
			$salt=createSalt();
			$password=hash('sha256',$salt.$passw);
			$cpassword=hash('sha256',$salt.$passw1);
			if($passw == $passw1){

// echo "INSERT INTO `signup`(`username`, `email`, `password`, `cpassword`, `mobile`) VALUES ('".$_POST['username']."','".$_POST['email']."','".$password."','".$cpassword."','".$_POST['mobile']."')";exit;

			$stmt = $conn->prepare("INSERT INTO `signup`(`username`, `email`, `password`, `cpassword`, `mobileno`) VALUES ('".$_POST['username']."','".$_POST['email']."','".$password."','".$cpassword."','".$_POST['mobileno']."')");

			$stmt->execute();



			header("location:../dashboard.php" ); 

		}
		}

		


	}
		catch(PDOException $e)
		{
		echo "Connection failed: " . $e->getMessage();
		}
?>


			
			
			