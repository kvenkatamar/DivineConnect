<?php 
session_start();
 include '../../assets/constant/config.php';
 
 try {
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		if (isset($_POST['submit'])) 
		{
			

 			$totalsalary = $_POST['days']*$_POST['bsalary'];

			$stmt = $conn->prepare("INSERT INTO `salary`(`msalary`, `staffname`, `days`, `bsalary`,`tsalary`,`status`) VALUES ('".$_POST['msalary']."','".$_POST['staffname']."','".$_POST['days']."','".$_POST['bsalary']."','".$totalsalary."','".$_POST['status']."')");

			$stmt->execute();
			

			$_SESSION['success']="success";

			header("location:../salarytable.php" ); 

		}
	

		if (isset($_POST['update'])) 
		{
			
 //echo "UPDATE `salary` SET `msalary`='".$_POST['msalary']."',`staffname`='".$_POST['staffname']."',`days`='".$_POST['days']."',`salary`='".$_POST['salary']."',`status`='".$_POST['status']."' WHERE id='".$_POST['id']."' ";exit;

				$stmt = $conn->prepare("UPDATE `salary` SET `msalary`='".$_POST['msalary']."',`staffname`='".$_POST['staffname']."',`days`='".$_POST['days']."',`bsalary`='".$_POST['bsalary']."',`status`='".$_POST['status']."' WHERE id='".$_POST['id']."' ");

			$stmt->execute();
			

			$_SESSION['update']="update";

			header("location:../salarytable.php" ); 

		}
	

		if (isset($_GET['id'])) 
		{

 //echo "UPDATE `signup` SET `username`='".$_POST['username']."',`email`='".$_POST['email']."',`mobileno`='".$_POST['mobileno']."' WHERE id='".$_SESSION['id']."' ";exit;

			$stmt = $conn->prepare("UPDATE `salary` SET delete_status='1' where id='".$_GET['id']."' ");

			$stmt->execute();

			$_SESSION['delete']="delete";

			header("location:../salarytable.php" ); 

		}





		}
		catch(PDOException $e)
		{
		echo "Connection failed: " . $e->getMessage();
		}
?>






