<?php 
session_start();
 include '../../assets/constant/config.php';
 
 try {
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		if (isset($_POST['submit'])) 
		{

			$pass=hash('sha256',$_POST['old']);
			$pass1=hash('sha256',$_POST['cpassword']);
			function createSalt()
			{
				return '2123293dsj2hu2nikhiljdsd';
			}
			$salt=createSalt();
			$old=hash('sha256',$salt.$pass);
			$cpassword=hash('sha256',$salt.$pass1);

			if($_POST['npassword']==$_POST['cpassword'])
// echo "UPDATE `signup` SET `password`='".$cpassword."' WHERE id='".$_SESSION['id']."' ";exit;

			$stmt = $conn->prepare("UPDATE `signup` SET `password`='".$cpassword."' WHERE id='".$_SESSION['id']."' ");
			$stmt->execute();



			header("location:../login.php" ); 

		}
		}
		catch(PDOException $e)
		{
		echo "Connection failed: " . $e->getMessage();
		}
?>
