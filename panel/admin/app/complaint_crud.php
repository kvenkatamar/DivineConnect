<?php 
session_start();
 include '../../assets/constant/config.php';
 
 try {
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		if (isset($_POST['submit'])) 
		{

     $stmt=$conn->prepare("SELECT * FROM `complaints` where id=(select max(id) from complaints)");
        $stmt->execute();
        $record1=$stmt->fetchAll();
         foreach ($record1 as $key1){
        
       
   }
        $n = $key1['id'] + 1;
        $L = 'CID-';
        $pid = $L." ".$n;
       // print_r($pid);exit;

			$filepath = "../../assets/images/" . $_FILES["document"]["name"];

if(move_uploaded_file($_FILES["document"]["tmp_name"], $filepath)) 
{
//echo "<img src=".$filepath." height=200 width=300 />";
	$img=$_FILES["document"]["name"];
} 
else 
{
echo "Error !!";
}
//echo "$img";exit;
			

//echo "INSERT INTO `complaints`(`cid`,`name`, `email`, `csubject`,`date`,`mobileno`,`document`) VALUES ('".$_POST['cid']."','".$_POST['name']."','".$_POST['email']."','".$_POST['csubject']."','".$_POST['date']."','".$_POST['mobileno']."','".$img."')";exit;

$stmt = $conn->prepare("INSERT INTO `complaints`(`cid`,`name`, `email`, `csubject`,`date`,`mobileno`,`document`,`status`) VALUES ('".$pid."','".$_POST['name']."','".$_POST['email']."','".$_POST['csubject']."','".$_POST['date']."','".$_POST['mobileno']."','".$img."','".$_POST['status']."')");

			$stmt->execute();
			

			$_SESSION['success']="success";

			header("location:../../../../temple/index.php"); 

		}
	

		if (isset($_POST['update'])) 
		{

			if($_FILES['document']['tmp_name'] != '')
  {
$filepath = "../../assets/images/" . $_FILES["document"]["name"];

if(move_uploaded_file($_FILES["document"]["tmp_name"], $filepath)) 
{
	$img=$_FILES["document"]["name"];

	 @unlink("../../assets/images/".$_POST['old_cat_img']);
    
  }
 }else
  {
    $img =$_POST['old_cat_img'];	
}

	//echo $img; exit;document
			
 //echo "UPDATE `devotees` SET `dname`='".$_POST['dname']."',`date`='".$_POST['date']."',`phone`='".$_POST['phone']."',`state`='".$_POST['state']."',`status`='".$_POST['status']."' WHERE id='".$_POST['id']."' ";exit;

			$stmt = $conn->prepare("UPDATE `complaints` SET `cid`='".$_POST['cid']."',`name`='".$_POST['name']."',`email`='".$_POST['email']."',`csubject`='".$_POST['csubject']."',`date`='".$_POST['date']."',`mobileno`='".$_POST['mobileno']."',`document`='".$img."' ,`status`='".$_POST['status']."' WHERE id='".$_POST['id']."' ");

			$stmt->execute();
		

			$_SESSION['update']="update";

			header("location:../complainttable.php" ); 

		}
	

		if (isset($_GET['id'])) 
		{
			

 //echo "UPDATE `signup` SET `username`='".$_POST['username']."',`email`='".$_POST['email']."',`mobileno`='".$_POST['mobileno']."' WHERE id='".$_SESSION['id']."' ";exit;

			$stmt = $conn->prepare("UPDATE `complaints` SET delete_status='1' where id='".$_GET['id']."' ");

			$stmt->execute();
			

			$_SESSION['delete']="delete";

			header("location:../complainttable.php" ); 

		}



		}
		catch(PDOException $e)
		{
		echo "Connection failed: " . $e->getMessage();
		}
?>

