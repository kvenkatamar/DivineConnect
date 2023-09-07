<?php 
session_start();
 include '../../assets/constant/config.php';
 
 try {
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		date_default_timezone_set('Asia/Kolkata');
		$date=date('Y-m-d h:i:s');
		
		if (isset($_POST['submit'])) 
		{
			if (!isset($_SESSION['token'])|| (!isset($_POST['token']))){
	exit('token is not set');
}

if($_SESSION['token']==$_POST['token']){
	echo "OK";

//echo "INSERT INTO `devotees`(`dname`,`date`, `phone`, `state`,`status`) VALUES ('".$_POST['dname']."','".$_POST['date']."','".$_POST['phone']."','".$_POST['state']."','".$_POST['status']."')";exit;

			$stmt = $conn->prepare("INSERT INTO `attendance`(`dname`,`date`,`status`) VALUES ('".$_POST['dname']."','".$_POST['date']."','".$_POST['status']."')");

			$stmt->execute();
			unset($_SESSION['token']);

			$_SESSION['success']="success";

			header("location:../attendancetable.php" ); 

		}
	}

		if (isset($_POST['update'])) 
		{
			if (!isset($_SESSION['token'])|| (!isset($_POST['token']))){
	exit('token is not set');
}

if($_SESSION['token']==$_POST['token']){
	echo "OK";
 //echo "UPDATE `devotees` SET `dname`='".$_POST['dname']."',`date`='".$_POST['date']."',`phone`='".$_POST['phone']."',`state`='".$_POST['state']."',`status`='".$_POST['status']."' WHERE id='".$_POST['id']."' ";exit;

			$stmt = $conn->prepare("UPDATE `attendance` SET `dname`='".$_POST['dname']."',`date`='".$_POST['date']."',`status`='".$_POST['status']."' WHERE id='".$_POST['id']."' ");

			$stmt->execute();
			unset($_SESSION['token']);

			$_SESSION['update']="update";

			header("location:../attendancetable.php" ); 

		}
	}

		if (isset($_GET['id'])) 
		{
			

 //echo "UPDATE `signup` SET `username`='".$_POST['username']."',`email`='".$_POST['email']."',`mobileno`='".$_POST['mobileno']."' WHERE id='".$_SESSION['id']."' ";exit;

			$stmt = $conn->prepare("UPDATE `attendance` SET delete_status='1' where id='".$_GET['id']."' ");

			$stmt->execute();
			

			$_SESSION['delete']="delete";

			header("location:../attendancetable.php" ); 

		}

		 else{
	 	exit('Invalid Token');
	 	}



		}
		catch(PDOException $e)
		{
		echo "Connection failed: " . $e->getMessage();
		}
?>

