<?php 
session_start();
 include '../../assets/constant/config.php';
 
 try {
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		if (isset($_POST['update'])) 
		{

 //echo "UPDATE `signup` SET `username`='".$_POST['username']."',`email`='".$_POST['email']."',`mobileno`='".$_POST['mobileno']."' WHERE id='".$_SESSION['id']."' ";exit;

			$stmt = $conn->prepare("UPDATE `signup` SET `username`='".$_POST['username']."',`email`='".$_POST['email']."',`mobileno`='".$_POST['mobileno']."' WHERE id='".$_SESSION['id']."' ");

			$stmt->execute();



			header("location:../dashboard.php" ); 

		}
		}
		catch(PDOException $e)
		{
		echo "Connection failed: " . $e->getMessage();
		}
?>


			
			
			