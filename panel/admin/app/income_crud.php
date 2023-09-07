<?php 
session_start();
 include '../../assets/constant/config.php';
 
 try {
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);




         if(isset($_POST['id']) && !empty($_POST['id'])){
    $result1=array();
     //echo "SELECT * FROM `devotees` WHERE id='".$_POST['id']."' AND delete_status='0'";exit;  
    $stmt = $conn->prepare("SELECT * FROM `devotees` WHERE id='".$_POST['id']."' AND delete_status='0'");
    $stmt->execute();
    //echo print_r($stmt);exit;
    $display2 = $stmt->fetchAll(); 

  //echo print_r($display1);exit;
    //$result['display']=$display;
    $result1['display2']=$display2;
            echo json_encode($result1);

}


      
		
		if (isset($_POST['submit'])) 
		{
			
		$stmt = $conn->prepare("INSERT INTO `income`(`eid`,`date`, `dname`, `mobile_no`,`raddress`,`transaction`,`donation`,`sevaname`,`totalamount`) VALUES ('".$_POST['eid']."','".$_POST['date']."','".$_POST['dname']."','".$_POST['mobile_no']."','".$_POST['raddress']."','".$_POST['transaction']."','".$_POST['donation']."','".$_POST['sevaname']."','".$_POST['totalamount']."')");

			$stmt->execute();
			
			

			$_SESSION['success']="success";

			header("location:../incometable.php" ); 

		}


		if (isset($_POST['update'])) 
		{
			
 //echo "UPDATE `income` SET `date`='".$_POST['date']."',`mobile_no`='".$_POST['mobile_no']."',`dname`='".$_POST['dname']."',`raddress`='".$_POST['raddress']."',`transaction`='".$_POST['transaction']."',`donation`='".$_POST['donation']."' WHERE id='".$_POST['id']."' ";exit;

			$stmt = $conn->prepare("UPDATE `income` SET `date`='".$_POST['date']."',`mobile_no`='".$_POST['mobile_no']."',`dname`='".$_POST['dname']."',`raddress`='".$_POST['raddress']."',`transaction`='".$_POST['transaction']."',`donation`='".$_POST['donation']."' WHERE id='".$_POST['id']."' ");

			$stmt->execute();
			

			$_SESSION['update']="update";

			header("location:../incometable.php" ); 

		
	}
	
		if (isset($_GET['id'])) 
		{
			

 //echo "UPDATE `signup` SET `username`='".$_POST['username']."',`email`='".$_POST['email']."',`mobileno`='".$_POST['mobileno']."' WHERE id='".$_SESSION['id']."' ";exit;

			$stmt = $conn->prepare("UPDATE `income` SET delete_status='1' where id='".$_GET['id']."' ");

			$stmt->execute();
			

			$_SESSION['delete']="delete";

			header("location:../incometable.php" ); 

		}

		



		}
		catch(PDOException $e)
		{
		echo "Connection failed: " . $e->getMessage();
		}
?>

