<?php 
session_start();
 include '../../assets/constant/config.php';
 
 try {
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		

		if (isset($_POST['update'])) 
		{
			$filepath = "../../assets/images/" . $_FILES["logo"]["name"];

if(move_uploaded_file($_FILES["logo"]["tmp_name"], $filepath)) 
{
//echo "<img src=".$filepath." height=200 width=300 />";
	$img=$_FILES["logo"]["name"];
} 
else 
{
echo "Error !!";
}

 //echo "UPDATE `web` SET `title`='".$_POST['title']."',`fnote`='".$_POST['fnote']."',`logo`='".$_POST['logo']."' ";exit;
 
 			$stmt = $conn->prepare("UPDATE `web` SET `title`='".$_POST['title']."',`fnote`='".$_POST['fnote']."',`logo`='".$img."',`email`='".$_POST['email']."',`email2`='".$_POST['email2']."',`phone`='".$_POST['phone']."',`phone2`='".$_POST['phone2']."',`address`='".$_POST['address']."',`cname`='".$_POST['cname']."',`year`='".$_POST['year']."' ");

			$stmt->execute();

			header("location:../dashboard.php" ); 

		}

	}
		catch(PDOException $e)
		{
		echo "Connection failed: " . $e->getMessage();
		}
?>

