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

//echo "INSERT INTO `staff`(`eid`,`staffname`, `phone`, `adhar`, `bdate`,`address`,`gender`) VALUES ('".$_POST['eid']."','".$_POST['staffname']."','".$_POST['phone']."','".$_POST['adhar']."','".$_POST['bdate']."','".$_POST['address']."','".$_POST['gender']."')";exit;

			$stmt = $conn->prepare("INSERT INTO `staff`(`eid`,`staffname`, `phone`, `adhar`, `bdate`,`address`,`gender`) VALUES ('".$_POST['eid']."','".$_POST['staffname']."','".$_POST['phone']."','".$_POST['adhar']."','".$_POST['bdate']."','".$_POST['address']."','".$_POST['gender']."')");

			$stmt->execute();
			unset($_SESSION['token']);

			$_SESSION['success']="success";

			header("location:../stafftable.php" ); 

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

			$stmt = $conn->prepare("UPDATE `staff` SET `eid`='".$_POST['eid']."',`staffname`='".$_POST['staffname']."',`phone`='".$_POST['phone']."',`adhar`='".$_POST['adhar']."',`bdate`='".$_POST['bdate']."',`address`='".$_POST['address']."',`gender`='".$_POST['gender']."' WHERE id='".$_POST['id']."' ");

			$stmt->execute();
			unset($_SESSION['token']);
			$_SESSION['update']="update";

			header("location:../stafftable.php" ); 

		}
	}

		if (isset($_GET['id'])) 
		{

 //echo "UPDATE `signup` SET `username`='".$_POST['username']."',`email`='".$_POST['email']."',`mobileno`='".$_POST['mobileno']."' WHERE id='".$_SESSION['id']."' ";exit;

			$stmt = $conn->prepare("UPDATE `staff` SET delete_status='1' where id='".$_GET['id']."' ");

			$stmt->execute();


			$_SESSION['delete']="delete";

			header("location:../stafftable.php" ); 

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

