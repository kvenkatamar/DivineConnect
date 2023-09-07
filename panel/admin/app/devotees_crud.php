<?php 
session_start();
 include '../../assets/constant/config.php';
 
 try {
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		if (isset($_POST['submit'])) 
		{
			
			

//echo "INSERT INTO `devotees`(`dname`,`date`, `phone`, `religion`,`country`, `state2`,`district1`,`taluka`,`status`) VALUES ('".$_POST['dname']."','".$_POST['date']."','".$_POST['phone']."','".$_POST['religion']."','".$_POST['country']."','".$_POST['state2']."','".$_POST['district1']."','".$_POST['taluka']."''".$_POST['status']."')";exit;

			$stmt = $conn->prepare("INSERT INTO `devotees`(`dname`,`date`, `phone`, `religion`,`country`, `state2`,`district1`,`taluka`,`status`) VALUES ('".$_POST['dname']."','".$_POST['date']."','".$_POST['phone']."','".$_POST['religion']."','".$_POST['country']."','".$_POST['state2']."','".$_POST['district1']."','".$_POST['taluka']."','".$_POST['status']."')");

			$stmt->execute();
			
			

			$_SESSION['success']="success";

			header("location:../devoteestable.php" ); 

		}
	
	

		if (isset($_POST['update'])) 
		{
			
 //echo "UPDATE `devotees` SET `dname`='".$_POST['dname']."',`date`='".$_POST['date']."',`phone`='".$_POST['phone']."',`state`='".$_POST['state']."',`status`='".$_POST['status']."' WHERE id='".$_POST['id']."' ";exit;

			$stmt = $conn->prepare("UPDATE `devotees` SET `dname`='".$_POST['dname']."',`date`='".$_POST['date']."',`phone`='".$_POST['phone']."',`religion`='".$_POST['religion']."',`status`='".$_POST['status']."' WHERE id='".$_POST['id']."' ");

			$stmt->execute();
			
			

			$_SESSION['update']="update";

			header("location:../devoteestable.php" ); 

		}
	
	

		if (isset($_GET['id'])) 
		{
			

 //echo "UPDATE `signup` SET `username`='".$_POST['username']."',`email`='".$_POST['email']."',`mobileno`='".$_POST['mobileno']."' WHERE id='".$_SESSION['id']."' ";exit;

			$stmt = $conn->prepare("UPDATE `devotees` SET delete_status='1' where id='".$_GET['id']."' ");

			$stmt->execute();
			

			$_SESSION['delete']="delete";

			header("location:../devoteestable.php" ); 

		}

		



		}
		catch(PDOException $e)
		{
		echo "Connection failed: " . $e->getMessage();
		}
?>

