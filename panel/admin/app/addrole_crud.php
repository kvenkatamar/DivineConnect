<?php 
session_start();


 include '../../assets/constant/config.php';
 
 try {
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		if (isset($_POST['submit'])) 
		{
			extract($_POST);
			

			$stmt = $conn->prepare("INSERT INTO `groups`(`name`,`description`) VALUES ('".$_POST['name']."','".$_POST['description']."')");

			$stmt->execute();  
			$last_id=$conn->lastInsertId();
			$id=$last_id;  
			$checkItem = $_POST["checkItem"];
			//print_r($_POST);
 			$a = count($checkItem);  
			for($i=0;$i<$a;$i++){
			$stmt = $conn->prepare("insert into permission_role(permission_id,group_id)values('$checkItem[$i]','$id')");
    		$stmt->execute();

      	 }
      	 
    
		

		header("location:../view_role.php" ); 

		}

		if(isset($_POST['btn_edit']))
		{
			//print_r($_POST['id'];)exit;
    
  
       extract($_POST);
     //  print_r($_POST);exit;
 //echo "delete  from permission_role where group_id='".$_POST['id']."' ";exit();
     $stmt = $conn->prepare("delete  from permission_role where group_id='".$_POST['id']."'");
     // print_r($_POST['id']);exit;
    $stmt->execute();
    //echo "UPDATE groups set name='$name',description='$description' where id='".$_POST['id']."'";exit;
    $stmt = $conn->prepare("UPDATE groups set name='$name',description='$description' where id='".$_POST['id']."'");
    $stmt->execute();

$checkItem = $_POST["checkItem"];
//print_r($_POST);
 $a = count($checkItem);  
for($i=0;$i<$a;$i++){
 $id = $_POST['id'];

         $sql="insert into permission_role(permission_id,group_id)values('$checkItem[$i]','$id')";
          $execute = $conn->query($sql);
        
       }
   if($execute==true)
  {
  	
  
   header("location:../view_role.php" ); 
}
  
}
 
	
	
	if(isset($_GET['id']))
{

 $stmt = $conn->prepare("UPDATE groups SET delete_status='1' WHERE id='".$_GET['id']."' ");
 
  $stmt->execute();


  
   header("location:../view_role.php" ); 
  
}
 }
		


		catch(PDOException $e)
		{
		echo "Connection failed: " . $e->getMessage();
		}
?>

