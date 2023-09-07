<?php 
session_start();
 include '../../assets/constant/config.php';
 
 try {
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		if (isset($_POST['submit'])) 
		{
			if (!isset($_SESSION['token'])|| (!isset($_POST['token']))){
	exit('token is not set');
}

if($_SESSION['token']==$_POST['token']){
	echo "OK";

// echo "INSERT INTO `signup`(`username`, `email`, `password`, `cpassword`, `mobile`) VALUES ('".$_POST['username']."','".$_POST['email']."','".$password."','".$cpassword."','".$_POST['mobile']."')";exit;

			$stmt = $conn->prepare("INSERT INTO `schedule`(`dname`, `sevaname`, `date`) VALUES ('".$_POST['dname']."','".$_POST['sevaname']."','".$_POST['date']."')");

			$stmt->execute();
			unset($_SESSION['token']);

			$_SESSION['success']="success";

			header("location:../scheduletable.php" ); 

		}
	}

		if (isset($_POST['update'])) 
		{
			if (!isset($_SESSION['token'])|| (!isset($_POST['token']))){
	exit('token is not set');
}

if($_SESSION['token']==$_POST['token']){
	echo "OK";

 //echo "UPDATE `signup` SET `username`='".$_POST['username']."',`email`='".$_POST['email']."',`mobileno`='".$_POST['mobileno']."' WHERE id='".$_SESSION['id']."' ";exit;

			$stmt = $conn->prepare("UPDATE `schedule` SET `dname`='".$_POST['dname']."',`sevaname`='".$_POST['sevaname']."',`date`='".$_POST['date']."' WHERE id='".$_POST['id']."' ");

			$stmt->execute();
			unset($_SESSION['token']);

			$_SESSION['update']="update";

			header("location:../scheduletable.php" ); 

		}
	}

		if (isset($_GET['id'])) 
		{

 //echo "UPDATE `signup` SET `username`='".$_POST['username']."',`email`='".$_POST['email']."',`mobileno`='".$_POST['mobileno']."' WHERE id='".$_SESSION['id']."' ";exit;

			$stmt = $conn->prepare("UPDATE `schedule` SET delete_status='1' where id='".$_GET['id']."' ");

			$stmt->execute();

			$_SESSION['delete']="delete";

			header("location:../scheduletable.php" ); 

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

